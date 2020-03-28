<?php
// standart cell numbering order
// $cell_id
$cell_id = [
  0,  1,  2,  3,  4,  5,  6,  7,  8,
  9, 10, 11, 12, 13, 14, 15, 16, 17,
 18, 19, 20, 21, 22, 23, 24, 25, 26,
 27, 28, 29, 30, 31, 32, 33, 34, 35,
 36, 37, 38, 39, 40, 41, 42, 43, 44,
 45, 46, 47, 48, 49, 50, 51, 52, 53,
 54, 55, 56, 57, 58, 59, 60, 61, 62,
 63, 64, 65, 66, 67, 68, 69, 70, 71,
 72, 73, 74, 75, 76, 77, 78, 79, 80,
 ];


// standart cell numbering order in column/row format
// $cell_adrs ---> cell_id
$cell_adrs_to_cell_id = [];
$cell_adrs_to_cell_id = [
 "A0"=> 0, "B0"=> 1, "C0"=> 2, "D0"=> 3, "E0"=> 4, "F0"=> 5, "G0"=> 6, "H0"=> 7, "I0"=> 8,
 "A1"=> 9, "B1"=>10, "C1"=>11, "D1"=>12, "E1"=>13, "F1"=>14, "G1"=>15, "H1"=>16, "I1"=>17,
 "A2"=>18, "B2"=>19, "C2"=>20, "D2"=>21, "E2"=>22, "F2"=>23, "G2"=>24, "H2"=>25, "I2"=>26,
// --  --  --  --  --  --  -- |--  --  --  --  --  --  --  -|  --  --  --  --  --  --  --|
 "A3"=>27, "B3"=>28, "C3"=>29, "D3"=>30, "E3"=>31, "F3"=>32, "G3"=>33, "H3"=>34, "I3"=>35,
 "A4"=>36, "B4"=>37, "C4"=>38, "D4"=>39, "E4"=>40, "F4"=>41, "G4"=>42, "H4"=>43, "I4"=>44,
 "A5"=>45, "B5"=>46, "C5"=>47, "D5"=>48, "E5"=>49, "F5"=>50, "G5"=>51, "H5"=>52, "I5"=>53,
// --  --  --  --  --  --  -- |--  --  --  --  --  --  --  -|  --  --  --  --  --  --  --|
 "A6"=>54, "B6"=>55, "C6"=>56, "D6"=>57, "E6"=>58, "F6"=>59, "G6"=>60, "H6"=>61, "I6"=>62,
 "A7"=>63, "B7"=>64, "C7"=>65, "D7"=>66, "E7"=>67, "F7"=>68, "G7"=>69, "H7"=>70, "I7"=>71,
 "A8"=>72, "B8"=>73, "C8"=>74, "D8"=>75, "E8"=>76, "F8"=>77, "G8"=>78, "H8"=>79, "I8"=>80,
 ];

// standart cell numbering order in column/row format
// $cell_id ---> cell_adrs
$cell_id_to_cell_adrs = [];
$cell_id_to_cell_adrs = [
 0=>"A0",  1=>"B0",  2=>"C0",  3=>"D0",  4=>"E0",  5=>"F0",  6=>"G0",  7=>"H0",  8=>"I0", 
 9=>"A1", 10=>"B1", 11=>"C1", 12=>"D1", 13=>"E1", 14=>"F1", 15=>"G1", 16=>"H1", 17=>"I1",
18=>"A2", 19=>"B2", 20=>"C2", 21=>"D2", 22=>"E2", 23=>"F2", 24=>"G2", 25=>"H2", 26=>"I2",
// - --  --  --  --  --  -- |--  --  --  --  --  --  --  -|  --  --  --  --  --  --  --|
27=>"A3", 28=>"B3", 29=>"C3", 30=>"D3", 31=>"E3", 32=>"F3", 33=>"G3", 34=>"H3", 35=>"I3",
36=>"A4", 37=>"B4", 38=>"C4", 39=>"D4", 40=>"E4", 41=>"F4", 42=>"G4", 43=>"H4", 44=>"I4",
45=>"A5", 46=>"B5", 47=>"C5", 48=>"D5", 49=>"E5", 50=>"F5", 51=>"G5", 52=>"H5", 53=>"I5",
// - --  --  --  --  --  -- |--  --  --  --  --  --  --  -|  --  --  --  --  --  --  --|
54=>"A6", 55=>"B6", 56=>"C6", 57=>"D6", 58=>"E6", 59=>"F6", 60=>"G6", 61=>"H6", 62=>"I6",
63=>"A7", 64=>"B7", 65=>"C7", 66=>"D7", 67=>"E7", 68=>"F7", 69=>"G7", 70=>"H7", 71=>"I7",
72=>"A8", 73=>"B8", 74=>"C8", 75=>"D8", 76=>"E8", 77=>"F8", 78=>"G8", 79=>"H8", 80=>"I8",
];



