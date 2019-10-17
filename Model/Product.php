<?php
class Product {
    private $ID;
    private $name;
    private $description;
    private $Price;
    private $created;
    private $catogry_id;
    private $modified;

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getID(){
        return $this->ID; 
    }


    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name; 
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }
   
    public function setmodified($modified){
        $this->modified = $modified;
    }

    public function getmodified(){
        return $this->modified;
    }
    public function setCatogry($catogry_id){
        $this->catogry_id = $catogry_id;
    }

    public function getCatogry($catogry_id){
        return $this->catogry_id;
    }
    function AddProduct($connection){
        $date =new DateTime();
    $date_created=$date->format('Y-m-d H:i:s');
$this->created=$date_created;
 
     $sql="INSERT INTO Products(name,description,price,created,category_id)
     VALUES('$this->name','$this->description','$this->price','$this->created','$this->catogry_id')";
     //var_dump($sql);
     if($connection->exec($sql)){
     echo "<br>New record created successfully<br>";
     }
    else{
        echo "<br>failed to add  a record <br>";
    }
    }
    function EditProduct($connection,$ID){
       
        $date =new DateTime();
    $date_created=$date->format('Y-m-d H:i:s');
$this->created=$date_created;
 
     
     $sql= "UPDATE Products
 SET name='$this->name', description='$this->description', price=$this->price
 WHERE ID=$ID";
   //  var_dump($sql);
     if($connection->query($sql)){
        //  var_dump();
      
     }
    else{
        echo "<br>failed to Edite  a record <br>";
    }
    }
    function DeleteProduct($connection,$ID){
        $sql="DELETE FROM Products WHERE ID = $ID";
        var_dump($sql);
       if($connection->query($sql)){
          //  var_dump();
        
       }
      else{
          echo "<br>failed to Edite  a record <br>";
      }
      }
}