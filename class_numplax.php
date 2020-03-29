<?php

// require_once("sub.php");

class solveNumpla {
  // 9x9 data with property
  var $subject = [];
  // 9x9 data without detailed property
  var $sub     = [];
var $cell    = [];
//public   $cell    = [];
  var $name;
  var $list;

  function __construct() {
    global  $cell_id_91_full;
    $this->list    = [ 'list' => $cell_id_91_full, 'tag' => 'cass91' ]; 
  }

  function init($sub) {
    $this->sub = $sub;
    $this->init_cell();  
    $this->map();  
    $this->map_cand_masked($this->list  , 0);
    echo 'un solved '.$this->get_remaining() . PHP_EOL;
//    $this->list_info(null); 
  }


//  foreach($l as $key => $val) {
//    echo '* list name: '. $val[1]. PHP_EOL;
//    echo '  key      : ' . array_keys($val[0])[0] . PHP_EOL;
//    echo '  key type : ' . gettype(array_keys($val[0])[0]) . PHP_EOL;
//    echo '  size     : ' . count($val[0]) . PHP_EOL;
//  }

function init_cell() {
      global  $cell_id_to_cell_adrs;
//      $this->cell=[];
      foreach($this->sub as $cell_id => $c) {
        $num = $this->sub[$cell_id];
        $stat=((integer)$num > 0) ? PRESET : SOLVING;
        $cell_adrs = $cell_id_to_cell_adrs[$cell_id]; 
        $this->cell[$cell_adrs] = [
          'adrs'    =>  $cell_adrs,
          'stat'    =>  $stat,
          'num'     => (integer)$num,
          'cass'    => (string)"0",
          'cass33'  => (string)"0",
          'cass19'  => (string)"0",
          'cass91'  => (string)"0",
          'mask'    => (string)"0",
          'comment' => (string)"0",
        ];
//        $this->cell[$cell_adrs]['cass91']=  (string)"789";
      //  $this->cell[$cell_adrs]= array_replace($this->cell[$cell_adrs],array('cass91' => (string)"789"));
    }
}

  
  function get_remaining() {
    $remain = 0;
    foreach($this->cell as $prop) {
      if ($prop['stat'] === SOLVING) {
        $remain++;
      }
    }
    return $remain;
//    return array_count_values($this->sub)[0];
  }

  function   write_cell($adrs, $tag, $val) {
    if ($this->cell[$adrs]['adrs'] === (string)$adrs) {
      $this->cell[$adrs][$tag]  = (string)$val;
//      echo sprintf("write_candidate::\$this->cell[%s][%s]  = (string)%s\n",
//      $adrs,$tag,(string)$val);
    } else {
      echo 'adrs error. target address is '. $this->cell[$adrs]['adrs'] . PHP_EOL;
    }
  }
  function   set_list($list) {
   $this->list  = $list; 
  }
  function   dump_a_cell($id) {
    echo 'line:'.__LINE__.'DUMP of cell-'.$id . PHP_EOL;
    var_dump($this->cell[$id]);
  }

  // -------------------------------
  // small 9x9 map
  // -------------------------------
  //  solving   0
  //  PRESET   .1.
  //  SOLVED   .2.
  function map() {
    $cnt=0;
    echo PHP_EOL;
    echo '    A  B  C   D  E  F   G  H  I'. PHP_EOL;
    echo '   ----------------------------';
    foreach($this->sub as $id => $vl) {
      if (isset($vl['number']) == true) {
        $num = $vl['number'];
      } else {
        $num = $vl;
      }
      if ($id >0 and $id % 27 ==0) echo "\n";
      if ($id %  3 == 0) echo ' ';
      if ($id %  9 == 0 ) echo  PHP_EOL .  (int)($id/9) .': ';
      if (isset($vl['stat']) == true and $vl['stat'] === SOLVED) {
        echo sprintf("[%1d]", $num);
      } else if ($num > 0) {
        echo sprintf(".%1d.", $num);
      } else {
        echo sprintf(" %1d ", $num);
      }
      if ($num > 0) {
        $cnt++;
      }
    }
    echo PHP_EOL;
    echo sprintf("solved %d / remain %d\n", $cnt, 9*9 - $cnt); 
    echo PHP_EOL;
  }
  function get_prop($adrs) {
    global $cell;
    $stat =   $this->cell[$adrs]['stat'];
    $num  =   $this->cell[$adrs]['num'];
    $cass =   $this->cell[$adrs]['cass'];
    $cass33 = $this->cell[$adrs]['cass33'];
    $cass91 = $this->cell[$adrs]['cass91'];
    $cass19 = $this->cell[$adrs]['cass19'];
    return [ $adrs, $stat, $num, $cass33, $cass91, $cass19, $cass ];
  }

