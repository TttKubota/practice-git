<?php

// numpla analizer
// command
//   1. load        (l)
//   2. solveall    (a)
//   3. update      (u)
//   4. solve       (s)
//   5. mapdet
//   6. map         (m)
//   7. map33
//   8. map91
//   9. map19
//   10. mapall
//   11. prop       (p)
//   12. prop2
// 
const CREATED = 'CREATED';
const PRESET  = 'PRESET';
const SOLVED  = 'SOLVED';
const SOLVING = 'SOLVING';
const DISPCA  = 'DISPCA';

class NUMPLA {
  var $cell = [];
  var $cass = [];
  var $single_cad_list= [];
  var $subject_no =-1;
  var $subject_name ="";

  function __construct($subject, $subject_no, $subject_name ) {
     $this->subject_no = $subject_no;
     $this->subject_name = $subject_name;
     $this->init($subject);
  }


  function get_prop($X,$Y,$x,$y) {
    $id = $Y * 27 + $X * 3 + $y * 9 + $x;
    $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
    $stat = $this->cell[$adrs]['stat'];
    $num  = $this->cell[$adrs]['num'];
    $cass = $this->cell[$adrs]['cass'];
    $cass33 = $this->cell[$adrs]['cass33'];
    $cass91 = $this->cell[$adrs]['cass91'];
    $cass19 = $this->cell[$adrs]['cass19'];
    return [ $adrs, $stat, $num, $cass33, $cass91, $cass19, $cass ];
  }

  function set_cell_mask($cell_id, $num, $force_set_flag) {
      $cell_adrs = $this->id2adrs($cell_id); 
      if ($force_set_flag == true) {
        $this->cell[$cell_adrs]['num'] = $num;
        $this->cell[$cell_adrs]['stat'] = ($num > 0) ? SOLVED : SOLVING;
      } else {
        $this->cell[$cell_adrs]['mask'] .= $num;
      }
  }
  function init_cell() {
    foreach ($this->cell as $cell_id => $c) {
      $cell_adrs = $this->id2adrs((int)$cell_id); 
      $this->cell[$cell_adrs]['adrs'  ] = $cell_adrs;
      $this->cell[$cell_adrs]['stat'  ] = SOLVING;
      $this->cell[$cell_adrs]['num'   ] = (string)"0";
      $this->cell[$cell_adrs]['cass'  ] = (string)"0";
      $this->cell[$cell_adrs]['cass33'] = (string)"0";
      $this->cell[$cell_adrs]['cass19'] = (string)"0";
      $this->cell[$cell_adrs]['cass91'] = (string)"0";
      $this->cell[$cell_adrs]['mask'  ] = (string)"0";
    }
  }

  function set_cell3x3() {
    $stat = CREATED;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $X) {
        $occupied = "";
        foreach(range(0,2) as $y) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num,$s1,$s2,$s3, $s4) =
              $this->get_prop($X,$Y,$x,$y);
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $occupied .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $y) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num,$s1,$s2,$s3, $s4) =
             $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
              $this->cell[$adrs]["cass33"]= $this->str_free_number($occupied);
            }
          }
        }
        $occupied = "";
        // var_dump($this->cell[$adrs]);
      }
    }
  }

  function set_cell91() {
    $stat = CREATED;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        $occupied = "";
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num,$s1,$s2,$s3, $s4) =
             $this->get_prop($X,$Y,$x,$y);
