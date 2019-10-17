<?php
include ('../../Controller/DataBase/Database.php');
 include ('../layout/Header.php');
  $conn=new Database();
  $connection=$conn->connect();
  ?>
  <?php
  
  if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
    $sql = $connection->query("SELECT * FROM  categories WHERE ID=$id");
	
	}
?>
<?php
 while ($row = $sql->fetch()) {
   ?>
<div class="container mt-3 w-75" >
 <form method="POST"  action="<?php $_SERVER["PHP_SELF"]?>">
  <div class="form-group ">
    <label for="name">ID</label>
    <input type="text" class="form-control" value="<?php echo $row['id']; ?>"  name="nameproducts"value="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="name">Name</label>
    <input type="text" class="form-control" value="<?php echo $row['name']; ?>"  name="namecategory"value="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <button type="submit" class="btn btn-primary" name="edit" style=margin:2%>Submit</button>
</form> 
</div>
 <?php }?>
<?php
include ('../../Model/category.php');
if(isset($_POST['edit'])){
  $category=new Category ();
  $category->setName($_POST['namecategory']);
  $category->EditCategory($connection,$id);
}
?>

<?php include ('../layout/Footer.php'); ?>