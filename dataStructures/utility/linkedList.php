<?php
/*
creating a class node which will used to store the data and next pointer
*/
class Node {
    function __construct($data, $next = null) {
    $this->data = $data;
    $this->next = $next;
    }
}
/*
creating a class linked list which has several operations like push(),add,insertat()
& pop(),delete(),deletelastnode(),sort() then orderedcheck(),ispresentdeleteoradd(),deletelist()
*/
class LinkedList {
    //constructer to make head=null
    function __construct(){
        $this->head = null;
    }
    //add operation will add data to the end of the list
    function add($data) {
        $newNode = new Node($data);
        if (!$this->head) $this->head = $newNode;
        else {
            $temp = $this->head;
            while ($temp->next) $temp = $temp->next;
            $temp->next = $newNode;
        }
    }
    
    //delete operation will delete the item which is specified by the user
    function delete($data) {
        $temp = $this->head;
        if ($this->head->data == $data)
            $this->head = $temp->next;
        else {
            while ($temp->data !== $data) {
                $temppre = $temp;
                $temp = $temp->next;
            }
            $temppre->next = $temp->next;
        }
    }
    //sort operation will sort the linkedlist
    function sort() {
        $temp1 = $this->head;
        while ($temp1->next) {
            $temp = $this->head;
            while ($temp->next) {
                if ((int)($temp->data) > (int)($temp->next->data)) {
                    $value = $temp->data;
                    $temp->data = $temp->next->data;
                    $temp->next->data = $value;
                }
            $temp = $temp->next;
            }
            $temp1 = $temp1->next;
        }
    }
    /*
    it will check the user enterd element if it is present remove it ,
    if it is not present add appropriate position
    */
    function orderedCheck($data) {
        $temp = $this->head;
        while ($temp) {
            if ($temp->data == $data) {
                $this->delete($data);
                return "removed data ". $data . "\n";
            }
            $temp = $temp->next;
        }
        $this->add($data);
        $this->sort();
        return "added data " . $data . "\n";
    }
    /*
    it will check the user enterd element if it is present remove it ,
    if it is not present add at the end of linked list
    */
    function isPresentDeleteOrAdd($data) {
        $temp = $this->head;
        while ($temp) {
            if ($temp->data === $data) {
                $this->delete($data);
                return "removed data " . $data . "\n";
            }
            $temp = $temp->next;
        }
        $this->add($data);
        return "added data " . $data . "\n";
    }
    //getArray operation will returns the array format of linkedlist
    function getArray() {
        $temp = $this->head;
        $arr = [];
        while ($temp) {
            array_push($arr,$temp->data);
            $temp = $temp->next;
        }
        return $arr;
    }

    //deletelist operation will delete the entire linked list
    function deleteList() {
        $this->head = null;
    }
    //isempty operation will check wheather linkedlist is empty or not
    function isempty() {
        if (!$this->head) return true;
        return false;
    }
}
?>