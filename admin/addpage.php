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
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $body = mysqli_real_escape_string($db->link, $_POST['body']);
                        if($title == '' || $body == ''){
                            echo "All form should be fillup";
                        }else{
                            $query = "INSERT INTO tbl_page(title, body) VALUE('$title', '$body')";
                            $result = $db->insert($query);
                            if($result){
                                echo "Page Added Successfullt";
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Add Page" />
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