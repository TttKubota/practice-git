<?php

const CREATED = 'CREATED';
const PRESET  = 'PRESET ';
const SOLVED  = 'SOLVED ';
const SOLVING = 'SOLVING';
const DISPCA  = 'DISPCA ';


class NUMPLA {
  var $cell = [];
  var $cass = [];

  function __construct($subject) {
    $this->init($subject);
  }

  function __set_cell_all() {
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $X) {
        foreach(range(0,2) as $y) {
          foreach(range(0,2) as $x) {
            $id = $Y * 27 + $X * 3 + $y * 9 + $x;
            $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
            $stat = $this->cell[$adrs]['stat'];
            var_dump($this->cell[$adrs]);

          //  if ($stat === SOLVING) {
          //    $this->cell[$adrs]['cass_all'] = $this->str_sort(
          //      $this->cell[$adrs]["cass33"] .
          //      $this->cell[$adrs]["cass91"] .
          //      $this->cell[$adrs]["cass19"] 
          //    );
          //  }
          }
        }
      }
    }
  }
  function get_prop($X,$Y,$x,$y) {
    $id = $Y * 27 + $X * 3 + $y * 9 + $x;
    $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
    $stat = $this->cell[$adrs]['stat'];
    $num  = $this->cell[$adrs]['num'];
    return [ $adrs, $stat, $num ];
  }
  function set_cell3x3() {
    $stat = CREATED;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $X) {
            $cass = "";
        foreach(range(0,2) as $y) {
          foreach(range(0,2) as $x) {
            $prop = $this->get_prop($X,$Y,$x,$y);
            $stat = $prop[1];
            $num  = $prop[2];
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $cass .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $y) {
          foreach(range(0,2) as $x) {
            $prop = $this->get_prop($X,$Y,$x,$y);
            $adrs= $prop[0];
            if ($stat === SOLVING) {
              $this->cell[$adrs]["cass33"]= $this->str_sort($cass);
            }
          }
        }
            $cass = "";
            var_dump($this->cell[$adrs]);
      }
    }
  }
  function set_cell9x1() {
    $stat = CREATED;
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
            $cass = "";
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            $prop = $this->get_prop($X,$Y,$x,$y);
            $stat = $prop[1];
            $num  = $prop[2];
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $cass .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            $prop = $this->get_prop($X,$Y,$x,$y);
            $adrs= $prop[0];
            if ($stat === SOLVING) {
              $this->cell[$adrs]["cass91"]= $this->str_sort($cass);
            }
          }
        }
            $cass = "";
            var_dump($this->cell[$adrs]);
      }
    }
  }
  
  function set_cell1x9() {
    $stat = CREATED;
    foreach(range(0,2) as $X) {
      foreach(range(0,2) as $x) {
            $cass = "";
        foreach(range(0,2) as $Y) {
          foreach(range(0,2) as $y) {
            $prop = $this->get_prop($X,$Y,$x,$y);
            $stat = $prop[1];
            $num  = $prop[2];
            if (in_array($stat, [ PRESET, SOLVED ], True)) {
              $cass .= (string)$num;
            }
          }
        }
        foreach(range(0,2) as $Y) {
          foreach(range(0,2) as $y) {
            $prop = $this->get_prop($X,$Y,$x,$y);
            $adrs= $prop[0];
            if ($stat === SOLVING) {
              $this->cell[$adrs]["cass19"]= $this->str_sort($cass);
            }
          }
        }
            $cass = "";
            var_dump($this->cell[$adrs]);
      }
    }
  }
  
  function str_sort($str) {
    $ret = "";
    foreach(range(1,9) as $n) {
      if (strpos($str, (string)$n) !== false) {
        $ret .= $n;
      }
    }
  //  return $ret;
    return ($ret === "") ? "0" : $ret;
  }

  function str_rev_sort($str) {
    $ret = "";
    foreach(range(1,9) as $n) {
      if (strpos($str, (string)$n) === false) {
        $ret .= $n;
      }
    }
    return ($ret === "") ? "0" : $ret;
  }

  function merge_array($arrays) {
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
            $prop = $this->get_prop($X,$Y,$x,$y);
            $adrs= $prop[0];
            $stat= $prop[1];
            if ($stat === SOLVING) {
              $cass = ( $this->cell[$adrs]["cass33"] .  $this->cell[$adrs]["cass91"] .  $this->cell[$adrs]["cass19"]);
              echo 'CASS1 : ' . $this->cell[$adrs]["cass33"] . PHP_EOL;
              echo 'CASS2 : ' . $this->cell[$adrs]["cass91"] . PHP_EOL;
              echo 'CASS3 : ' . $this->cell[$adrs]["cass19"] . PHP_EOL;
              echo 'CASS0 : ' . $cass . PHP_EOL;

              $this->cell[$adrs]["cass"] = 
                $this->str_rev_sort($cass);
              echo 'CASS4 : ' . $this->cell[$adrs]["cass"] . PHP_EOL;
            }
    //        echo 'CASS ' . $cass. PHP_EOL;
          }
        }
      }
    }
              
    var_dump($this->cell[$adrs]);
  }
  
  function _cell($id) {
    $X = ((int)($id / 3)) % 3;
    $Y = (int)($id /27);
    foreach(range(0,2) as $y) {
      foreach(range(0,2) as $x) {
        $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
        $this->cass3x3[$adrs] = (int) 0;
      }
    }
    $Y = (int)($id /27);
    $y = (int)(($id % 27) / 9);
    foreach(range(0,2) as $X) {
      foreach(range(0,2) as $x) {
        $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
        $this->cass9x1[$adrs] = (int) 0;
      }
    }
    $x = (int)($id % 3) ;
    $X = ((int)($id / 3)) % 3;
    foreach(range(0,2) as $X) {
      foreach(range(0,2) as $x) {
        $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
        $this->cass1x9[$adrs] = (int) 0;
      }
    }
    return $cass1x9;
  }

  function init($subject) {
    foreach ($subject as $cell_id => $num) {
      $cell_adrs = $this->id2adrs($cell_id); 
      echo $cell_adrs . 'LINE='. __LINE__ .PHP_EOL;
      if ($num > 0) {
echo PRESET. PHP_EOL;
        $this->cell[$cell_adrs] = [
          'adrs' => $cell_adrs,
          'stat' => PRESET,
          'num'  => $num,
        ];
      } else {
echo SOLVING . PHP_EOL;
        $this->cell[$cell_adrs] = [
          'adrs' => $cell_adrs,
          'stat' => SOLVING,
          'num'  => 0,
          'cass' => $this->cass,
        ];
      }
    }
    var_dump($this->cell);
  }
  function id2adrs($id) {
    $x = (int)($id % 3) ;
    $X = ((int)($id / 3)) % 3;
    $Y = (int)($id /27);
    $y = (int)(($id % 27) / 9);
    $cs = $Y * 27 + $X * 3 + $y * 9 + $x;
//    echo sprintf("/////%d :%d + %d  + %d + %d = %d",$id, $Y * 27,$X * 3,$y * 9 ,$x , $cs). PHP_EOL;
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
//    echo sprintf("/////%d :%d + %d  + %d + %d = %d",$id, $Y * 27,$X * 3,$y * 9 ,$x , $cs). PHP_EOL;
//    return sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
  }
}


