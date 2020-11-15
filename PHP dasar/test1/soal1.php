<?php

$nilai = array(72,65, 73, 78, 75, 74, 90, 81, 87, 65, 55, 69, 72, 78, 79, 91, 100, 40, 67, 77, 86);

$max = 0;

$min = [];

$everage = 0;

for ($i=0; $i < count($nilai); $i++) { 
    
    $max = $max <= $nilai[$i] ? $nilai[$i] : $max ;

    $min = $min <= $nilai[$i] ? $min : $nilai[$i] ;

    $everage += $nilai[$i];

}

echo $max ;
echo '<br>';
echo $min ;
echo '<br>';
echo $everage/count($nilai);