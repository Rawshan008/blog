<?php 
    include 'inc/header.php';

?>
        <div class="clear">
        </div>
        <div class="grid_2">
           <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if(isset($_POST['submit'])){
                            if($_POST['name'] == ''){
                                echo "Please Insert Category Name";
                            }else{
                                $name = $_POST['name'];

                                $query = "INSERT INTO tbl_category(name) VALUE ('$name')";
                                $result = $db->insert($query);
                                if($result){
                                    echo "Category Insert Successfully";
                                }
                            }
                        }
                    }
               ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
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