// S U B   G R O U P in

// Subgroup 91 in cell_adrs
// $cell_id ---> cell_adrs
$sub_group_91 = [
   "col_0" => [ "A0", "B0", "C0", "D0", "E0", "F0", "G0", "H0", "I0" ],
   "col_1" => [ "A1", "B1", "C1", "D1", "E1", "F1", "G1", "H1", "I1" ],
   "col_2" => [ "A2", "B2", "C2", "D2", "E2", "F2", "G2", "H2", "I2" ],
   "col_3" => [ "A3", "B3", "C3", "D3", "E3", "F3", "G3", "H3", "I3" ],
   "col_4" => [ "A4", "B4", "C4", "D4", "E4", "F4", "G4", "H4", "I4" ],
   "col_5" => [ "A5", "B5", "C5", "D5", "E5", "F5", "G5", "H5", "I5" ],
   "col_6" => [ "A6", "B6", "C6", "D6", "E6", "F6", "G6", "H6", "I6" ],
   "col_7" => [ "A7", "B7", "C7", "D7", "E7", "F7", "G7", "H7", "I7" ],
   "col_8" => [ "A8", "B8", "C8", "D8", "E8", "F8", "G8", "H8", "I8" ]
 ];

$sub_group_91_num_index = [
   0 => [ "A0", "B0", "C0", "D0", "E0", "F0", "G0", "H0", "I0" ],
   1 => [ "A1", "B1", "C1", "D1", "E1", "F1", "G1", "H1", "I1" ],
   2 => [ "A2", "B2", "C2", "D2", "E2", "F2", "G2", "H2", "I2" ],
   3 => [ "A3", "B3", "C3", "D3", "E3", "F3", "G3", "H3", "I3" ],
   4 => [ "A4", "B4", "C4", "D4", "E4", "F4", "G4", "H4", "I4" ],
   5 => [ "A5", "B5", "C5", "D5", "E5", "F5", "G5", "H5", "I5" ],
   6 => [ "A6", "B6", "C6", "D6", "E6", "F6", "G6", "H6", "I6" ],
   7 => [ "A7", "B7", "C7", "D7", "E7", "F7", "G7", "H7", "I7" ],
   8 => [ "A8", "B8", "C8", "D8", "E8", "F8", "G8", "H8", "I8" ]
 ];

// Subgroup 19 in cell_adrs
// $cell_id ---> cell_adrs
$sub_group_19 = [
    "row_A" => [ "A0", "A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8" ],
    "row_B" => [ "B0", "B1", "B2", "B3", "B4", "B5", "B6", "B7", "B8" ],
    "row_C" => [ "C0", "C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8" ],
    "row_D" => [ "D0", "D1", "D2", "D3", "D4", "D5", "D6", "D7", "D8" ],
    "row_E" => [ "E0", "E1", "E2", "E3", "E4", "E5", "E6", "E7", "E8" ],
    "row_F" => [ "F0", "F1", "F2", "F3", "F4", "F5", "F6", "F7", "F8" ],
    "row_G" => [ "G0", "G1", "G2", "G3", "G4", "G5", "G6", "G7", "G8" ],
    "row_H" => [ "H0", "H1", "H2", "H3", "H4", "H5", "H6", "H7", "H8" ],
    "row_I" => [ "I0", "I1", "I2", "I3", "I4", "I5", "I6", "I7", "I8" ]
 ];                
 
