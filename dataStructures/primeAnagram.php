<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> primeAnagram.php
 * @Purpose : to study the data structures
 * @description :Extend the Prime Number Program and store only the numbers in that range that are Anagrams.
                For e.g. 17 and 71 are both Prime and Anagrams in the 0 to 100 range. 
                Further store in a 2D Array the numbers that are Anagram and numbers that are not Anagram
 * @overview : prime anagrams arrays
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-aug-2019
 *******************************************************************************************************************/


//including prime modules
include('./utility/primes.php');
//displaying all primeno that are anagram with that range
foreach (primeRangeArray(1000, 1) as $ele) {
    foreach ($ele as $anaGroups) {
        foreach ($anaGroups as $data) {
            echo $data . "-";
        }
        echo chr(8) . " , ";
    }
    echo  "\n";
}
