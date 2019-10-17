<?php
include ('../../Controller/DataBase/Database.php');
 include ('../layout/Header.php');
  $conn=new Database();
  $connection=$conn->connect();

?>

<div class="container mt-3 w-75" >
 <form method="POST"  action="<?php $_SERVER["PHP_SELF"]?>">
 <div class="form-group ">
    <label for="idcategory">ID</label>
    <input type="text" class="form-control" name="idcategory" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="namecategory" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="createdcategory">created</label>
    <input type="text" class="form-control" name="createdcategory" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  

  <button type="submit" class="btn btn-primary" name="add" style=margin:2%>Submit</button>
</form> 
</div>
 <?php
include ('../../Model/category.php');
if(isset($_POST['add'])){
  $category=new Category ();
  $category->setid($_POST['idcategory']);
  $category->setName($_POST['namecategory']);
  $category->setcreated($_POST['createdcategory']);

  $category->AddCategory($connection);
}
?> 
<?php include ('../layout/Footer.php'); ?>