// Subgroup 33 in cell_adrs
// $cell_id ---> cell_adrs
$sub_group_33 = [
  "group33_0" => [ "A0", "B0", "C0", "A1", "B1", "C1", "A2", "B2", "C2" ],
  "group33_1" => [ "D0", "E0", "F0", "D1", "E1", "F1", "D2", "E2", "F2" ],
  "group33_2" => [ "G0", "H0", "I0", "G1", "H1", "I1", "G2", "H2", "I2" ],
  "group33_3" => [ "A3", "B3", "C3", "A4", "B4", "C4", "A5", "B5", "C5" ],
  "group33_4" => [ "D3", "E3", "F3", "D4", "E4", "F4", "D5", "E5", "F5" ],
  "group33_5" => [ "G3", "H3", "I3", "G4", "H4", "I4", "G5", "H5", "I5" ],
  "group33_6" => [ "A6", "B6", "C6", "A7", "B7", "C7", "A8", "B8", "C8" ],
  "group33_7" => [ "D6", "E6", "F6", "D7", "E7", "F7", "D8", "E8", "F8" ],
  "group33_8" => [ "G6", "H6", "I6", "G7", "H7", "I7", "G8", "H8", "I8" ]
 ];

// Subgroup 91 in cell_id
// $cell_id ---> cell_id
$cell_id_91_full = [
  0 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  1 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  2 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  3 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  4 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  5 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  6 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  7 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  8 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  9 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  10 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  11 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  12 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  13 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  14 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  15 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  16 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  17 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  18 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  19 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  20 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  21 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  22 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  23 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  24 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  25 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  26 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  27 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  28 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  29 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  30 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  31 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  32 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  33 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  34 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  35 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  36 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  37 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  38 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  39 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  40 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  41 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  42 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  43 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  44 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  45 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  46 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  47 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  48 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  49 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  50 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  51 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  52 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  53 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  54 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  55 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  56 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  57 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  58 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  59 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  60 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  61 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  62 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  63 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  64 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  65 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  66 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  67 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  68 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  69 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  70 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  71 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  72 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  73 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  74 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  75 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  76 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  77 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  78 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  79 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
  80 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
 ];

$cell_id_91 = [
  0 => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  1 => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  2 => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  3 => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  4 => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  5 => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  6 => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  7 => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  8 => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
 ];

// Subgroup 19 in cell_id
// $cell_id ---> cell_id
$cell_id_19_full = [
  0 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  1 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  2 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  3 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  4 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  5 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  6 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  7 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  8 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  9 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  10 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  11 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  12 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  13 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  14 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  15 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  16 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  17 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  18 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  19 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  20 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  21 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  22 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  23 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  24 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  25 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  26 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  27 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  28 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  29 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  30 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  31 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  32 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  33 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  34 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  35 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  36 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  37 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  38 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  39 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  40 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  41 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  42 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  43 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  44 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  45 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  46 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  47 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  48 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  49 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  50 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  51 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  52 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  53 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  54 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  55 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  56 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  57 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  58 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  59 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  60 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  61 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  62 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  63 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  64 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  65 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  66 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  67 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  68 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  69 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  70 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  71 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
  72 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  73 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  74 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  75 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  76 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  77 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  78 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  79 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  80 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
 ];

$cell_id_19 = [
  0 => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  1 => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  2 => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  3 => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  4 => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  5 => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  6 => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  7 => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  8 => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
 ];

// Subgroup 33 in cell_id
// $cell_id ---> cell_id
$cell_id_33_full = [
  0 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  1 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  2 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  3 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  4 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  5 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  6 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  7 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  8 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  9 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  10 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  11 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  12 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  13 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  14 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  15 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  16 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  17 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  18 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  19 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  20 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  21 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  22 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  23 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  24 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  25 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  26 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],

  27 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  28 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  29 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  30 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  31 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  32 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  33 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  34 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  35 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  36 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  37 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  38 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  39 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  40 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  41 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  42 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  43 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  44 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  45 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  46 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  47 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  48 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  49 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  50 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  51 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  52 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  53 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  
  54 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  55 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  56 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  57 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  58 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  59 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  60 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  61 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  62 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  63 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  64 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  65 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  66 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  67 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  68 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  69 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  70 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  71 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  72 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  73 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  74 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  75 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  76 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  77 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  78 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  79 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
  80 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
 ];
$cell_id_33 = [
  0 => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  1 => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  2 => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  3 => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  4 => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  5 => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  6 => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  7 => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  8 => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
 ];
