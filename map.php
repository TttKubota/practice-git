<?php

class NUMPLA {

  function __construct($subject, $subject_no, $subject_name ) {
     $this->subject_no = $subject_no;
     $this->subject_name = $subject_name;
     $this->init($subject);
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

}

