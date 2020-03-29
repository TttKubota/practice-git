#!/usr/bin/php
<?php

// require_once("error.php");
require_once("define.php");
require_once("define_adrs.php");
require_once("define_sub.php");
require_once("class_numplax.php");

$area_list = [
 'area91' => [ 'list' => $cell_id_91_full, 'tag' => 'cass91', 'search' => $cell_id_91], 
 'area19' => [ 'list' => $cell_id_19_full, 'tag' => 'cass19', 'search' => $cell_id_19],
 'area33' => [ 'list' => $cell_id_33_full, 'tag' => 'cass33', 'search' => $cell_id_33],
 'area'   => [ 'list' => $total_direct,    'tag' => 'cass'  , 'search' => $cell_id_33],
];

function solve($sub) {
  global $cell_id_91; 
  global $cell_id_33; 
  global $cell_id_to_cell_adrs;
  global $total_direct; 
  global $cell_adrs_to_cell_id;
  global $cell_id_91_full;
  global $cell_id_19_full;
  global $cell_id_33_full;
  global $total_direct;

    $candidate_list = [];
      foreach($total_direct as $tag_of_total => $candidates) {
        $cand = [];
        foreach($candidates as $candidate) {
          if ($sub[$candidate] > 0) {
            $cand[] = $sub[$candidate];
          }
        }
        foreach (range(1,9) as $tn) {
          if (in_array($tn, $cand,true)==false) {
//          echo $name . ':::' . $cell_id_to_cell_adrs[$tag_of_total] .
                   ' : ' . $tn. PHP_EOL;;
            $candidate_list[$cell_id_to_cell_adrs[$tag_of_total]][] = $tn;
          }
        }
      }
  return $candidate_list;
}
function make_area_candidate_list($sub, $area) {
  global $cell_id_91; 
  global $cell_id_19; 
  global $cell_id_33; 
  global $cell_id_91_full; 
  global $cell_id_19_full; 
  global $cell_id_33_full; 
  global $total_direct;
  global $cell_id_to_cell_adrs;
  global $total_direct; 
  global $cell_adrs_to_cell_id;
  global $area_list;

    $candidate_list = [];
      foreach($area['list'] as $tag_of_total => $candidates) {
        $cand = [];
        foreach($candidates as $candidate) {
          if (preg_match("/[A-I][0-9]/","$candidate") > 0) {
            $candidate = $cell_adrs_to_cell_id[$candidate];
          }
          if ($sub[$candidate] > 0) {
            $cand[] = $sub[$candidate];
          }
        }
        foreach (range(1,9) as $tn) {
          if (in_array($tn, $cand,true)==false) {
//          echo $name . ':::' . $cell_id_to_cell_adrs[$tag_of_total] .
//                   ' : ' . $tn. PHP_EOL;;
            $candidate_list[$cell_id_to_cell_adrs[$tag_of_total]][] = $tn;
          }
        }
      }
  return $candidate_list;
}

function set_cass_on_array_cell($candidate_list, $obj) {
  foreach($candidate_list as $adrs => $num_list) {
    $str = "";
    foreach($num_list as $key => $num) {
      $str .= (string)$num;
    }
    $obj-> write_cell($adrs, "cass91", $str);
  }
}

  function make_resolved_list($candidate_list, $obj) {
    global $cell_id_33_num_index; 
    $count_of_target = 1;
    $resolved_list = [];
    foreach($cell_id_33 as $tag =>  $cell_id) {
      $resolved_list = array_merge(
        $resolved_list,
        strategy_03($candidate_list, $cell_id, $count_of_target)
      );
    }
    foreach($resolved_list as $item) {
      echo sprintf("solve %s %d\n",$item[0], $item[1]);
    }
  }

// -------------main ---------------
function main($CSNobj,$subjctBankObj, $subject_No){
  global $cell_id_91_full;
  global $cell_id_19_full;
  global $cell_id_33_full;
  global $total_direct;
  global $area_list;


  $NO = 3;
  $area_No_to_tag_name = [ 
    0 => 'area91',
    1 => 'area19', 
    2 => 'area33', 
    3 => 'area', 
  ];

  do {
    $result = [];
    foreach(range(0,3) as $NO) {
      $area = $area_list[$area_No_to_tag_name[$NO]]; 
      $candidate_list = make_area_candidate_list($CSNobj->sub, $area);
      set_cass_on_array_cell($candidate_list, $CSNobj);
      echo 'line:'.__LINE__.'candidate_list'.PHP_EOL;
  //  var_dump($candidate_list);
      $CSNobj->map_cand_masked($area, 0);
      echo 'REMAINING: ' . $CSNobj->get_remaining(). PHP_EOL;
      $result = $CSNobj-> make_area_count_list($candidate_list, $area);
      $CSNobj->map_cand_masked($area, 0);
      echo 'REMAINING: ' . $CSNobj->get_remaining(). PHP_EOL;
    }
  } while(count($result) > 0);
  echo "RESULT : " . $subject_No;
  $rem = $CSNobj->get_remaining();
  if ($rem > 0) {
    echo "FAILED: remaining " . $rem. PHP_EOL;
  } else {
    echo "SUCCESS: remaining " . $rem. PHP_EOL;
  }
}

// class_numplax.php  line  301 $sub_name
function pre_main() {
  $subjectBankObj = new subjectBank();
  $titles_of_subject = $subjectBankObj->get_titles();
  foreach($titles_of_subject as $no => $title) {
    echo sprintf("%4d: %s",$no, $title). PHP_EOL;
  }
  $play_list = [ 14,16 ];
  $CSNobj = new solveNumpla();

  $subjectBankObj = new subjectBank();
  foreach($play_list as $subject_No){
     $sub = $subjectBankObj->get_sub_by_id($subject_No);
     $CSNobj =  new solveNumpla();
     $CSNobj->init($sub);
     main($CSNobj,$subjectBankObj, $subject_No);
  }
}

pre_main();

?>


