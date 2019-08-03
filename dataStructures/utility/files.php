<?php

/*
this function is used to access file and and store them into an buffer
and then make it as string and store it in arrays
*/
function accessFiles($filePath)
{
    try {
        return explode(' ', file_get_contents($filePath));
    } catch (Exception $e) {
        echo $e;
    }
}
//writefile takes filepath and an array and copies the data to the specified file
function writeFile($filePath, $arr)
{
    try {
        file_put_contents($filePath, join(' ', $arr));
    } catch (Exception $e) {
        echo $e;
    }
}
