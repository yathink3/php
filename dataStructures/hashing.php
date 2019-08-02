<?php
/********************************************************************************************************************
* @Execution : default node : cmd> hashing.php
* @Purpose : to study the data structures
* @description :Create a Slot of 10 to store Chain of Numbers that belong to each Slot to efficiently search a number from a given set of number
* @overview : Hashing Function to search a Number in a slot
* @author : yathin k <yathink3@gmail.com>
* @version : 1.0
* @since : 02-aug-2019
*******************************************************************************************************************/
//includes linkedlist modules
include('./utility/linkedList.php');
//includes files operataions
include('./utility/files.php');
//creating hash size 
$num = 11;
//creating an array for hash
$hash = [];
//pushing num number of  object of linkedlist to the hash array
foreach(range(0,$num-1) as $i){
    array_push($hash, new linkedList());
}
//adding array elements to the linked list
foreach (accessFiles('../input.txt') as $ele) {
    $key=(int)((int)$ele%$num);
    $hash[$key]->add($ele);
}
//printing hash data to the prompt
foreach($hash as $key=>$ele){
    echo "hash[".$key."]=>";
    foreach($ele->getArray() as $k){
        echo $k . " ";
    }
    echo "\n";
}

//it collects user data
$data = readline('enter the data to be search:');
//it will check the user enterd element if it is present remove it ,if it is not present add at the end of hash linked list
$key1 = (int)((int)$data % $num);
echo $hash[$key1]->isPresentDeleteOrAdd($data);
//printing hash data to the prompt
foreach ($hash as $key => $ele) {
    echo "hash[" . $key . "]=>";
    foreach ($ele->getArray() as $k) {
        echo $k . " ";
    }
    echo "\n";
}
//creating temporary array
$temp = [];
//concating linked list elements
foreach($hash as $ele){
    $temp=array_merge($temp,$ele->getArray());
}

//writing files back to the file
writeFile('../input.txt', $temp);
