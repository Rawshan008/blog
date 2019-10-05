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
                <h2>Update  Slide</h2>
                <?php 
                    if(isset($_GET['slidetid'])):
                        $slidetid = $_GET['slidetid'];
                ?>
                <div class="block"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
                        
                        $title = $_POST['title'];
                        
                        $file_name = $_FILES['image']['name'];
                        $file_size =$_FILES['image']['size'];
                        $file_tmp =$_FILES['image']['tmp_name'];
                        $file_type=$_FILES['image']['type'];
                        $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));


                        if($title == '' || $file_name ==''){
                            echo "All fields are require ";
                        }else{
                            if($imageFileType !='jpeg' && $imageFileType != 'jpg' && $imageFileType !='png'){
                             echo "This type of file is not exit <br/> ";
                            }else{
                            if($file_size > 2097152){
                                    echo 'File size must be excately 2 MB <br/> ';
                                }else{
                                    $image_uplod_name = time()."_".$file_name;

                                    $query = "UPDATE tbl_slider SET title='$title', image='$image_uplod_name' WHERE id=$slidetid";

                                    $result = $db->update($query);
                                    if($result){
                                        move_uploaded_file($file_tmp,"upload/".$image_uplod_name);
                                        echo "Slider Update Sucessfullt";
                                    }
                                }
                            }
                        }


                    }
                ?>             
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                        <?php 
                            $query = "SELECT * FROM tbl_slider WHERE id=$slidetid";
                            $result = $db->select($query);
                            if($result):
                                while($row = $result->fetch_assoc()):
                        ?>
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input name="title" type="text" value="<?php echo $row['title']?>" class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Image</label>
                            </td>
                            <td>
                                <img width="200" src="upload/<?php echo $row['image']?>" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Change Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                        <?php endwhile; endif; ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php include 'inc/footer.php'; ?>