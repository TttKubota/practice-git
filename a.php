<?php

const CREATED = 'CREATED';
const PRESET  = 'PRESET ';
const SOLVED  = 'SOLVED ';
const SOLVING = 'SOLVING';
const DISPCA  = 'DISPCA ';


class NUMPLA {
  public $cell = [];
  var $cass3x3 = [];
  var $cass9x1 = [];
  var $cass1x9 = [];
  function __construct($subject) {
    $this->init($subject);
//    $this->init1();
//    $this->init2();
  }

  function init1( $X0,$Y0,$x0,$y0) {
    $Y = $Y0;  
    $y = $y0;
    $X = $X0;
    $x = $x0;
    $id = $Y * 27 + $X * 3 + $y * 9 + $x;
    $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
    echo $adrs. PHP_EOL;;

       $adrs3x3 = sprintf("%1d:%1d", $X,$Y);
       $num=3;
       $this->cass3x3[$adrs3x3][$num] = $num;
       echo 'cass3x3[' . $adrs3x3 . ']['. $num . '] = ' . $num . PHP_EOL;;
        var_dump($this->cass3x3);
    }

  function init2( $X0,$Y0,$x0,$y0) {
    $Y = $Y0;  
    $y = $y0;
    $X = $X0;
    $x = $x0;
    $id = $Y * 27 + $X * 3 + $y * 9 + $x;
    $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
            $num  = $this->cell[$adrs]['num'];
    echo $adrs. PHP_EOL;;

       $adrs3x3 = sprintf("%1d:%1d", $X,$Y);
       echo 'cass3x3[' . $adrs3x3 . ']['. $num . '] = ' . $num . PHP_EOL;;
        var_dump($this->cass3x3);
    }

  function init($subject) {
    foreach ($subject as $cell_id => $num) {
      $cell_adrs = $this->id2adrs($cell_id); 
      if ($num > 0) {
        $this->cell[$cell_adrs] = [
          'stat' => PRESET,
          'num'  => $num,
        ];
      } else {
        $this->cell[$cell_adrs] = [
          'stat' => SOLVING,
          'num'  => 0,
          'arr_3x3' => $this->cass3x3,
          'arr_9x1' => $this->cass9x1,
          'arr_1x9' => $this->cass1x9,
          'arr_3x3_del' => $this->cass3x3,
          'arr_3x3_all' => $this->cass3x3,
        ];
      }
    }
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

$cnp = new NUMPLA($subject_P068);
  // function init2( $X0,$Y0,$x0,$y0) {
$cnp->init1(0,0,2,1);
$cnp->init2(0,0,2,1);
exit();
