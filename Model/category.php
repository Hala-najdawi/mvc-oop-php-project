<?php
class Category {
    private $id;
    private $name;
    private $created;
    private $modified;
////////////////
    public function setid($id){
        $this->id = $id;
    }

    public function getid(){
        return $this->id; 
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name; 
    }
    public function setcreated($created){
        $this->created = $created;
    }

    public function getcreated(){
        return $this->created; 
    }
    public function setmodified($modified){
        $this->name = $modified;
    }

    public function getmodified(){
        return $this->modified; 
    }
    function AddCategory($connection){
        $date =new DateTime();
    $date_created=$date->format('Y-m-d H:i:s');
$this->created=$date_created;
 
     $sql="INSERT INTO categories(id,name,created)
     VALUES('$this->id','$this->name','$this->created')";
     if($connection->exec($sql)){
     echo "<br>New record created successfully<br>";
     }
    else{
        echo "<br>failed to add  a record <br>";
    }
    }
    function EditCategory($connection,$id){
        
        $date =new DateTime();
    $date_created=$date->format('Y-m-d H:i:s');
$this->created=$date_created;
     $sql= "UPDATE  categories
 SET name='$this->name', created='$this->created'
 WHERE id=$id";
     if($connection->query($sql)){
     }
    else{
        echo "<br>failed to Edite  a record <br>";
    }
    }
    function DeleteCategory($connection,$id){
        $sql="DELETE FROM Products WHERE id = $id";
        var_dump($sql);
       if($connection->query($sql)){
          //  var_dump();
        
       }
      else{
          echo "<br>failed to Edite  a record <br>";
      }
      }
}