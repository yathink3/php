<?php

/*
binary search function will works for only sorted list , here consider length of array-1 to l and f=0
runs while loop until f<=l 
then find mid element and then check if key is present or not if present returns it
else if key is less than the mid element then make l=mid-1
else key is greater than mid element then make f=mid+1
*/
function binarySearch($key, $arr)
{
    try{
    $f = 0;
    $l = sizeOf($arr) - 1;
    while ($f <= $l) {
        $mid = (int) (($f + $l) / 2);
        if ($key == $arr[$mid]) return "key found at " . $mid;
        else if ($key < $arr[$mid]) $l = $mid - 1;
        else $f = $mid + 1;
    }
    return "key not found";
} catch (Exception $e) {
        echo $e;
    }
}
/*
this function is used to access file and and store them into an buffer
and then make it as string and store it in arrays
*/
function accessFiles($filePath)
{
    try{
    $data = fgets(fopen($filePath, "r"));
    return array_map('intval', explode(' ', $data));
    } catch (Exception $e) {
        echo $e;
    }
}
