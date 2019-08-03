<?php
//creating the addressbook class
class AddressBook {
    function __construct(){
        $this->content = null;
        $this->fname = null;
    }

    //parsing json file into object
    function jsonParse($fname){
        try {
            $this->fname = $fname;
            $this->content  = json_decode(file_get_contents($this->fname));
        } catch (Exception $e) {
            echo $e;
        }
    }

    //it will add address to the json file
    function addAddress ($firstname, $lastname, $houseno = null, $city = null, $district = null, $state = null, $nationality = null, $pincode = null){
        try {
            $data= array('firstname'=>$firstname,'lastname'=>$lastname,'houseno'=>$houseno,'city'=>$city,'district'=>$district,'state'=>$state,'nationality'=>$nationality,'pincode'=>$pincode);
            array_push($this->content, $data);
            echo "added succefully";
            $this->display();
        } catch (Exception $e) {
            echo $e;
        }
    }
    //sorting the address book depending upon the first name and the last name
    function sort(){
        try {
            uasort($this->content, function ($a, $b) {
                return ($a->firstname . $a->lastname)>($b->firstname . $b->lastname);
            });
            $this->content = array_merge($this->content);
            echo "sorted succefully";
            $this->display();
        } catch (Exception $e) {
            echo $e;
        }
    }
    //searching the person in the addressbook
    function search($name){
        try {
            foreach($this->content as $el) {
                if (($el->firstname ." " .$el->lastname)==($name)) 
                    print_r($el);
            }
            } catch (Exception $e) {
            echo $e;
        }
    }
    //delete the address of the any person specified
    function delete($name){
        try {
            $names = explode(' ',$name);
            if (count($names) == 1) array_push($names," ");
            foreach($this->content as $key=>$ak)
                if($ak->firstname == $names[0] &&  $ak->lastname == $names[1]){
                    unset($this->content[$key]);
                    $this->content = array_merge($this->content);
                }
            echo "deleted succefully";
            $this->display();
        } catch (Exception $e) {
            echo $e;
        }
    }
    //update the content of any person in the address book
    function update($name){
        try {
            $names = explode(' ', $name);
            if (count($names) == 1) array_push($names, " ");
            foreach($this->content as $ak){
                if ($ak->firstname == $names[0] &&  $ak->lastname == $names[1]) {
                    $key = readline("enter key you want to modify:");
                    if(array_key_exists($key, $ak)){
                        $data = readline("enter data:");
                        $ak->$key=$data;

                    } else echo "key not found";
            }
        }
        echo "updated succefully";
        $this->display();
        } catch (Exception $e) {
            echo $e;
        }
    }
    //save the json object back to the file
    function jsonSave (){
    try {
        file_put_contents($this->fname,json_encode($this->content));
        } catch (Exception $e) {
            echo $e;
        }
    }
    function display(){
        print_r($this->content);
    }

}