//            list($adrs,$stat,$num,$s1,$s2,$s3, $s4) = $this->get_prop($X,$Y,$x,$y);
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $occupied .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs,$stat,$num,$s1,$s2,$s3, $s4) = $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
        //      $this->cell[$adrs]["cass91"]= $this->str_sort($occupied);
              $this->cell[$adrs]["cass91"]= $this->str_free_number($occupied);
            }
          }
        }
        $occupied = "";
        // var_dump($this->cell[$adrs]);
      }
    }
  }
  
  function set_cell19() {
    $stat = CREATED;
    foreach(range(0,2) as $X) {
      foreach(range(0,2) as $x) {
        $occupied = "";
        foreach(range(0,2) as $Y) {
          foreach(range(0,2) as $y) {
            list($adrs,$stat,$num,$s1,$s2,$s3, $s4) = $this->get_prop($X,$Y,$x,$y);
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $occupied .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $Y) {
          foreach(range(0,2) as $y) {
            list($adrs,$stat,$num,$s1,$s2,$s3, $s4) = $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
            //  $this->cell[$adrs]["cass19"]= $this->str_sort($occupied);
              $this->cell[$adrs]["cass19"]= $this->str_free_number($occupied);
            }
          }
        }
        $occupied = "";
        // var_dump($this->cell[$adrs]);
      }
    }
  }
  
  function str_sort($str) {
    $ret = "0";
    foreach(range(0,9) as $n) {
      if (strpos($str, (string)$n) !== false) {
        $ret .= $n;
      }
    }
    return $ret;
  //  return ($ret === "") ? "0" : $ret;
  }

  function str_free_number($str) {
    $ret = "0";
    foreach(range(1,9) as $n) {
      if (strpos($str, (string)$n) === false) {
        $ret .= $n;
      }
    }
    return $ret;
    //return ($ret === "") ? "0" : $ret;
  }
  function str_rev_sort($str33,$str91,$str19,$mask) {
    $ret = "0";
    foreach(range(1,9) as $n) {
      if ((
        (strpos($str33,(string)$n) !== false) and
        (strpos($str91,(string)$n) !== false) and
        (strpos($str19,(string)$n) !== false) and
        (strpos($mask, (string)$n) === false))
      ) {
        $ret .= $n;
      }
    }
    return $ret;
  }

//  function str_rev_sort($str33,$str91,$str19) {
//    $ret = "0";
//    $valid = true;
//    foreach(range(0,9) as $n) {
//        $valid = true;
//      foreach([$str33,$str91,$str19] as $str) {
//        echo 'STR;'.$str. PHP_EOL;
//        if (strpos($str, (string)$n) === false) {
//          $valid = false;
//          break;
//          // strpos($str33) == true and 
//          // strpos($str91) == true and 
//          // $strpos(str19) == true
//        }
//      }
//      if ($valid == true) {
//        $ret .= $n;
//      }
//      echo 'str:'.$str.' n:'.$n.' valid:'.$valid. PHP_EOL;
//    }
//    return $ret;
//    //return ($ret === "") ? "0" : $ret;
//  }

  function gen_cand($str) {
    $ret = "";
    foreach(range(1,9) as $c) {
      $ret .= (strpos($str, (string)$c) !== false) ? (string)$c : '.';
    }
    return $ret;
  }

  function gen_cand_masked($str, $mask) {
    $ret = "";
    foreach(range(1,9) as $c) {
      $dch = ((string)$c === $mask)? (string)$c : '_';
      $ret .= (strpos($str, (string)$c) !== false) ? (string)$dch : '.';

    }
    return $ret;
  }

  function _merge_array($arrays) {
    $nums = [];
    foreach ($arrays as $array) {
      foreach ($array as $key => $n) {
        if ((int)$key > 0) {
          $nums[(int)$key] = (int)$key;
        }
      }
    }
    return $nums;
  }

  function set_cell_all() {
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            $cass_all = "";
            list($adrs,$stat,$num,$s1,$s2,$s3, $s4) = 
                  $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
               $str33 = $s1;
               $str91 = $s2;
               $str19 = $s3;
               $mask  = $this->cell[$adrs]["mask"];
               $this->cell[$adrs]["cass"] = 
                   $this->str_rev_sort($str33,$str91,$str19,$mask);
            }
          }
        }
      }
    }
  }
