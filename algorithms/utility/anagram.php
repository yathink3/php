<?php

/*
string by splitting into array and then sorted and join them
returned two string sorted and if they are equal returns true else return false
*/

function sortedstr($str)
{
    try{
    $arr = str_split($str);
    sort($arr);
    return join('', $arr);
    } catch (Exception $e) {
        echo $e;
    }
}
/*
the anagram function will check whether the given strings are anagram or not
*/
function isAnagram($str1, $str2)
{
    try{
    if (strlen($str1) != strlen($str2))
        return false;
    return sortedstr($str1) == sortedstr($str2);
    } catch (Exception $e) {
        echo $e;
    }
}
/*
anagrams function takes array as the input,it will check from 0 to len-1 and inner loop run until the next l value to length
if two position values are anagrams then it will add,when we adding we have to check for data is already present or not
if data is already present then add only one element of the anagrams
otherwise both anagrams push into the array and at last returns the array of anagrams

*/
function anagrams($arr)
{
    try{
    $anarray = [];
    for ($l = 0; $l < count($arr) - 1; $l++)
        for ($m = $l + 1; $m < count($arr); $m++)
            if (isAnagram($arr[$l], $arr[$m])) {
                $b = true;
                foreach ($anarray as $k=>$element) {
                    $gm=$element;
                    if (in_array($arr[$l], $gm)) {
                        $b = false;
                        if (!in_array($arr[$m], $gm)) 
                            array_push($gm, $arr[$m]);
                    }
                }
                if ($b == true)  array_push($anarray, array($arr[$l], $arr[$m]));
                else $anarray[$k]=$gm;
            }
    return $anarray;
        } catch (Exception $e) {
        echo $e;
    }
}
