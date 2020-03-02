<?php

const CREATED = 'CREATED';
const PRESET  = 'PRESET';
const SOLVED  = 'SOLVED';
const SOLVING = 'SOLVING';
const DISPCA  = 'DISPCA';


class NUMPLA {
  var $cell = [];
  var $cass = [];
  var $single_cad_list= [];

  function __construct($subject) {
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
    return [ $adrs, $stat, $num, $cass, $cass33, $cass91, $cass19 ];
  }

  function set_cell3x3() {
    $stat = CREATED;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $X) {
        $cass = "";
        foreach(range(0,2) as $y) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num, zzzzzz)
            = $this->get_prop($X,$Y,$x,$y);
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $cass .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $y) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num, zzzzzz)
            = $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
              $this->cell[$adrs]["cass33"]= $this->str_sort($cass);
            }
          }
        }
        $cass = "";
        // var_dump($this->cell[$adrs]);
      }
    }
  }

  function set_cell91() {
    $stat = CREATED;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        $cass = "";
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num, zzzzzz)
            = $this->get_prop($X,$Y,$x,$y);
//            list($adrs,$stat,$num, zzzzzz) $this->get_prop($X,$Y,$x,$y);
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $cass .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs,$stat,$num, zzzzzz) $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
              $this->cell[$adrs]["cass91"]= $this->str_sort($cass);
            }
          }
        }
        $cass = "";
        // var_dump($this->cell[$adrs]);
      }
    }
  }
  
  function set_cell19() {
    $stat = CREATED;
    foreach(range(0,2) as $X) {
      foreach(range(0,2) as $x) {
        $cass = "";
        foreach(range(0,2) as $Y) {
          foreach(range(0,2) as $y) {
            list($adrs,$stat,$num, zzzzzz) $this->get_prop($X,$Y,$x,$y);
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $cass .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $Y) {
          foreach(range(0,2) as $y) {
            list($adrs,$stat,$num, zzzzzz) $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
              $this->cell[$adrs]["cass19"]= $this->str_sort($cass);
            }
          }
        }
        $cass = "";
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

  function _str_rev_sort($str) {
    $ret = "0";
    foreach(range(0,9) as $n) {
      if (strpos($str, (string)$n) === false) {
        $ret .= $n;
      }
    }
    return $ret;
    //return ($ret === "") ? "0" : $ret;
  }
  function str_rev_sort($str33,$str91,$str19) {
    $ret = "0";
    $valid = true;
    foreach(range(0,9) as $n) {
        $valid = true;
      foreach([$str33,$str91,$str19] as $str) {
        echo 'STR;'.$str. PHP_EOL;
        if (strpos($str, (string)$n) === false) {
          $valid = false;
          break;
        }
      }
      if ($valid == true) {
        $ret .= $n;
      }
      echo 'str:'.$str.' n:'.$n.' valid:'.$valid. PHP_EOL;
    }
    return $ret;
    //return ($ret === "") ? "0" : $ret;
  }

  function gen_cand($str) {
    $ret = "";
    foreach(range(1,9) as $c) {
      $ret .= (strpos($str, (string)$c) === false) ? (string)$c : '*';
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
            list($adrs,$stat,$num, zzzzzz) $this->get_prop($X,$Y,$x,$y);
            if ($stat === SOLVING) {
               $str33 = $this->cell[$adrs]["cass33"];
               $str91 = $this->cell[$adrs]["cass91"];
               $str19 = $this->cell[$adrs]["cass19"];
                
               $this->cell[$adrs]["cass"] = 
                $this->str_rev_sort($str33,$str91,$str19);
        //      echo 'CASS4 : ' . $this->cell[$adrs]["cass"] . PHP_EOL;
            }
    //        echo 'CASS ' . $cass. PHP_EOL;
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
            list($adrs,$stat,$num, zzzzzz) $this->get_prop($X,$Y,$x,$y);
            $cass = $this->cell[$adrs]["cass"];
            if ($stat === SOLVING and strlen($cass) == 2)  {
              $cass = str_replace("0", "", $cass);
              $this->single_cad_list[] = [ "adrs" => $adrs, "num" => $cass ];
                 echo 'SOLVED:: '.$adrs.' = '.$cass. PHP_EOL;
            }
    //        echo 'CASS ' . $cass. PHP_EOL;
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

  function map() {
    echo '-----------------------------'. PHP_EOL;
    $solving_count = 0;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs,$stat,$num, zzzzzz) $this->get_prop($X,$Y,$x,$y);
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
    echo "not opened : " . $solving_count . PHP_EOL;
  }

  function map_cand($cass_name) {
    echo '-----------------------------'. PHP_EOL;
    $solving_count = 0;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        $arr_str = [];
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num, zzzzzz)
                $this->get_prop($X,$Y,$x,$y);
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
              $arr_str[] = $this->gen_cand($map_cass);
            } else {
              $arr_str[] = "    " . $num . "    ";
            }
          }
        }
      //  echo '--- --- --- --- --- --- --- --- ---'. PHP_EOL;
        echo '  -A- -B- -C- -D- -E- -F- -G- -H- -I-'. PHP_EOL;
        foreach(range(0,2) as $l) {
          echo 3*$Y+$y .'|';
          foreach(range(0,2) as $X) {
            foreach(range(0,2) as $x) {
              echo substr($arr_str[3* $X + $x],3*$l,3).'|';
            }
          }
            echo PHP_EOL;
        }
      }
    }
        echo '  -A- -B- -C- -D- -E- -F- -G- -H- -I-'. PHP_EOL;
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
      //echo $cell_adrs . 'LINE='. __LINE__ .PHP_EOL;
      if ((int)$num > 0) {
//echo PRESET. PHP_EOL;
        $this->cell[$cell_adrs] = [
          'adrs' => $cell_adrs,
          'stat' => PRESET,
          'num'  => (string)$num,
          'cass' => "0",
          'cass33' => "0",
          'cass19' => "0",
          'cass91' => "0",
        ];
      } else {
//echo SOLVING . PHP_EOL;
        $this->cell[$cell_adrs] = [
          'adrs' => $cell_adrs,
          'stat' => SOLVING,
          'num'  => (string)0,
          'cass33' => "0",
          'cass19' => "0",
          'cass91' => "0",
          'cass' =>  "0",
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
$cnp;

while($com !== "quit") {
  echo '$command-> ';
  $com = trim(fgets(STDIN));
  echo 'com: '. $com. PHP_EOL;
  if ($com === "load") {
    $cnp = new NUMPLA($subject_Px14);
  } else
  if ($com === "update" or  $com === "u") {
    $cnp->set_cell3x3();
    $cnp->set_cell91();
    $cnp->set_cell19();
    $cnp->set_cell_all();
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
  if ($com === "map") {
    $cnp->map();
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
  if ($com === "mapall") {
    $cnp->map_cand('cass');
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
  }
}
exit();

$load_subject = $subject_P178;
$cnp = new NUMPLA($load_subject);
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
exit();


