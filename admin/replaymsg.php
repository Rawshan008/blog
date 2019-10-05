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
                <h2>RePlay Message</h2>
                <div class="block">
                <?php 
                    if($_SERVER['REQUEST_METHOD'] =="POST" && isset($_POST['send'])){
                        $to = $_POST['tomail'];
                        $from = $_POST['frommail'];
                        $subject = $_POST['subject'];
                        $body = $_POST['body'];

                        $mailsend  = mail($to,$subject,$body,$from);
                        if($mailsend){
                            echo "Mail Send Successfully";
                        }else {
                            echo "Somethings Error";
                        }
                    }
                ?>

                <?php
                if(isset($_GET['msgid'])):
                    $id = $_GET['msgid'];

                    $query = "SELECT * FROM tbl_contact WHERE id=$id";
                    $result = $db->select($query);
                    while($row = $result->fetch_assoc()):
                    
                ?>
                            
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Email To</label>
                            </td>
                            <td>
                                <input name="tomail" readonly type="text" value="<?php echo $row['email']?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input name="frommail" readonly type="text" value="rawshanars@gmail.com"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input name="subject" readonly type="text" value="Message Repay" class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="send" Value="Send" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php include 'inc/footer.php'; ?>