<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> primeArray.php
 * @Purpose : to study the data structures
 * @description :Take a range of 0 - 1000 Numbers and find the Prime numbers in that range.
                Store the prime numbers in a 2D Array, the first dimension represents the range 0-100, 100-200, and so on.
                While the second dimension represents the prime numbers in that range
 * @overview : prime no's  store in array
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-aug-2019
 *******************************************************************************************************************/

//including prime modules
include('./utility/primes.php');
//displaying all primeno that are anagram with that range
foreach (primeRangeArray(1000) as $ele) {
    foreach ($ele as $prime) {
        echo $prime . " ";
    }
    echo "\n";
}
