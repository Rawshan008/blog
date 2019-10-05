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
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] =="POST" && isset($_POST['submit'])){
                        $text = $_POST['copyright'];
                        $text = htmlspecialchars($_POST['copyright']);

                        $query = "UPDATE copyright SET text='$text' WHERE id=1";
                        $result = $db->update($query);
                        if($result){
                            echo "Update Successfullt";
                        }
                    }
                ?>
                 <form action="" method="POST">
                 <?php 
                    $query = "SELECT * FROM copyright WHERE id=1";
                    $result = $db->select($query);
                    while($row = $result->fetch_assoc()): 
                ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo htmlspecialchars($row['text']);?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    <?php endwhile; ?>
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