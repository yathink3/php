<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> primeAnagrams.php
 * @Purpose : to study the algorithm programming in php
 * @description:Extend the above program to find the prime numbers that are Anagram and Palindrome 
 * @overview:  primes anagram range of a number
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-aug-2019
 *******************************************************************************************************************/

//including primes
include_once('./utility/primes.php');
//including anmgrams
include_once('./utility/anagram.php');
//takes prime range from 0 to 1000 and taking anagrams
$arr = anagrams(primeRange(1000));
//displaying prime anagrams numbers
foreach ($arr as $ele) {
    foreach ($ele as $i) {
        echo $i, " ";
    }
    echo "\n";
}
