#!/usr/bin/php
<?php

// Numpla (Sudoku) Input Helper
// 2020年  3月 26日 木曜日 15:40:37 JST
//
// function
//  1. easy input. you can key in just only digit numbers
//     like this.
//        100 050 609 ...
//  2. this tool convert above str as follows
//        1, 0, 0,  0, 5, 0,   6, 0, 9,
//        ......
//    2-1. input
//        1-9    copied to output as it is
//        0      copied to output as it is
//        zn'    converted into n of zero
//               ex. z7   -->  '0000000'
//        max 81 of digit number have to be input
//        when only less than 81 of numbers are given,
//        short numbers added via this tool.
//  3. create array definition function source list via PHP.
//  4. as follows

//          <?php
//          // original str :
//          // 12345
//          $ext_sub = array('subject_12345000.php' => [
//          1,2,3, 4,5,0, 0,0,0, 
//          0,0,0, 0,0,0, 0,0,0, 
//          0,0,0, 0,0,0, 0,0,0, 
//          
//          0,0,0, 0,0,0, 0,0,0, 
//          0,0,0, 0,0,0, 0,0,0, 
//          0,0,0, 0,0,0, 0,0,0, 
//          
//          0,0,0, 0,0,0, 0,0,0, 
//          0,0,0, 0,0,0, 0,0,0, 
//          0,0,0, 0,0,0, 0,0,0, 
//          
//          ]);

//  5. Name of the array are given from arg[1], as
//     command line 'npz.php 123' makes
//          $ext_sub = array('subject_123.php' => [
// -rw-r--r-- 1 pi pi   298  3月 26 15:27 subject_123.php

//  6. when no arg[1] is given, the file name is refered  like this.
// -rw-r--r-- 1 pi pi   294  3月 26 15:37 subject_99999999.php


// key in str : 809 070 420 070 403 091 16 z65 2z2639 010 34z37
//                  00809z3103092z67603710250017052603
//  file created.
//  <?php
//  // original str :
//  // 809 070 420 070 403 091 16 z65 2z2639 010 34z3700809z3103092z67603710250017052603
//  $ext_sub = array('subject_17.php' => [
//    8,0,9, 0,7,0, 4,2,0, 
//    0,7,0, 4,0,3, 0,9,1, 
//    1,6,0, 0,0,0, 0,0,5, 
//    
//    2,0,0, 6,3,9, 0,1,0, 
//    3,4,0, 0,0,7, 0,0,8, 
//    0,9,0, 0,0,1, 0,3,0, 
//    
//    9,2,0, 0,0,0, 0,0,7, 
//    6,0,3, 7,1,0, 2,5,0, 
//    0,1,7, 0,5,2, 6,0,3, 
//  ]);
//  
if (count($argv) == 2) {
  $title = 
    preg_replace(
    "/^[^0-9]*([0-9]+)[^0-9]*$/",
    "subject_$1.php", 
    "$argv[1]"
  );
  echo $title . PHP_EOL;
} else {
  $title = '';
}

echo 'input numpla subject string.:: ';
$qz = trim(fgets(STDIN));
$org_str = $qz;

//  $qz = "102003z34z45z56z67z78z89z9";
//  $qz009 = "z742 062107903 05300201"
//      .  "z36700580 31596z4 970245060"
//      .  "6z373490 580620130 03451";
//$qz = $qz009;

$qz = preg_replace("/ /", "", $qz);
$qz = preg_replace("/[^0-9zZ]/", "", $qz);
foreach(range(9,0,-1) as $zl) {
  $zero = str_repeat("0",$zl);
  $preg = sprintf("/[zZ]{1}%1d/",$zl);
  $qz = preg_replace("$preg", "$zero", $qz);

  $st = 81-strlen($qz);
  if ($st > 0) {
    $qz .= str_repeat("0",$st);
  }
}
if ($title == null) {
  $title = 'subject_' . substr($qz,0,9) . '.php';
}

  $str = '<?php' . PHP_EOL;
  $str .= '// original str :'. PHP_EOL;
  $str .= "// $org_str" . PHP_EOL;
  $str .= "\$ext_sub = array('$title' => [" . PHP_EOL;
  foreach(range(0,80) as $i) {
    $str .= substr($qz,$i,1).",";
    if (($i % 3) === 2)   { $str .= " ";   }
    if (($i % 9) === 8)   { $str .= PHP_EOL;}
    if (($i % 27) === 26) { $str .= PHP_EOL;}
  }
  $str .= ']);' . PHP_EOL;
  echo $str;
  file_put_contents($title, $str);
  echo PHP_EOL;
  echo 'done..'. PHP_EOL;
  echo 'done..'. PHP_EOL;
