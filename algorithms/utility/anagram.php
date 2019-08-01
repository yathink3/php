<?php

/*
the anagram function will check whether the given strings are anagram or not
string by splitting into array and then sorted and join them
returned two string sorted and if they are equal returns true else return false
*/

function anagram($str1, $str2){
    try {
        function sortedstr($str){
            $arr = str_split($str);
            sort($arr);
            return join('', $arr);
        }
        return sortedstr($str1) == sortedstr($str2);
    } catch (Exception $e) {
        echo "error", $e;
    }
}
