<?php

/*
this function is used to access file and and store them into an buffer
and then make it as string and store it in arrays
*/
function accessFiles($filePath)
{
    $data = fgets(fopen($filePath, "r"));
    return explode(' ', $data);
}
//writefile takes filepath and an array and copies the data to the specified file
function writeFile($filePath, $arr)
{
    file_put_contents($filePath, join(' ', $arr));
}
