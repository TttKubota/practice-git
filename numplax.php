<?php

const CREATED = 0;
const PRESET  = 1;
const SOLVED  = 2;
const SOLVING = 3;
const DISPCA  = 4;


class NUMPLA {
  public $cell = [];
  public $cass = [];
  function __construct($subject) {
    $this->init($subject);
  }

  function cell($id) {
    $X = ((int)($id / 3)) % 3;
    $Y = (int)($id /27);
      foreach(range(0,2) as $y) {
        foreach(range(0,2) as $x) {
          $adrs = sprintf("%02d:%1d:%1d::%1d:%1d",$id, $X,$Y,$x,$y);
          $cass3x3[$adrs] = 0;
        }
      }
    ];
    return $cass3x3;
  }

  function init($subject) {
    foreach ($subject as $cell_id => $num) {
      $cell_adrs = $this->id2adrs($cell_id); 
      $this->cell['c3x3:'. $cell_adrs] = [
          'stat' => ($num > 0) ? PRESET : SOLVING,
          'num'  => $num,
    ]
    if ('stat' == SOLVING) {
      $this->cell[$cell_adrs] => $this->cas3x3,
 //         'cas9x1'  => $this->cas9x1,
 //         'cas1x9'  => $this->cas1x9,
 //         'castotal'=> $this->castotal,
 //         'casdel'  => $this->casdel,
        ];
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
var_dump($cnp->cell);
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

$cnp = new NUMPLA($subject01);


