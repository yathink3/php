<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> anagramMain.php
 * @Purpose : to study the algorithm programming in php
 * @description:One string is an anagram of another if the second is simply a rearrangement of the first.
                For example, 'heart' and 'earth' are anagrams...
 * @overview:  An Anagram Detection Example
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 01-july-2019
 *******************************************************************************************************************/
//including anagram functions
include('./utility/anagram.php');
//considering user inputs 
$str1 = readline("enter a string1:");
$str2 = readline("enter a string2:");
//checking whether the given strings are anagram or not
if (anagram($str1, $str2))  echo $str1, " and ", $str2, " are anagrams";
else echo $str1, " and ", $str2, " not are anagrams";
