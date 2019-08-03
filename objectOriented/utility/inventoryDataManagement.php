<?php
//creating class Inventory
class Inventary
{
    function __construct()
    {
        $this->content = null;
        $this->fname = null;
    }

    //parsing json file into object
    function jsonParse($fname)
    {
        try {
            $this->fname = $fname;
            $this->content  = json_decode(file_get_contents($this->fname));
        } catch (Exception $e) {
            echo $e;
        }
    }
    //save the json object back to the file
    function jsonSave()
    {
        try {
            file_put_contents($this->fname, json_encode($this->content));
        } catch (Exception $e) {
            echo $e;
        }
    }
    function display()
    {
        print_r($this->content);
    }
    //iterating the json object and calculating values
    function calculateAll(){
        try{
        $sum = 0;
        foreach($this->content as $inventary){
            foreach($inventary as $key=>$item){
            $sum1 = 0;
            foreach($item as $value)
                $sum1=$sum1+$value->weight*$value->price;
            echo "value of ".$key." = ".$sum1."\n";
            }
            $sum = $sum + $sum1;
        }
        
        echo "value of all inventary=".$sum."\n";
    } catch (Exception $e) {
            echo $e;
        }
    }
    //adding category
    function addcategory($category=null){
        foreach($this->content as $inventary){
            $inventary->$category=array();
        }
    }
    //additem to the perticular category
    function additem ($category = null, $name = null, $weight = null, $price = null){
        try {
            $data=array("name"=>$name,"weight"=>$weight,"price"=>$price);
            foreach ($this->content as $inventary) 
                array_push($inventary->$category ,$data);
        } catch (Exception $e) {
            echo "your selected category not found or add it first";
        }
    }
}
