<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> inventoryManagementProgram.php
 * @Purpose : to study the object oriented programming
 * @description :a. Extend the above program to Create InventoryManager to manage the Inventory. The Inventory Manager will use InventoryFactory to create Inventory Object from JSON. 
 *              The InventoryManager will call each Inventory Object in its list to calculate the Inventory Price and then call the Inventory Object to return the JSON String.
 *               The main program will be with InventoryManager
 * @overview : JSON Inventory Management Program
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 03-aug-2019
 *******************************************************************************************************************/
//including inventoryDataManagement php file
include('./utility/inventoryDataManagement.php');
//creating object of inventary
$invent = new Inventary();
//parsing json file into json array
$invent->jsonParse('./jsons/inventoryDataManagement.json');
//calculate all will calculate value
$invent->calculateAll();
//add new category
$invent->addcategory("balse");
//add item will add new item
$invent->additem("balse", "item1", 23, 242);
//it display the data
$invent->display();
//save json file back to the file
$invent->jsonSave();
