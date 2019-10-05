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
                <h2>Add New Post</h2>
                <div class="block"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
                        
                        $title = $_POST['title'];
                        $cat = $_POST['cat'];
                        
                        $file_name = $_FILES['image']['name'];
                        $file_size =$_FILES['image']['size'];
                        $file_tmp =$_FILES['image']['tmp_name'];
                        $file_type=$_FILES['image']['type'];
                        $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

                        $body = $_POST['body'];
                        $body = mysqli_real_escape_string($db->link, $_POST['body']);
                        $author = $_POST['author'];
                        $tags = $_POST['tags'];

                        if($title == '' ||  $cat=='' ||  $file_name =='' ||  $body =='' || $author=='' || $tags ==''){
                            echo "All fields are require ";
                        }else{
                            if($imageFileType !='jpeg' && $imageFileType != 'jpg' && $imageFileType !='png'){
                             echo "This type of file is not exit <br/> ";
                            }else{
                            if($file_size > 2097152){
                                    echo 'File size must be excately 2 MB <br/> ';
                                }else{
                                    $image_uplod_name = time()."_".$file_name;
                                    $query = "INSERT INTO tbl_post(cat, title, body, image, author, tags) VALUE('$cat', '$title', '$body', '$image_uplod_name', '$author', '$tags')";

                                    $result = $db->insert($query);
                                    if($result){
                                        move_uploaded_file($file_tmp,"upload/".$image_uplod_name);
                                        echo "Post Added Sucessfullt";
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
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                                    <?php
                                        $query = "SELECT * FROM tbl_category";
                                        $result = $db->select($query);
                                        if($result):
                                            while($row = mysqli_fetch_assoc($result)):
                                    ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                    <?php endwhile; endif; ?>
                                </select>
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input name="author" type="text" placeholder="Author" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input name="tags" type="text" placeholder="Tags" class="medium" />
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