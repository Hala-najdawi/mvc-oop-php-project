<?php
include ('../../Controller/DataBase/Database.php');
include ('../../Veiw/layout/Header.php');
$conn=new Database();
$connection=$conn->connect();
 ?>
 <?php
 $stmt = $connection->query("SELECT * FROM categories");
 ?>
<a  href="create-category.php" class="del_btn">Add Category</a>
 <table  class="table table-bordered">
 <thead>
     <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Created</th>
         <th>modified	</th>
         <th colspan="2">Action</th> 
     </tr>
 </thead>
 <?php
 while ($row = $stmt->fetch()) {
   
?>
     <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['created'];?></td>
         <td><?php echo $row['modified'];?></td>
         <td>
             <a href="../../Veiw/Categories/Edit-category.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
         </td>
         <form method="post">
         <td>
         <a  href="indexcategory.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</button>
         </td>
         </form>
     </tr>
 <?php }?>
</table>

<?php
include ('../../Model/category.php');
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql= "DELETE FROM  categories WHERE id=$id";
        if($connection->query($sql)){
        $_SESSION['message'] = "Address deleted!"; 
        }
    }
   
     ?>
<?php include ('../../Veiw/layout/Footer.php');?>