// Subgroup 91 in cell_id
// $cell_id ---> cell_id
$_cell_id_91 = [
  'row_0' => [  0,  1,  2,  3,  4,  5,  6,  7,  8, ], 
  'row_1' => [  9, 10, 11, 12, 13, 14, 15, 16, 17, ],
  'row_2' => [ 18, 19, 20, 21, 22, 23, 24, 25, 26, ],
  'row_3' => [ 27, 28, 29, 30, 31, 32, 33, 34, 35, ],
  'row_4' => [ 36, 37, 38, 39, 40, 41, 42, 43, 44, ],
  'row_5' => [ 45, 46, 47, 48, 49, 50, 51, 52, 53, ],
  'row_6' => [ 54, 55, 56, 57, 58, 59, 60, 61, 62, ],
  'row_7' => [ 63, 64, 65, 66, 67, 68, 69, 70, 71, ],
  'row_8' => [ 72, 73, 74, 75, 76, 77, 78, 79, 80, ],
 ];

// Subgroup 19 in cell_id
// $cell_id ---> cell_id
$_cell_id_19 = [
  'col_0' => [  0,  9, 18, 27, 36, 45, 54, 63, 72, ], 
  'col_1' => [  1, 10, 19, 28, 37, 46, 55, 64, 73, ],
  'col_2' => [  2, 11, 20, 29, 38, 47, 56, 65, 74, ],
  'col_3' => [  3, 12, 21, 30, 39, 48, 57, 66, 75, ],
  'col_4' => [  4, 13, 22, 31, 40, 49, 58, 67, 76, ],
  'col_5' => [  5, 14, 23, 32, 41, 50, 59, 68, 77, ],
  'col_6' => [  6, 15, 24, 33, 42, 51, 60, 69, 78, ],
  'col_7' => [  7, 16, 25, 34, 43, 52, 61, 70, 79, ],
  'col_8' => [  8, 17, 26, 35, 44, 53, 62, 71, 80, ],
 ];

// Subgroup 33 in cell_id
// $cell_id ---> cell_id
$_cell_id_33 = [
  'rc_00' => [  0,  1,  2,  9, 10, 11, 18, 19, 20, ],
  'rc_10' => [  3,  4,  5, 12, 13, 14, 21, 22, 23, ],
  'rc_20' => [  6,  7,  8, 15, 16, 17, 24, 25, 26, ],
  'rc_01' => [ 27, 28, 29, 36, 37, 38, 45, 46, 47, ],
  'rc_11' => [ 30, 31, 32, 39, 40, 41, 48, 49, 50, ],
  'rc_21' => [ 33, 34, 35, 42, 43, 44, 51, 52, 53, ],
  'rc_02' => [ 54, 55, 56, 63, 64, 65, 72, 73, 74, ],
  'rc_12' => [ 57, 58, 59, 66, 67, 68, 75, 76, 77, ],
  'rc_22' => [ 60, 61, 62, 69, 70, 71, 78, 79, 80, ],
 ];



