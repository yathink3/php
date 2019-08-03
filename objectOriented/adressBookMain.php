<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> mainAddressBook.php
 * @Purpose : to study objectOriented programs
 * @description: Create Object Oriented Analysis and Design of a simple Address Book Problem.
 * @overview: maintain the addressbook
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-aug-2019
 *******************************************************************************************************************/
//including addressBook library
include('./utility/addressBook.php');
//creating object of addressbook
$a = new AddressBook();
//parsing json file
$a->jsonParse('./jsons/addressBook.json');
//searching data
$a->search("yathin k");
//daleting data
$a->delete("yathin k");
//adding data
$a->addAddress("yathin", "k", "43242", "awefw", "gvdvdv");
//displaying content
$a->display();
//updating data
$a->update("yathin k");
//sorting based on name
$a->sort();
//save json back to the file
$a->jsonSave();
