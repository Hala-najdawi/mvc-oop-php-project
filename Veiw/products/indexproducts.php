<?php
include ('../../Controller/DataBase/Database.php');
include ('../../Veiw/layout/Header.php');
$conn=new Database();
$connection=$conn->connect();
 ?>
 <?php
 $stmt = $connection->query("SELECT * FROM  Products");
 ?>
 <a  href="create-product.php" class="del_btn">Add Products</a>
 <table  class="table table-bordered">
 <thead>
     <tr>
         <th>ID</th>
         <th>Name</th>
         <th>description</th>
         <th>price</th>
         <th>category_id</th>
         <th>Created</th>
         <th>modified	</th>
         <th colspan="2">Action</th> 
     </tr>
 </thead>
 <?php
 while ($row = $stmt->fetch()) {
   
?>

     <tr>
         <td><?php echo $row['ID']; ?></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['description']; ?></td>
         <td><?php echo $row['price']; ?></td>
         <td><?php echo $row['category_id']; ?></td>
         <td><?php echo $row['created'];?></td>
         <td><?php echo $row['modified'];?></td>
         <td>
             <a href="../../Veiw/products/Edit-products.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
         </td>
       
         <td>
         <a  href="indexproducts.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
         </td>
         
     </tr>
 <?php }?>
</table>

<?php
include ('../../Model/Product.php');
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql= "DELETE FROM Products WHERE ID=$id";
        if($connection->query($sql)){
        $_SESSION['message'] = "Address deleted!"; 
        }
    }
   
     ?>
<?php include ('../../Veiw/layout/Footer.php');?>