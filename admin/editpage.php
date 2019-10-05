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
                <h2>Add New Page</h2>
                <div class="block">

                <?php 
                    if(isset($_GET['editpid'])){
                        $id = $_GET['editpid'];
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
                            $title = $_POST['title'];
                            $body = $_POST['body'];

                            $query = "UPDATE tbl_page SET title ='$title', body='$body' WHERE id=$id";
                            $result = $db->update($query);
                            if($result){
                                echo "Page Update Successfullt";
                            }
                        }
                    }
                ?>
                            
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                    <?php 
                        $query = "SELECT * FROM tbl_page WHERE id=$id";
                        $result = $db->select($query);
                        while($row = $result->fetch_assoc()):
                    ?>
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input name="title" type="text" value="<?php echo $row['title'];?>" class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"><?php echo $row['body'];?></textarea>
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