function det_solved_cells() {
    $this->single_cad_list = [];
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            $cass_all = "";
            list($adrs,$stat,$num,$s1,$s2,$s3, $s4) = 
                  $this->get_prop($X,$Y,$x,$y);
            $cass = $s4;
            if ($stat === SOLVING and strlen($cass) == 2)  {
              $cass = str_replace("0", "", $cass);
              $this->single_cad_list[] = [ "adrs" => $adrs, "num" => $cass ];
                 echo 'SOLVED:: '.$adrs.' = '.$cass. PHP_EOL;
            }
          }
        }
      }
    }
  //  var_dump($this->single_cad_list);
    return $this->single_cad_list;
  }

  function count_cells() {
    $count_prop = [
      CREATED => 0,
      PRESET  => 0,
      SOLVED  => 0,
      SOLVING => 0,
      DISPCA  => 0,
    ];
    foreach($this->cell as $c) {
      if ($c['stat']  == CREATED) {
        $count_prop[CREATED] += 1;
      } else
      if ($c['stat']  == PRESET) {
        $count_prop[PRESET] += 1;
      } else
      if ($c['stat']  == SOLVING) {
        $count_prop[SOLVING] += 1;
      } else
      if ($c['stat']  == SOLVED) {
        $count_prop[SOLVED] += 1;
      }
      if ($c['stat']  == DISPCA) {
        $count_prop[DISPCA] += 1;
      }
    }
    return $count_prop;
  }

// $subject_P011= [
//   2,0,0, 3,8,0, 9,0,0,
//   0,0,0, 0,2,1, 4,0,0,
//   8,4,0, 0,0,0, 5,2,3,
// 
//   5,6,8, 0,0,0, 0,4,0,
//   0,3,9, 4,0,0, 0,8,2,
//   4,0,0, 0,3,0, 0,0,9,
// 
//   0,2,6, 0,0,0, 9,0,0,
//   1,0,4, 0,7,3, 8,0,0,
//   9,8,0, 1,0,6, 2,0,4,
//   ];

  function mapdet() {
    var_dump($this->cell);
  }

  function map() {
    echo '-----------------------------'. PHP_EOL;
    $solving_count = 0;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs,$stat,$num,$s1,$s2,$s3, $s4) 
              = $this->get_prop($X,$Y,$x,$y);
            echo $num . ',';
            if ($num === "0") {
               $solving_count++;
            }
          }
          echo ' ';
        }
        echo PHP_EOL;
      }
      echo PHP_EOL;
    }
    if ($solving_count == 0) {
      "Subject solved!!" . PHP_EOL;
    } else {
      echo "Subject Not solved yet. remaining is: " . $solving_count . PHP_EOL;
     echo 'Subject-'. $this->subject_no .'. : '. $this->subject_name . PHP_EOL;
    }
  }

  function map_cand($cass_name) {
    $this->map_cand_masked($cass_name, '0');
  }

  function map_cand_masked($cass_name, $mask) {
    echo '-----------------------------'. PHP_EOL;
    $solving_count = 0;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        $arr_str = [];
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num,$s1,$s2,$s3, $s4) =
                $this->get_prop($X,$Y,$x,$y);
            $cass33 = $s1;
            $cass91 = $s2;
            $cass19 = $s3;
            $cass   = $s4;
            if ($stat === SOLVING)  {
              if ($cass_name == 'cass33') {
                $map_cass = $cass33;
              }else
              if ($cass_name == 'cass91') {
                $map_cass = $cass91;
              }else
              if ($cass_name == 'cass19') {
                $map_cass = $cass19;
              }else
              if ($cass_name == 'cass') {
                $map_cass = $cass;
              }
              if ($mask == '0')  {
                $arr_str[] = $this->gen_cand($map_cass);
              } else {
                $arr_str[] = $this->gen_cand_masked($map_cass, $mask);
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
        echo '  -A- -B- -C-  -D- -E- -F-  -G- -H- -I-'. PHP_EOL;
     echo 'Subject-'. $this->subject_no .'. : '. $this->subject_name . PHP_EOL;
  }

  function apply_solved_cells() {
    foreach($this->single_cad_list as $solved_cell) {
        $this->cell[$solved_cell["adrs"]]["stat"] = SOLVED;
        $this->cell[$solved_cell["adrs"]]["num"]  = $solved_cell["num"];
        $this->cell[$solved_cell["adrs"]]["cass"] = "0";
        $this->cell[$solved_cell["adrs"]]["cass33"] = "0";
        $this->cell[$solved_cell["adrs"]]["cass91"] = "0";
        $this->cell[$solved_cell["adrs"]]["cass19"] = "0";
    }
  }

  // create instance and Reat Subject
  function init($subject) {
    foreach ($subject as $cell_id => $num) {
      $cell_adrs = $this->id2adrs($cell_id); 
      if ((int)$num > 0) {
        $this->cell[$cell_adrs] = [
          'adrs' => $cell_adrs,
          'stat' => PRESET,
          'num'  => (string)$num,
          'cass' => "0",
          'cass33' => "0",
          'cass19' => "0",
          'cass91' => "0",
          'mask' => "0",
        ];
      } else {
        $this->cell[$cell_adrs] = [
          'adrs' => $cell_adrs,
          'stat' => SOLVING,
          'num'  => (string)0,
          'cass33' => "0",
          'cass19' => "0",
          'cass91' => "0",
          'cass' =>  "0",
          'mask' => "0",
        ];
      }
    }
//    var_dump($this->cell);
  }
  function id2adrs($id) {
    $x = (int)($id % 3) ;
    $X = ((int)($id / 3)) % 3;
    $Y = (int)($id /27);
    $y = (int)(($id % 27) / 9);
    $cs = $Y * 27 + $X * 3 + $y * 9 + $x;
    $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
    $cs = $Y * 27 + $X * 3 + $y * 9 + $x;
    return ($id == $cs) ? $adrs : FALSE;
  }

  function adrs2id($adrs) {
    $id = (int) strsub("$adrs", 1, 2);
    $x = (int) strsub("$adrs", 4, 1);
    $X = (int) strsub("$adrs", 6, 1);
    $Y = (int) strsub("$adrs", 9, 1);
    $y = (int) strsub("$adrs", 11, 1);
    $cs = $Y * 27 + $X * 3 + $y * 9 + $x;
    return ($id == $cs) ? $id : FALSE;
  }
}


