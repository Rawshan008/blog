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
                <h2>Add New Slide</h2>
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

                                    $query = "INSERT INTO tbl_slider(title, image) VALUE('$title', '$image_uplod_name')";

                                    $result = $db->insert($query);
                                    if($result){
                                        move_uploaded_file($file_tmp,"upload/".$image_uplod_name);
                                        echo "Slider Added Sucessfullt";
                                    }
                                }
                            }
                        }


                    }
                ?>             
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
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