// $total = [];
// $total = [
//    0 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_0'], $cell_id_19['col_0'] ], 
//    1 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_0'], $cell_id_19['col_1'] ], 
//    2 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_0'], $cell_id_19['col_2'] ], 
//    3 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_0'], $cell_id_19['col_3'] ], 
//    4 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_0'], $cell_id_19['col_4'] ], 
//    5 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_0'], $cell_id_19['col_5'] ], 
//    6 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_0'], $cell_id_19['col_6'] ], 
//    7 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_0'], $cell_id_19['col_7'] ], 
//    8 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_0'], $cell_id_19['col_8'] ], 
// 
//    9 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_1'], $cell_id_19['col_0'] ], 
//   10 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_1'], $cell_id_19['col_1'] ], 
//   11 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_1'], $cell_id_19['col_2'] ], 
//   12 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_1'], $cell_id_19['col_3'] ], 
//   13 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_1'], $cell_id_19['col_4'] ], 
//   14 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_1'], $cell_id_19['col_5'] ], 
//   15 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_1'], $cell_id_19['col_6'] ], 
//   16 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_1'], $cell_id_19['col_7'] ], 
//   17 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_1'], $cell_id_19['col_8'] ], 
// 
//   18 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_2'], $cell_id_19['col_0'] ], 
//   19 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_2'], $cell_id_19['col_1'] ], 
//   20 =>  [ $cell_id_33['rc_00'], $cell_id_91['row_2'], $cell_id_19['col_2'] ], 
//   21 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_2'], $cell_id_19['col_3'] ], 
//   22 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_2'], $cell_id_19['col_4'] ], 
//   23 =>  [ $cell_id_33['rc_10'], $cell_id_91['row_2'], $cell_id_19['col_5'] ], 
//   24 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_2'], $cell_id_19['col_6'] ], 
//   25 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_2'], $cell_id_19['col_7'] ], 
//   26 =>  [ $cell_id_33['rc_20'], $cell_id_91['row_2'], $cell_id_19['col_8'] ], 
//                              
//   27 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_3'], $cell_id_19['col_0'] ], 
//   28 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_3'], $cell_id_19['col_1'] ], 
//   29 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_3'], $cell_id_19['col_2'] ], 
//   30 =>  [ $cell_id_33['rc_11'], $cell_id_91['row_3'], $cell_id_19['col_3'] ], 
//   31 =>  [ $cell_id_33['rc_11'], $cell_id_91['row_3'], $cell_id_19['col_4'] ], 
//   32 =>  [ $cell_id_33['rc_11'], $cell_id_91['row_3'], $cell_id_19['col_5'] ], 
//   33 =>  [ $cell_id_33['rc_21'], $cell_id_91['row_3'], $cell_id_19['col_6'] ], 
//   34 =>  [ $cell_id_33['rc_21'], $cell_id_91['row_3'], $cell_id_19['col_7'] ], 
//   35 =>  [ $cell_id_33['rc_21'], $cell_id_91['row_3'], $cell_id_19['col_8'] ], 
//                             
//   36 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_4'], $cell_id_19['col_0'] ], 
//   37 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_4'], $cell_id_19['col_1'] ], 
//   38 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_4'], $cell_id_19['col_2'] ], 
//   39 =>  [ $cell_id_33['rc_11'], $cell_id_91['row_4'], $cell_id_19['col_3'] ], 
//   40 =>  [ $cell_id_33['rc_11'], $cell_id_91['row_4'], $cell_id_19['col_4'] ], 
//   41 =>  [ $cell_id_33['rc_11'], $cell_id_91['row_4'], $cell_id_19['col_5'] ], 
//   42 =>  [ $cell_id_33['rc_21'], $cell_id_91['row_4'], $cell_id_19['col_6'] ], 
//   43 =>  [ $cell_id_33['rc_21'], $cell_id_91['row_4'], $cell_id_19['col_7'] ], 
//   44 =>  [ $cell_id_33['rc_21'], $cell_id_91['row_4'], $cell_id_19['col_8'] ], 
// 
//   45 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_5'], $cell_id_19['col_0'] ], 
//   46 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_5'], $cell_id_19['col_1'] ], 
//   47 =>  [ $cell_id_33['rc_01'], $cell_id_91['row_5'], $cell_id_19['col_2'] ], 
//   48 =>  [ $cell_id_33['rc_11'], $cell_id_91['row_5'], $cell_id_19['col_3'] ], 
//   65 =>  [ $cell_id_33['rc_02'], $cell_id_91['row_7'], $cell_id_19['col_2'] ], 
//   66 =>  [ $cell_id_33['rc_12'], $cell_id_91['row_7'], $cell_id_19['col_3'] ], 
//   67 =>  [ $cell_id_33['rc_12'], $cell_id_91['row_7'], $cell_id_19['col_4'] ], 
//   68 =>  [ $cell_id_33['rc_12'], $cell_id_91['row_7'], $cell_id_19['col_5'] ], 
//   69 =>  [ $cell_id_33['rc_22'], $cell_id_91['row_7'], $cell_id_19['col_6'] ], 
//   70 =>  [ $cell_id_33['rc_22'], $cell_id_91['row_7'], $cell_id_19['col_7'] ], 
//   71 =>  [ $cell_id_33['rc_22'], $cell_id_91['row_7'], $cell_id_19['col_8'] ], 
// 
//   72 =>  [ $cell_id_33['rc_02'], $cell_id_91['row_8'], $cell_id_19['col_0'] ], 
//   73 =>  [ $cell_id_33['rc_02'], $cell_id_91['row_8'], $cell_id_19['col_1'] ], 
//   74 =>  [ $cell_id_33['rc_02'], $cell_id_91['row_8'], $cell_id_19['col_2'] ], 
//   75 =>  [ $cell_id_33['rc_12'], $cell_id_91['row_8'], $cell_id_19['col_3'] ], 
//   76 =>  [ $cell_id_33['rc_12'], $cell_id_91['row_8'], $cell_id_19['col_4'] ], 
//   77 =>  [ $cell_id_33['rc_12'], $cell_id_91['row_8'], $cell_id_19['col_5'] ], 
//   78 =>  [ $cell_id_33['rc_22'], $cell_id_91['row_8'], $cell_id_19['col_6'] ], 
//   79 =>  [ $cell_id_33['rc_22'], $cell_id_91['row_8'], $cell_id_19['col_7'] ], 
//   80 =>  [ $cell_id_33['rc_22'], $cell_id_91['row_8'], $cell_id_19['col_8'] ], 
// ];


