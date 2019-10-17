<?php
include ('../Controller/DataBase/Database.php');
include ('../Veiw/layout/Header.php');
$conn=new Database();
$connection=$conn->connect();
 ?>
 <!-- <?php
 $stmt = $connection->query("SELECT * FROM Products");
 ?>

 <table  class="table table-bordered">
 <thead>
     <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Description</th>
         <th>Price</th>
         <th>Created</th>
         <th>modified	</th>
         <th>category_id</th>
         <th colspan="2">Action</th> 
     </tr>
 </thead>
 <?php
 while ($row = $stmt->fetch()) {
   
?>
     <tr>
         <td><?php echo $row['ID']; ?></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['description'];?></td>
         <td><?php echo $row['price'];?></td>
         <td><?php echo $row['created'];?></td>
         <td><?php echo $row['modified'];?></td>
         <td><?php echo $row['category_id'];?></td>
         <td>
             <a href="../Veiw/products/Edit-products.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
         </td>
         <form method="post">
         <td>
         <a  href="index.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</button>
         </td>
         </form>
     </tr>
 <?php }?>
</table>

<?php
include ('../Model/update-Produts.php');
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql= "DELETE FROM Products WHERE id=$id";
        if($connection->query($sql)){
        $_SESSION['message'] = "Address deleted!"; 
        }
    }
   
     ?> -->
<?php include ('../Veiw/layout/Footer.php');?>