  function gen_cand($str) {
    $ret = "";
    foreach(range(1,9) as $c) {
      $ret .= (strpos($str, (string)$c) !== false) ? (string)$c : '.';
    }
    return $ret;
  }
  function XYxy2adrs($X,$Y,$x,$y) {
    global $cell_id_to_cell_adrs;
    $id = $Y * 27 + $X * 3 + $y * 9 + $x;
    return $cell_id_to_cell_adrs[$id];
  }

  function map_cand_masked($list, $mask) {
    echo '-----------------------------'. PHP_EOL;
    $solving_count = 0;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        $arr_str = [];
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num,$s1,$s2,$s3, $s4) =
                $this->get_prop($this->XYxy2adrs($X,$Y,$x,$y)); 
            
            $cass33 = $s2;
            $cass91 = $s2;
            $cass19 = $s2;
            $cass   = $s2;
            $cass_name = $list['tag'];
            if ($stat === SOLVING)  {
              if ($cass_name === 'cass33') {
                $map_cass = $cass33;
              }else
              if ($cass_name === 'cass91') {
                $map_cass = $cass91;
              }else
              if ($cass_name === 'cass19') {
                $map_cass = $cass19;
              }else
              if ($cass_name === 'cass') {
                $map_cass = $cass;
              }
         //     $map_cass  = $list['list'];

              if ($mask == '0')  {
                $arr_str[] = $this->gen_cand($map_cass);
       //       } else {
         //       $arr_str[] = gen_cand_masked($map_cass, $mask);
              }
            } else {
              $arr_str[] = "    " . $num . "    ";
            }
          }
        }
        if  ($y == 0) {
        echo '  -A- -B- -C-  -D- -E- -F-  -G- -H- -I-'. PHP_EOL;
        } else {
        echo '  --- --- ---  --- --- ---  --- --- ---'. PHP_EOL;
        }
        foreach(range(0,2) as $l) {
          echo 3*$Y+$y .'|';
          foreach(range(0,2) as $X) {
            foreach(range(0,2) as $x) {
              echo substr($arr_str[3* $X + $x],3*$l,3).'|';
              if ($x == 2) echo '|';
            }
          }
            echo PHP_EOL;
        }
      }
    }
  }
