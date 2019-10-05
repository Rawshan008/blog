<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
        <div class="grid_2">
           <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']){
                        $facebook = $_POST['facebook'];
                        $twitter = $_POST['twitter'];
                        $linkedin = $_POST['linkedin'];
                        $googleplus = $_POST['googleplus'];
                        
                        $query = "UPDATE tbl_social SET facebook=' $facebook', twitter='$twitter', linkedin='$linkedin', google='$googleplus' WHERE id=1";

                        $result = $db->update($query);
                        if($result){
                            echo "Update Successfull";
                        }
                    }
                ?>              
                 <form action="" method="POST">
                 <?php 
                    $query = "SELECT * FROM tbl_social where id=1";
                    $result = $db->select($query);
                    while($row = $result->fetch_assoc()):
                ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $row['facebook']?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $row['twitter']?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" value="<?php echo $row['linkedin']?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" value="<?php echo $row['google']?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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