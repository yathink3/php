<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> orderedList.php
 * @Purpose : to study the data structures
 * @description :Read a List of Numbers from a file and arrange it ascending Order in a Linked List. Take user input for a number, if found then pop the number out of the list else insert the number in appropriate position
 * @overview : Ordered List
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-aug-2019
 *******************************************************************************************************************/

//includes linkedlist modules
include('./utility/linkedList.php');
//includes files operataions
include('./utility/files.php');
//creating an object of linkedlist
$ls = new linkedList();
//adding array elements to the linked list
foreach (accessFiles('../input.txt') as $ele) {
    $ls->add($ele);
}
//sorting linkedlist
$ls->sort();
foreach ($ls->getArray() as $ele) {
    echo $ele . " ";
}
echo "\n";
$data = readline("enter the data to be search:");
//it will check the user enterd element if it is present remove it ,if it is not present add appropriate position
echo $ls->orderedCheck($data);
foreach ($ls->getArray() as $ele) {
    echo $ele . " ";
}
echo "\n";
//writing files back to the file
writeFile('../input.txt', $ls->getArray());
