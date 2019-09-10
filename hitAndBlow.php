<?php
echo "<pre>";
$game = 1;

switch($game){
  case 1:
    $numArray = dfs(4);
    $numArray = filter($numArray, "5678", 0, 1);
    $numArray = filter($numArray, "3479", 2, 1);
    $numArray = filter($numArray, "3402", 2, 1);
    break;
  case 2:
    $numArray = dfs(5);
    $numArray = filter($numArray, "12345", 0, 3);
    $numArray = filter($numArray, "67890", 0, 2);
    $numArray = filter($numArray, "35789", 0, 2);
    $numArray = filter($numArray, "32579", 0, 2);
    $numArray = filter($numArray, "21463", 0, 3);
    $numArray = filter($numArray, "71463", 0, 2);
    $numArray = filter($numArray, "78043", 1, 2);
    $numArray = filter($numArray, "78012", 3, 1);
    break;
  case 3:
    $numArray = dfs(6);
    $numArray = filter($numArray, "654321", 1, 3);
    $numArray = filter($numArray, "567890", 0, 3);
    $numArray = filter($numArray, "612489", 1, 3);
    $numArray = filter($numArray, "789123", 0, 4);
    $numArray = filter($numArray, "613258", 0, 4);
    $numArray = filter($numArray, "235601", 0, 3);
    $numArray = filter($numArray, "564301", 1, 2);
    $numArray = filter($numArray, "120379", 2, 1);
    $numArray = filter($numArray, "402319", 0, 3);
    $numArray = filter($numArray, "190765", 1, 2);
    break;
}

function dfs($left, $str = ''){
  $retArray = [];
  if($left == 0)return [''];
  for($i = ($str === '') ? 1 : 0; $i < 10; $i++){
    $a = dfs($left - 1, (string)$i);
    foreach($a as $b){
      if(strpos($b, (string)$i) === false){
        $retArray[] = $i.$b;
      }
    }
  }
  return $retArray;
}

function filter($numArray, $answer, $h, $b){
  $retArray = [];
  foreach($numArray as $num){
    $H = $B = 0;
    for($i = 0; $i < strlen($answer); $i++){
      if($num[$i] == $answer[$i])$H++;
    }
    for($i = 0; $i < strlen($answer); $i++){
      for($j = 0; $j < strlen($answer); $j++){
        if($i != $j){
          if($num[$i] == $answer[$j])$B++;
        }
      }
    }
    if($H==$h && $B==$b){
      $retArray[] = $num;
    }
  }
  printf("%s : %dHit %dBlow : %d -> %d\n", $answer, $h, $b, count($numArray), count($retArray));
  if(count($retArray) == 1){
    echo "answer = {$retArray[0]}";
  }
  return $retArray;
}
