<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> binarySearchInFile.php
 * @Purpose : to study the algorithms programming in php
 * @description:Read in a list of words from File. Then prompt the user to enter a word to search the list.
 *               The program reports if the search word is found in the list.
 * @overview:  Binary Search the Word from Word List
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-july-2019
 *******************************************************************************************************************/

//including binary search file
include('./utility/binarySearch.php');
//accessing file into array
$arr = accessFiles('../input.txt');
//sorting the array in ascending order
sort($arr);
$key = readline('enter the key value:');
//binarysearch applaying
echo binarySearch($key, $arr);

?>