$total_direct = [];
$total_direct = [
   0 => [  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 18, 19, 20, 27, 36, 45, 54, 63, 72, ],
   1 => [  0,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 18, 19, 20, 28, 37, 46, 55, 64, 73, ],
   2 => [  0,  1,  3,  4,  5,  6,  7,  8,  9, 10, 11, 18, 19, 20, 29, 38, 47, 56, 65, 74, ],
   3 => [  0,  1,  2,  4,  5,  6,  7,  8, 12, 13, 14, 21, 22, 23, 30, 39, 48, 57, 66, 75, ],
   4 => [  0,  1,  2,  3,  5,  6,  7,  8, 12, 13, 14, 21, 22, 23, 31, 40, 49, 58, 67, 76, ],
   5 => [  0,  1,  2,  3,  4,  6,  7,  8, 12, 13, 14, 21, 22, 23, 32, 41, 50, 59, 68, 77, ],
   6 => [  0,  1,  2,  3,  4,  5,  7,  8, 15, 16, 17, 24, 25, 26, 33, 42, 51, 60, 69, 78, ],
   7 => [  0,  1,  2,  3,  4,  5,  6,  8, 15, 16, 17, 24, 25, 26, 34, 43, 52, 61, 70, 79, ],
   8 => [  0,  1,  2,  3,  4,  5,  6,  7, 15, 16, 17, 24, 25, 26, 35, 44, 53, 62, 71, 80, ],
   9 => [  0,  1,  2, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 27, 36, 45, 54, 63, 72, ],
  10 => [  0,  1,  2,  9, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 28, 37, 46, 55, 64, 73, ],
  11 => [  0,  1,  2,  9, 10, 12, 13, 14, 15, 16, 17, 18, 19, 20, 29, 38, 47, 56, 65, 74, ],
  12 => [  3,  4,  5,  9, 10, 11, 13, 14, 15, 16, 17, 21, 22, 23, 30, 39, 48, 57, 66, 75, ],
  13 => [  3,  4,  5,  9, 10, 11, 12, 14, 15, 16, 17, 21, 22, 23, 31, 40, 49, 58, 67, 76, ],
  14 => [  3,  4,  5,  9, 10, 11, 12, 13, 15, 16, 17, 21, 22, 23, 32, 41, 50, 59, 68, 77, ],
  15 => [  6,  7,  8,  9, 10, 11, 12, 13, 14, 16, 17, 24, 25, 26, 33, 42, 51, 60, 69, 78, ],
  16 => [  6,  7,  8,  9, 10, 11, 12, 13, 14, 15, 17, 24, 25, 26, 34, 43, 52, 61, 70, 79, ],
  17 => [  6,  7,  8,  9, 10, 11, 12, 13, 14, 15, 16, 24, 25, 26, 35, 44, 53, 62, 71, 80, ],
  18 => [  0,  1,  2,  9, 10, 11, 19, 20, 21, 22, 23, 24, 25, 26, 27, 36, 45, 54, 63, 72, ],
  19 => [  0,  1,  2,  9, 10, 11, 18, 20, 21, 22, 23, 24, 25, 26, 28, 37, 46, 55, 64, 73, ],
  20 => [  0,  1,  2,  9, 10, 11, 18, 19, 21, 22, 23, 24, 25, 26, 29, 38, 47, 56, 65, 74, ],
  21 => [  3,  4,  5, 12, 13, 14, 18, 19, 20, 22, 23, 24, 25, 26, 30, 39, 48, 57, 66, 75, ],
  22 => [  3,  4,  5, 12, 13, 14, 18, 19, 20, 21, 23, 24, 25, 26, 31, 40, 49, 58, 67, 76, ],
  23 => [  3,  4,  5, 12, 13, 14, 18, 19, 20, 21, 22, 24, 25, 26, 32, 41, 50, 59, 68, 77, ],
  24 => [  6,  7,  8, 15, 16, 17, 18, 19, 20, 21, 22, 23, 25, 26, 33, 42, 51, 60, 69, 78, ],
  25 => [  6,  7,  8, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 26, 34, 43, 52, 61, 70, 79, ],
  26 => [  6,  7,  8, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 35, 44, 53, 62, 71, 80, ],
  27 => [  0,  9, 18, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 45, 46, 47, 54, 63, 72, ],
  28 => [  1, 10, 19, 27, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 45, 46, 47, 55, 64, 73, ],
  29 => [  2, 11, 20, 27, 28, 30, 31, 32, 33, 34, 35, 36, 37, 38, 45, 46, 47, 56, 65, 74, ],
  30 => [  3, 12, 21, 27, 28, 29, 31, 32, 33, 34, 35, 39, 40, 41, 48, 49, 50, 57, 66, 75, ],
  31 => [  4, 13, 22, 27, 28, 29, 30, 32, 33, 34, 35, 39, 40, 41, 48, 49, 50, 58, 67, 76, ],
  32 => [  5, 14, 23, 27, 28, 29, 30, 31, 33, 34, 35, 39, 40, 41, 48, 49, 50, 59, 68, 77, ],
  33 => [  6, 15, 24, 27, 28, 29, 30, 31, 32, 34, 35, 42, 43, 44, 51, 52, 53, 60, 69, 78, ],
  34 => [  7, 16, 25, 27, 28, 29, 30, 31, 32, 33, 35, 42, 43, 44, 51, 52, 53, 61, 70, 79, ],
  35 => [  8, 17, 26, 27, 28, 29, 30, 31, 32, 33, 34, 42, 43, 44, 51, 52, 53, 62, 71, 80, ],
  36 => [  0,  9, 18, 27, 28, 29, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 54, 63, 72, ],
  37 => [  1, 10, 19, 27, 28, 29, 36, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 55, 64, 73, ],
  38 => [  2, 11, 20, 27, 28, 29, 36, 37, 39, 40, 41, 42, 43, 44, 45, 46, 47, 56, 65, 74, ],
  39 => [  3, 12, 21, 30, 31, 32, 36, 37, 38, 40, 41, 42, 43, 44, 48, 49, 50, 57, 66, 75, ],
  40 => [  4, 13, 22, 30, 31, 32, 36, 37, 38, 39, 41, 42, 43, 44, 48, 49, 50, 58, 67, 76, ],
  41 => [  5, 14, 23, 30, 31, 32, 36, 37, 38, 39, 40, 42, 43, 44, 48, 49, 50, 59, 68, 77, ],
  42 => [  6, 15, 24, 33, 34, 35, 36, 37, 38, 39, 40, 41, 43, 44, 51, 52, 53, 60, 69, 78, ],
  43 => [  7, 16, 25, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 44, 51, 52, 53, 61, 70, 79, ],
  44 => [  8, 17, 26, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 51, 52, 53, 62, 71, 80, ],
  45 => [  0,  9, 18, 27, 28, 29, 36, 37, 38, 46, 47, 48, 49, 50, 51, 52, 53, 54, 63, 72, ],
  46 => [  1, 10, 19, 27, 28, 29, 36, 37, 38, 45, 47, 48, 49, 50, 51, 52, 53, 55, 64, 73, ],
  47 => [  2, 11, 20, 27, 28, 29, 36, 37, 38, 45, 46, 48, 49, 50, 51, 52, 53, 56, 65, 74, ],
  48 => [  3, 12, 21, 30, 31, 32, 39, 40, 41, 45, 46, 47, 49, 50, 51, 52, 53, 57, 66, 75, ],
  49 => [  4, 13, 22, 30, 31, 32, 39, 40, 41, 45, 46, 47, 48, 50, 51, 52, 53, 58, 67, 76, ],
  50 => [  5, 14, 23, 30, 31, 32, 39, 40, 41, 45, 46, 47, 48, 49, 51, 52, 53, 59, 68, 77, ],
  51 => [  6, 15, 24, 33, 34, 35, 42, 43, 44, 45, 46, 47, 48, 49, 50, 52, 53, 60, 69, 78, ],
  52 => [  7, 16, 25, 33, 34, 35, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 53, 61, 70, 79, ],
  53 => [  8, 17, 26, 33, 34, 35, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 62, 71, 80, ],
  54 => [  0,  9, 18, 27, 36, 45, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 72, 73, 74, ],
  55 => [  1, 10, 19, 28, 37, 46, 54, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 72, 73, 74, ],
  56 => [  2, 11, 20, 29, 38, 47, 54, 55, 57, 58, 59, 60, 61, 62, 63, 64, 65, 72, 73, 74, ],
  57 => [  3, 12, 21, 30, 39, 48, 54, 55, 56, 58, 59, 60, 61, 62, 66, 67, 68, 75, 76, 77, ],
  58 => [  4, 13, 22, 31, 40, 49, 54, 55, 56, 57, 59, 60, 61, 62, 66, 67, 68, 75, 76, 77, ],
  59 => [  5, 14, 23, 32, 41, 50, 54, 55, 56, 57, 58, 60, 61, 62, 66, 67, 68, 75, 76, 77, ],
  60 => [  6, 15, 24, 33, 42, 51, 54, 55, 56, 57, 58, 59, 61, 62, 69, 70, 71, 78, 79, 80, ],
  61 => [  7, 16, 25, 34, 43, 52, 54, 55, 56, 57, 58, 59, 60, 62, 69, 70, 71, 78, 79, 80, ],
  62 => [  8, 17, 26, 35, 44, 53, 54, 55, 56, 57, 58, 59, 60, 61, 69, 70, 71, 78, 79, 80, ],
  63 => [  0,  9, 18, 27, 36, 45, 54, 55, 56, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, ],
  64 => [  1, 10, 19, 28, 37, 46, 54, 55, 56, 63, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, ],
  65 => [  2, 11, 20, 29, 38, 47, 54, 55, 56, 63, 64, 66, 67, 68, 69, 70, 71, 72, 73, 74, ],
  66 => [  3, 12, 21, 30, 39, 48, 57, 58, 59, 63, 64, 65, 67, 68, 69, 70, 71, 75, 76, 77, ],
  67 => [  4, 13, 22, 31, 40, 49, 57, 58, 59, 63, 64, 65, 66, 68, 69, 70, 71, 75, 76, 77, ],
  68 => [  5, 14, 23, 32, 41, 50, 57, 58, 59, 63, 64, 65, 66, 67, 69, 70, 71, 75, 76, 77, ],
  69 => [  6, 15, 24, 33, 42, 51, 60, 61, 62, 63, 64, 65, 66, 67, 68, 70, 71, 78, 79, 80, ],
  70 => [  7, 16, 25, 34, 43, 52, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 71, 78, 79, 80, ],
  71 => [  8, 17, 26, 35, 44, 53, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 78, 79, 80, ],
  72 => [  0,  9, 18, 27, 36, 45, 54, 55, 56, 63, 64, 65, 73, 74, 75, 76, 77, 78, 79, 80, ],
  73 => [  1, 10, 19, 28, 37, 46, 54, 55, 56, 63, 64, 65, 72, 74, 75, 76, 77, 78, 79, 80, ],
  74 => [  2, 11, 20, 29, 38, 47, 54, 55, 56, 63, 64, 65, 72, 73, 75, 76, 77, 78, 79, 80, ],
  75 => [  3, 12, 21, 30, 39, 48, 57, 58, 59, 66, 67, 68, 72, 73, 74, 76, 77, 78, 79, 80, ],
  76 => [  4, 13, 22, 31, 40, 49, 57, 58, 59, 66, 67, 68, 72, 73, 74, 75, 77, 78, 79, 80, ],
  77 => [  5, 14, 23, 32, 41, 50, 57, 58, 59, 66, 67, 68, 72, 73, 74, 75, 76, 78, 79, 80, ],
  78 => [  6, 15, 24, 33, 42, 51, 60, 61, 62, 69, 70, 71, 72, 73, 74, 75, 76, 77, 79, 80, ],
  79 => [  7, 16, 25, 34, 43, 52, 60, 61, 62, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 80, ],
  80 => [  8, 17, 26, 35, 44, 53, 60, 61, 62, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, ],
 ];