// M A I N start
require_once("subjects.php");

$com = '';
$cnp= '';

function update($obj) {
    $obj->set_cell3x3();
    $obj->set_cell91();
    $obj->set_cell19();
    $obj->set_cell_all();
    $obj->map_cand('cass');
}
function colrow2id($colrow) {
    $row = [ '0' =>   0, '1' =>   9, '2' =>  18,
             '3' =>   27, '4' =>   36, '5' =>   45,
             '6' =>   54, '7' =>   63, '8' =>   72,];
    $col = [
      'A' => 0, 'B' => 1, 'C' => 2,
      'D' => 3, 'E' => 4, 'F' => 5,
      'G' => 6, 'H' => 7, 'I' => 8,
      'a' => 0, 'b' => 1, 'c' => 2,
      'd' => 3, 'e' => 4, 'f' => 5,
      'g' => 6, 'h' => 7, 'i' => 8,
    ];
    return $row[substr($colrow,1,1)] + $col[substr($colrow,0,1)];
}


while($com !== "quit" and $com !== "q") {
  echo PHP_EOL;
  echo '$command-> ';
  $com_arr = [];
  $com_arr = explode(" ", trim(fgets(STDIN)));
  echo 'com: ';
  foreach($com_arr as $arg) {
    echo ' ' . $arg;
  }
  echo PHP_EOL;
  if (count($com_arr) >= 1) {
    $com = trim($com_arr[0]);
    $arc = count($com_arr);
  }
  if ($com === "init" or $com == "i") {
   $cnp->init_cell();
  } else
  if ($com === "load" or $com == "l") {
    $subject_keys = array_keys($subject);
    if ($arc == 1) {
      foreach($subject_keys as $no => $name) {
       echo $no .'. : '.$name. PHP_EOL;
      }
    } else {
      if ($arc == 2 and in_array((int)$com_arr[1],array_keys($subject_keys),true) === true) {
        $subject_no=(int)$com_arr[1];
        $subject_name =$subject_keys[$subject_no];
        $cnp = new NUMPLA(
          $subject[$subject_name],
          $subject_no,
          $subject_name
        );
        update($cnp);
      }
    }

  } else
  if ($com === "solveall" or $com === "a") {
    $resolved_count = 0;
    $cnp->map();
    $trial = 0;
    do {
      $cnp->set_cell3x3();
      $cnp->set_cell91();
      $cnp->set_cell19();
      $cnp->set_cell_all();
      $solved_count = count($cnp->det_solved_cells());
      if ($solved_count > 0) {
        $trial++;
        echo 'TRIAL No. ' . $trial . PHP_EOL;
        $cnp->apply_solved_cells();
        $cnp->map();
      }
    } while ($solved_count > 0);
    //var_dump($cnp->cell);
    $cnp->map();
  } else
  if ($com === "update" or  $com === "u") {
    update($cnp);
  } else
  if ($com === "solve" or  $com === "s") {
    $cnp->set_cell3x3();
    $cnp->set_cell91();
    $cnp->set_cell19();
    $cnp->set_cell_all();
    $solved_count = count($cnp->det_solved_cells());
    if ($solved_count > 0) {
      $cnp->apply_solved_cells();
      $cnp->map();
    }
  } else
  if ($com === "mapdet") {
    $cnp->mapdet();
  } else
  if ($com === "map" or $com === "m") {
    $cnp->map();
      $p = $cnp->count_cells();
        echo sprintf(
          "PRESET  %1d\nSOLVED  %1d\nSOLVING %1d\n",
          $p[PRESET], $p[SOLVED], $p[SOLVING]). PHP_EOL;
  } else
  if ($com === "map33") {
    $cnp->map_cand('cass33');
  } else
  if ($com === "map91") {
    $cnp->map_cand('cass91');
  } else
  if ($com === "map19") {
    $cnp->map_cand('cass19');
  } else
  if ($com === "mapall" or $com === "all") {
    if ($arc == 1) {
      $cnp->map_cand('cass');
    } else
    if ($arc == 2) {
      $cnp->map_cand_masked('cass', $com_arr[1]);
    }
  } else
  if ($com === "prop" or $com === "prop2") {
    if (isset($cnp)  == true  and gettype($cnp) == 'object') {
      $p = $cnp->count_cells();
      if ($com === "prop") {
        echo sprintf(
          "PRESET  %1d\nSOLVED  %1d\nSOLVING %1d\n",
          $p[PRESET], $p[SOLVED], $p[SOLVING]). PHP_EOL;
      } else {
      echo sprintf(
     "CREATED %1d, PRESET  %1d, SOLVED  %1d, SOLVING %1d, DISPCA  %1d",
      $p[CREATED], $p[PRESET], $p[SOLVED], $p[SOLVING], $p[DISPCA]). PHP_EOL;
      }
    } else {
      echo 'Subject not loaded.'. PHP_EOL;
    }
  } else
  if ($com === "force" or $com === "f") {
    if (count($com_arr) == 3) {
      $colrow = $com_arr[1];
      $masknum= $com_arr[2];
      $id = colrow2id($colrow);
      echo 'id:'.$id.'('.$colrow .') += '. $masknum . PHP_EOL;
      $cnp->set_cell_mask($id, $masknum,true);
      update($cnp);
   //   $cnp->set_cell_all();
   //   $cnp->map_cand('cass');
    }
  } else
  if ($com === "mask" or $com === "k") {
    if (count($com_arr) == 3) {
      $colrow = $com_arr[1];
      $masknum= $com_arr[2];
      $id = colrow2id($colrow);
      echo 'id:'.$id.'('.$colrow .') += '. $masknum . PHP_EOL;
      $cnp->set_cell_mask($id, $masknum,false);
      $cnp->set_cell_all();
      $cnp->map_cand('cass');
    }
//  } else
//  if ($com === "mask" or $com === "m") {
//    if (count($com_arr) >= 1) {
//      $colrow = $com_arr[1];
//      echo 'colrow:'.$colrow . '  = '. colrow2id($colrow). PHP_EOL;
//    }
  } else
  if ($com === "help" or $com === "h") {
    echo PHP_EOL;
    echo "    1. load        (l)". PHP_EOL; 
    echo "    2. solveall    (a)". PHP_EOL;
    echo "    3. update      (u)". PHP_EOL;
    echo "    4. solve       (s)". PHP_EOL;
    echo "    5. mapdet"         . PHP_EOL;
    echo "    6. map         (m)". PHP_EOL;
    echo "    7. map33"          . PHP_EOL;
    echo "    8. map91"          . PHP_EOL;
    echo "    9. map19"          . PHP_EOL;
    echo "   10. mapall"        . PHP_EOL;
    echo "   11. prop       (p)". PHP_EOL;
    echo "   12. prop2"         . PHP_EOL;
    echo "   13. help       (h)". PHP_EOL;
  }
}
exit();


