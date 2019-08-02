<?php
/********************************************************************************************************************
* @Execution : default node : cmd> unOrderedList.php
* @Purpose : to study the data structures
* @description :Read the Text from a file, split it into words and arrange it as Linked List. 
                Take a user input to search a Word in the List. If the Word is not found then add it to the list, 
                and if it found then remove the word from the List. In the end save the list into a file
* @overview : UnOrdered List
* @author : yathin k <yathink3@gmail.com>
* @version : 1.0
* @since : 02-aug-2019
*******************************************************************************************************************/

//importing linkedlist modules
include('./utility/linkedList.php');
//importing files operataions
include('./utility/files.php');
//creating an object of linkedlist
$ls = new linkedList();
//adding array elements to the linked list
foreach(accessFiles('../input.txt') as $ele){
    $ls->add($ele);
}
foreach($ls->getArray() as $ele){
    echo $ele." ";
}
echo "\n";
$data=readline("enter the data to be search:");
//it will check the user enterd element if it is present remove it ,if it is not present add at the end of linked list
echo $ls->isPresentDeleteOrAdd($data);
foreach ($ls->getArray() as $ele) {
    echo $ele . " ";
}
echo "\n";
//writing files back to the file
writeFile('../input.txt', $ls->getArray());
