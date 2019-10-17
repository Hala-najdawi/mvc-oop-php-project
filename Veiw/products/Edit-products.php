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
    $sql = $connection->query("SELECT * FROM Products WHERE ID=$id");
	
	}
?>
<?php
 while ($row = $sql->fetch()) {
   ?>
<div class="container mt-3 w-75" >
 <form method="POST"  action="<?php $_SERVER["PHP_SELF"]?>">
  <div class="form-group ">
    <label for="name">ID</label>
    <input type="text" class="form-control" value="<?php echo $row['ID']; ?>"  name="IDproducts"value="id" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="name">Name</label>
    <input type="text" class="form-control" value="<?php echo $row['name']; ?>"  name="nameproduct"value="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="name">description</label>
    <input type="text" class="form-control" value="<?php echo $row['description']; ?>"  name="description"value="description" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="name">Price</label>
    <input type="text" class="form-control" value="<?php echo $row['price']; ?>"  name="price"value="price" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="name">Created</label>
    <input type="text" class="form-control" value="<?php echo $row['created']; ?>"  name="created"value="created" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group ">
    <label for="name">Modified</label>
    <input type="text" class="form-control" value="<?php echo $row['modified']; ?>"  name="modified"value="modified" id="name" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <button type="submit" class="btn btn-primary" name="edit" style=margin:2%>Submit</button>
</form> 
</div>
 <?php }?>
<?php
include ('../../Model/Product.php');
if(isset($_POST['edit'])){
  $product=new Product ();
  $product->setName($_POST['nameproduct']);
  $product->setDescription($_POST['description']);
  $product->setPrice($_POST['price']);
  $product->setmodified($_POST['modified']);
  $product->EditProduct($connection,$id);
}
?>

<?php include ('../layout/Footer.php'); ?>