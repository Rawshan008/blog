<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
        <div class="grid_2">
           <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']){
                        $title = $_POST['title'];
                        $slogan = $_POST['slogan'];

                        $file_name = $_FILES['logo']['name'];
                        $file_size =$_FILES['logo']['size'];
                        $file_tmp =$_FILES['logo']['tmp_name'];
                        $file_type=$_FILES['logo']['type'];
                        $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

                        if($imageFileType !='jpeg' && $imageFileType != 'jpg' && $imageFileType !='png'){
                            echo "This type of file is not exit <br/> ";
                        }else{
                        if($file_size > 2097152){
                                echo 'File size must be excately 2 MB <br/> ';
                            }else{
                            $query = "UPDATE tbl_title SET title ='$title', slogan ='$slogan', logo='$file_name'  WHERE id=1";

                                $result = $db->update($query);
                                if($result){
                                    move_uploaded_file($file_tmp,"upload/".$file_name);
                                    echo "Update Sucessfullt";
                                }else{
                                    echo$result->mysqli_error();
                                }
                            }
                        }
                    }
                ?>             
                 <form action="" method="POST" enctype="multipart/form-data">
                 <?php 
                    $query = "SELECT * FROM tbl_title WHERE id=1";
                    $result = $db->select($query);
                    while($row = $result->fetch_assoc()):
                 ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $row['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $row['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>

						 <tr>
                            <td>
                                <label></label>
                            </td>
                            <td>
                                <img src="upload/<?php echo $row['logo'];?>">
                            </td>
                        </tr>
						 
                          <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            </td>
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