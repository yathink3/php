<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> primeRnage.php
 * @Purpose : to study the algorithm programming in php
 * @description:Take a range of 0 - 1000 Numbers and find the Prime numbers in that range.
 * @overview:  primes range of a number
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-july-2019
 *******************************************************************************************************************/

//including primes
include('./utility/primes.php');
//takes prime ramge from 0 to 1000
$arr = primeRange(1000);
//displaying prime numbers
foreach ($arr as $i) {
    echo $i, " ";
}
echo "\n";
