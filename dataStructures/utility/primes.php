<?php

//including the anagram modules
include('./utility/anagram.php');
/*
isprime will check the passed parameter prime no or not
if n<2 directly return false
if n is divided by any of its previous values returns false
if n s not divided by any of previous values its means that it is a prime no now return true
*/
function isPrime($n)
{
    try {
        if ($n < 2) return false;
        for ($j = (int) ($n / 2); $j >= 2; $j--)
            if ($n % $j == 0) return false;
        return true;
    } catch (Exception $e) {
        echo $e;
    }
}
/*
primeRangeArray wil divide the prime no into hundreds groups
then here given for multiple purposes if l=0 returns the prime range 
else returns the l object functions
*/
function primeRangeArray($n, $l = 0)
{
    try {
        $arr = [];
        for ($i = 1; $i <= $n / 100; $i++) {
            $min = [];
            for ($k = ($i - 1) * 100; $k < $i * 100; $k++)
                if (isPrime($k))
                    array_push($min, $k);
            if ($l == 0) array_push($arr, $min);
            else array_push($arr, anagrams($min));
        }
        return $arr;
    } catch (Exception $e) {
        echo $e;
    }
}

//primeRange will returns prime array of given range
function primeRange($n)
{
    try {
        $arr = [];
        for ($i = 0; $i < $n; $i++) {
            if (isPrime($i)) array_push($arr, $i);
        }
        return $arr;
    } catch (Exception $e) {
        echo $e;
    }
}
