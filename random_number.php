<?php

function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    //return array_slice($numbers, 0, $quantity);
    return $numbers[0];
}
print_r(randomGen(1000,5000,0)); 
?>