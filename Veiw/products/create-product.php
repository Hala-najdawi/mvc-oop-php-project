<?php
include ('../../Controller/DataBase/Database.php');
 include ('../layout/Header.php');
  $conn=new Database();
  $connection=$conn->connect();

?>

<div class="container mt-3 w-75" >
 <form method="POST"  action="<?php $_SERVER["PHP_SELF"]?>">
 <div class="form-group ">
    <label for="name">ID</label>
    <input type="text" class="form-control" name="IDproducts" id="ID" aria-describedby="emailHelp" placeholder="Enter ID">
   
  </div>
  <div class="form-group ">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="nameproducts" id="name" aria-describedby="emailHelp" placeholder="Enter name">
   
  </div>
  <div class="form-group">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="description">
  </div>
  <div class="form-group">
    <label for="description">Price</label>
    <input type="number" min="1" class="form-control" id="price" name="price" placeholder="price">
  </div>
  <div class="form-group">
    <label for="category_id">Example select</label>
    <select class="form-control" id="category_id" name="category_id">
      
      <?php
                          $select = $connection->query("SELECT * FROM categories");
                          //var_dump($select);
                          $count =0;
                          while ($row = $select->fetch()) {
                              $id=$row['id'];
                              echo "<br/>".$id ."<br/>";
                              $name=$row['name'];
                              echo $name ."<br/>";
                              $count ++ ;
                          echo "<option value=$id >  $name </option>";
                          }
                          var_dump(" <br/> count:  $count");
                          ?>
    
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="check" style=margin:2%>Submit</button>
</form> 
</div>
<?php
include ('../../Model/Product.php');
if(isset($_POST['check'])){
  $product=new Product();
  $product->setID($_POST['ID']);
  $product->setName($_POST['nameproducts']);
  $product->setDescription($_POST['description']);
  $product->setPrice($_POST['price']);
  $product->setCatogry($_POST['category_id']);
  $product->AddProduct($connection);
}
?>
<?php include ('../layout/Footer.php'); ?>