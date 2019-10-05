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
                <h2>Add New User</h2>
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
                        

                        $mailquery = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
                        $mailcheck = $db->select($mailquery);
                        if($mailcheck != false){
                            echo "Email is already Exit";
                        }else{
                            $query = "INSERT INTO tbl_user(username, possword, email, details, role) VALUE('$username', '$password', '$email', '$details', '$role')";

                            $result = $db->insert($query);
                            if($result){
                                echo "Add user Succefully";
                            }
                        }

                        
                    }
                ?>             
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>UserName</label>
                            </td>
                            <td>
                                <input name="username" type="text" placeholder="Enter Username" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input name="email" type="emial" placeholder="Enter Email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input name="password" type="password" placeholder="Enter password" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Author</option>
                                    <option value="3">Editor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>User Details</label>
                            </td>
                            <td>
                                <textarea name="details" class="tinymce"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Add User" />
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