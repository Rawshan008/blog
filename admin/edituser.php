
<?php 
    include 'inc/header.php';
?>
        <div class="clear">
        </div>
        <div class="grid_2">
           <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
        <?php 
            if(isset($_GET['userid'])){
                $userid = $_GET['userid'];
            }
        ?>
		
            <div class="box round first grid">
                <h2>Update users</h2>
                <div class="block"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
                        
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            echo "This email is not valid email address";
                        }
                        $password = $_POST['password'];
                        $password = md5($_POST['password']);
                        $role = $_POST['role'];
                        $details = $_POST['details'];

                        $query = "UPDATE tbl_user SET username ='$username', possword ='$password', email='$email', details='$details', role='$role' WHERE id=$userid";

                        $result = $db->insert($query);
                        if($result){
                            echo "Update user Succefully";
                        }
                    }
                ?>             
                 <form action="" method="POST" enctype="multipart/form-data">
                 <?php 
                    $query = "SELECT * FROM tbl_user WHERE id=$userid";
                    $result = $db->select($query);
                    if($result):
                        while($rowu = $result->fetch_assoc()):
                 ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>UserName</label>
                            </td>
                            <td>
                                <input name="username" type="text" value="<?php echo $rowu['username']?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input name="email" type="emial" value="<?php echo $rowu['email']?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input name="password" type="password" value="<?php echo $rowu['possword']?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select Role</option>
                                    <option <?php if($rowu['role'] == 1)echo 'selected'?> value="1">Admin</option>
                                    <option <?php if($rowu['role'] == 2)echo 'selected'?> value="2">Author</option>
                                    <option <?php if($rowu['role'] == 3)echo 'selected'?> value="3">Editor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>User Details</label>
                            </td>
                            <td>
                                <textarea name="details" class="tinymce"><?php echo $rowu['details']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update User" />
                            </td>
                        </tr>
                    </table>
                    <?php endwhile;endif; ?>
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