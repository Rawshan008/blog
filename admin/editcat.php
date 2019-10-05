<?php 
    include 'inc/header.php';
?>
<?php 
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        header("Location: catlist.php");
    }else{
        $catid = $_GET['catid'];
    }
?>
        <div class="clear">
        </div>
        <div class="grid_2">
           <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
               
               <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
                    $name = $_POST['name'];

                    $query = "UPDATE tbl_category SET name='$name' WHERE id='$catid'";
                    $result = $db->update($query);
                    if($result){
                        echo "Category Update Successfull";
                    }
                }
               ?>
               <?php 
                if($catid){
                    $query = "SELECT * FROM tbl_category WHERE id='$catid'";
                    $result = $db->select($query);
                    $row = mysqli_fetch_assoc($result);
                }
               ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['name']?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php include 'inc/footer.php'; ?>