// $count_list = [
//   "S0"=> [ '1'=> [ 'C0','D0', 'E0', 'F0', 'I0' ],
//            '2'=>[ 'C0','D0', 'E0', 'F0', 'I0' ],
//            '3'=>[ 'C0', 'D0' ],
//            '4'=>[ 'C0', 'D0' ],
//            '5'=>[ 'A0' ],
//            '6'=>[ 'C0','D0', 'E0', 'F0', 'I0' ],
//            '7'=>[ 'C0','D0', 'E0', 'F0', 'I0' ],
//            '8'=>[ 'C0', 'D0' ],
//            '9'=>[ 'C0','D0', 'E0', 'F0', 'I0' ],
//          ];
//   "S1"=> [ '1'=>[ 'A2' ], 
//            '2'=>[ 'C2', 'D2' ],
//            '3'=>[ 'C2', 'D2' ],
//            '4'=>[ 'C2', 'D2' ],
//            '5'=>[ 'C2','D2', 'E2', 'F2', 'I2' ],
//            '6'=>[ 'C2','D2', 'E2', 'F2', 'I2' ],
//            '7'=>[ 'C2','D2', 'E2', 'F2', 'I2' ],
//            '8'=>[ 'C2','D2', 'E2', 'F2', 'I2' ],
//            '9'=>[ 'C2','D2', 'E2', 'F2', 'I2' ],
//          ];
//     ........
//   "S8"=> [ '1'=>[ 'A9' ], 
//            '2'=>[ 'C9', 'D9' ],
//            '3'=>[ 'C9', 'D9' ],
//            '4'=>[ 'C9', 'D9' ],
//            '5'=>[ 'C9','D9', 'E9', 'F9', 'I9' ],
//            '6'=>[ 'C9','D9', 'E9', 'F9', 'I9' ],
//            '7'=>[ 'C9','D9', 'E9', 'F9', 'I9' ],
//            '8'=>[ 'C9','D9', 'E9', 'F9', 'I9' ],
//            '9'=>[ 'C9','D9', 'E9', 'F9', 'I9' ],
//          ];
// ];


  function make_area_count_list($candidate_list, $area) {
    $sw = 1;
    if ($sw == 0)  {
      return $this->_1_MAKE_AREA_COUNT_LIST($candidate_list, $area);
      // $count_list[$sub_area_number][$val][] = $adrs;
    } else {
      return $this->_2_MAKE_AREA_COUNT_LIST($candidate_list, $area);
      // $count_list[$sub_area_number][$adrs][] = $val;
    }
  }

  function _1_MAKE_AREA_COUNT_LIST($candidate_list, $area) {
    global $sub_adrs_to_sub_id;
    global $cell_adrs_to_cell_id;

    $this->candidate_list = $candidate_list;
    $count_list     = [];
    foreach(range(0,8) as $sub_area_adrs) {
      $count_list[$sub_area_adrs] = [];
      foreach(range(1,9) as $sub_area_number) {
    //    $count_list[$sub_area_adrs][$sub_area_number] = [];
      }
    }
    var_dump($count_list);
 //   var_dump($candidate_list);
    // $candidate_list[$adrs] => $values
    //   ex. $candidate_list['A9'] = [ 1,2,3 ]

    foreach($candidate_list as $adrs => $values) {
      if ($this->cell[$adrs]['stat'] !== SOLVING) {
        continue;
      }
      foreach($area['search'] as $sub_area_number => $sub_area) {
        $id = $cell_adrs_to_cell_id[$adrs];
//        echo $adrs . ';;'.$id . PHP_EOL;
//        var_dump($sub_area);
//        echo "VALUSE========";
//        var_dump($values);
        if (in_array($id, $sub_area, true)=== true) {
        echo $adrs . $id . PHP_EOL;
          foreach($values as $val) {
            if ($val  > 0) {
              $count_list[$sub_area_number][$val][] = $adrs;
            }
          }
        }
      }
    }
    $result =  [];
//    var_dump($count_list);
    foreach($count_list as $san => $sub_area) {
      foreach($sub_area as $num => $vals) {
        if (count($vals)==1) {
          if (isset($result[$vals[0]])==false) {
            $result[$vals[0]] = $num; 
            echo sprintf('SOLVED %s is %s',$vals[0],$num).PHP_EOL;
          }
        }
      }
    }
//    $result = array_unique($result);
//    foreach($result  as $rs) {
//      echo $rs . PHP_EOL;
//    }

    // dump count_list
    foreach($count_list as $sub => $sub_list) {
      echo "SubArea-" . $sub . PHP_EOL;
      foreach($sub_list as $num => $num_list) {
        if (isset($num_list)) {
          echo "   Number=" . $num. " : count= " .(string) count($num_list) . ' [ ';
          foreach($num_list as $adrs) {
            echo $adrs . ', ';
          }
          echo ' ]' . PHP_EOL;
        }
      }
    }
    $this-> count_list = $count_list;
    $this->set_numbers_on_result($result); 
    return $result ; 
  }
  
  function _2_MAKE_AREA_COUNT_LIST($candidate_list, $area) {
    global $sub_adrs_to_sub_id;
    global $cell_adrs_to_cell_id;

    $this->candidate_list = $candidate_list;
    $count_list     = [];
    foreach(range(0,8) as $sub_area_adrs) {
      $count_list[$sub_area_adrs] = [];
      foreach(range(1,9) as $sub_area_number) {
    //    $count_list[$sub_area_adrs][$sub_area_number] = [];
      }
    }
    var_dump($count_list);
 //   var_dump($candidate_list);
    // $candidate_list[$adrs] => $values
    //   ex. $candidate_list['A9'] = [ 1,2,3 ]

    foreach($candidate_list as $adrs => $values) {
      if ($this->cell[$adrs]['stat'] !== SOLVING) {
        continue;
      }
      foreach($area['search'] as $sub_area_number => $sub_area) {
        $id = $cell_adrs_to_cell_id[$adrs];
        echo $adrs . ';;'.$id . PHP_EOL;
//        var_dump($sub_area);
//        echo "VALUSE========";
//        var_dump($values);
        if (in_array($id, $sub_area, true)=== true) {
   //     echo $adrs . $id . PHP_EOL;
          foreach($values as $val) {
            if ($val  > 0) {
              $count_list[$sub_area_number][$adrs][] = $val;
            }
          }
        }
      }
    }

    var_dump($count_list);
 //   exit();

    $result =  [];
    foreach($count_list as $san => $sub_area) {
      foreach($sub_area as $num => $vals) {
        if (count($vals)==1) {
          if (isset($result[$vals[0]])==false) {
            $result[$vals[0]] = $num; 
            echo sprintf('SOLVED %s is %s',$vals[0],$num).PHP_EOL;
          }
        }
      }
    }
//    $result = array_unique($result);
//    foreach($result  as $rs) {
//      echo $rs . PHP_EOL;
//    }

    // dump count_list
    foreach($count_list as $sub => $sub_list) {
      echo "SubArea-" . $sub . PHP_EOL;
      foreach($sub_list as $num => $num_list) {
        if (isset($num_list)) {
          echo "   Number=" . $num. " : count= " .(string) count($num_list) . ' [ ';
          foreach($num_list as $adrs) {
            echo $adrs . ', ';
          }
          echo ' ]' . PHP_EOL;
        }
      }
    }
    $this-> count_list = $count_list;
    $this->set_numbers_on_result($result); 
    return $result ; 
  }
//  format of return
//  $result = [
//    'A8' => 3,
//    'B7' => 3,
//    'B5' => 3,
//    'D4' => 3,
//    ....
//  ] ; 

  function set_numbers_on_result($result) {
    global $cell_adrs_to_cell_id;
    if (count($result)==0) return;
    foreach($result as $adrs => $num) {
//      echo 'adrs::'.$adrs.' => '.$num . PHP_EOL;
//      $this->cell[$adrs]['stat'] = SOLVED;
//      $this->cell[$adrs]['num']  = (integer)$num;
      $this->write_cell($adrs, 'num',  $num);
      $this->write_cell($adrs, 'stat', SOLVED);
      $id = $cell_adrs_to_cell_id[$adrs];
   //   foreach($this->sub as $i => $d) {
   //     echo 'SUB ' . $i . ' = ' . $d. PHP_EOL;
   //   }
      $this->sub[$id] = (integer)$num;
//      echo $this->cell[$adrs]['stat']. PHP_EOL;
//      echo $this->cell[$adrs]['num']. PHP_EOL;
    }
  }


  

}


