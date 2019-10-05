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
            <?php
            if(isset($_GET['editpid'])){
                $query = "SELECT * FROM tbl_post WHERE id={$_GET['editpid']}";
                $result = $db->select($query);
                $update_row = $result->fetch_assoc();
            } 
            ?>
                <h2>Add New Post</h2>
                <div class="block"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updatep'])){
                        
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

                        if($imageFileType !='jpeg' && $imageFileType != 'jpg' && $imageFileType !='png'){
                            echo "This type of file is not exit <br/> ";
                        }else{
                        if($file_size > 2097152){
                                echo 'File size must be excately 2 MB <br/> ';
                            }else{
                                $image_uplod_name = time()."_".$file_name;
                            $query = "UPDATE tbl_post SET cat ='$cat', title ='$title', body='$body', image='$image_uplod_name', author='$author', tags='$tags' WHERE id={$_GET['editpid']}";

                                $result = $db->insert($query);
                                if($result){
                                    move_uploaded_file($file_tmp,"upload/".$image_uplod_name);
                                    echo "Update Sucessfullt";
                                }else{
                                    echo$result->mysqli_error();
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
                                <input name="title" type="text" value="<?php echo $update_row['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat" value="<?php echo $update_row['cat'];?>">
                                    <option>Select Category</option>
                                    <?php
                                        $query = "SELECT * FROM tbl_category";
                                        $result = $db->select($query);
                                        if($result):
                                            while($row = mysqli_fetch_assoc($result)):
                                    ?>
                                    <option <?php if($row['id'] == $update_row['cat']){ echo "selected=selected";}?>  value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                    <?php endwhile; endif; ?>
                                </select>
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label></label>
                            </td>
                            <td>
                                <img width="100" src="upload/<?php echo $update_row['image'];?>" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input  type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"><?php echo $update_row['body'];?></textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input name="author" type="text" value="<?php echo $update_row['author'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input name="tags" type="text" value="<?php echo $update_row['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="updatep" Value="Save" />
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