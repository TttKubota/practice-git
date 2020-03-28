<?php
echo "'subject_$argv[1]' => [". PHP_EOL;
  $cha = str_split(trim(fgets(STDIN)));
foreach($cha as $n => $ch) {
  if ($ch =='q')
    break;
  if ($ch =='\n' or $ch =='\r')
    continue;
  if ($ch == '0' or $ch == 'o' or $ch == 'O' or $ch == ' ') {
  echo '0,';
  } else
  echo $ch . ',';
  if ($n %3 ==2)
  echo ' ';
  if ($n %9==8)
    echo PHP_EOL;
  if ($n %27 ==26)
    echo PHP_EOL;
  if ($n ==80)
   break; 
}
    echo PHP_EOL;
echo "],". PHP_EOL;