// M A I N start

// p068
$subject_P068 = [
  //X     0  0  0   1  1  1    2  2  2
  //x     0  1  2   3  4  5    6  7  8
  //y
//Y
   0, 0, 3,  0, 0, 8,   5, 0, 0,  //  0   0
   5, 0, 7,  3, 4, 0,   0, 9, 0,  //  0   1
   0, 2, 0,  0, 0, 0,   0, 0, 7,  //  0   2
                                  //       
   3, 7, 0,  5, 6, 0,   0, 0, 9,  //  1   0
   0, 0, 6,  0, 3, 9,   7, 5, 0,  //  1   1
   0, 5, 9,  0, 0, 4,   6, 0, 0,  //  1   2
                                  //       
   0, 0, 2,  4, 0, 7,   8, 0, 0,  //  2   0
   7, 6, 5,  2, 8, 3,   9, 1, 4,  //  2   1
   8, 0, 4,  0, 1, 0,   0, 7, 0,  //  2   2
];

$subject_P168 = [
  //X     0  0  0   1  1  1    2  2  2
  //x     0  1  2   3  4  5    6  7  8
  //y
//Y
   1, 0, 3,  0, 0, 8,   5, 0, 0,  //  0   0
   5, 0, 7,  3, 4, 0,   0, 9, 0,  //  0   1
   0, 2, 0,  0, 0, 0,   0, 0, 7,  //  0   2
                                  //       
   3, 7, 0,  5, 6, 0,   0, 0, 9,  //  1   0
   0, 0, 6,  0, 3, 9,   7, 5, 0,  //  1   1
   0, 5, 9,  0, 0, 4,   6, 0, 0,  //  1   2
                                  //       
   0, 0, 2,  4, 0, 7,   1, 2, 3,  //  2   0
   7, 6, 5,  2, 8, 3,   4, 5, 6,  //  2   1
   8, 0, 4,  0, 1, 0,   7, 8, 9,  //  2   2
];

$cnp = new NUMPLA($subject_P168);
//var_dump($cnp->cell);
$cnp->set_cell3x3();
$cnp->set_cell9x1();
$cnp->set_cell1x9();
$cnp->set_cell_all();
exit();
echo '-----------------------------'. PHP_EOL;
exit();

$subject01 = [
  0, 0, 0,  0, 0, 0,   0, 0, 0,
  0, 0, 0,  0, 0, 0,   0, 0, 0,
  0, 0, 0,  0, 0, 0,   0, 0, 0,

  0, 0, 0,  0, 0, 0,   0, 0, 0,
  0, 0, 0,  0, 0, 0,   0, 0, 0,
  0, 0, 0,  0, 0, 0,   0, 0, 0,

  0, 0, 0,  0, 0, 0,   0, 0, 0,
  0, 0, 0,  0, 0, 0,   0, 0, 0,
  0, 0, 0,  0, 0, 0,   0, 0, 0,
];

// $cnp = new NUMPLA($subject01);


