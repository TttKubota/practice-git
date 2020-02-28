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
            $stat = $prop[1];
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
            $stat = $prop[1];
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
            $stat = $prop[1];
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
    $ret = "0";
    foreach(range(0,9) as $n) {
      if (strpos($str, (string)$n) !== false) {
        $ret .= $n;
      }
    }
    return $ret;
  //  return ($ret === "") ? "0" : $ret;
  }

  function str_rev_sort($str) {
    $ret = "0";
    foreach(range(0,9) as $n) {
      if (strpos($str, (string)$n) === false) {
        $ret .= $n;
      }
    }
    return $ret;
    //return ($ret === "") ? "0" : $ret;
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
            $prop = $this->get_prop($X,$Y,$x,$y);
            $adrs= $prop[0];
            $stat= $prop[1];
            if ($stat === SOLVING) {
              $cass = ( $this->cell[$adrs]["cass33"] . 
              $this->cell[$adrs]["cass91"] .  $this->cell[$adrs]["cass19"]);
              $this->cell[$adrs]["cass"] = 
                $this->str_rev_sort($cass);
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
            $prop = $this->get_prop($X,$Y,$x,$y);
            $adrs= $prop[0];
            $stat= $prop[1];
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
  }

  function map() {
    foreach(range(0,2) as $Y) {
      foreach(range(0,2) as $y) {
        foreach(range(0,2) as $X) {
          foreach(range(0,2) as $x) {
            list($adrs, $stat, $num) = $this->get_prop($X,$Y,$x,$y);
            echo $num;
          }
          echo ' ';
        }
        echo PHP_EOL;
      }
      echo PHP_EOL;
    }
    echo PHP_EOL;
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
      echo $cell_adrs . 'LINE='. __LINE__ .PHP_EOL;
      if ((int)$num > 0) {
echo PRESET. PHP_EOL;
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
echo SOLVING . PHP_EOL;
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
require_once("subjects.php");

//$cnp = new NUMPLA($subject_P001);
$cnp = new NUMPLA($subject_P011);
$resolved_count = 0;
$cnp->map();
do {
  $cnp->set_cell3x3();
  $cnp->set_cell9x1();
  $cnp->set_cell1x9();
  $cnp->set_cell_all();
  $solved_count = count($cnp->det_solved_cells());
  if ($solved_count > 0) {
    $cnp->apply_solved_cells();
    $cnp->map();
  }
} while ($solved_count > 0);
var_dump($cnp->cell);
$cnp->map();
exit();
echo '-----------------------------'. PHP_EOL;


