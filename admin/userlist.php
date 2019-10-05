<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
           <div class="grid_2">
            <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Users List</h2>
                <?php 
                    if(isset($_GET['userid'])){
                        $userid = $_GET['userid'];

                        $query = "DELETE FROM tbl_user WHERE id=$userid";
                        $result = $db->delete($query);
                        if($result){
                            echo "Delete User Successfylly";
                        }
                    }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>UserName</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_user ORDER BY id";
						$result = $db->select($query);
						if($result):
							$i = 0;
							while($row = $result->fetch_assoc()):
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $fm->textShortner($row['details'],30);?></td>
							<td>
                                <?php
                                    if($row['role'] ==1){
                                        echo "Admin";
                                    }elseif($row['role']==2){
                                        echo "Author";
                                    }elseif($row['role'] ==3){
                                        echo "Editor";
                                    }
                                ?>
                            </td>
							<td><a href="edituser.php?userid=<?php echo $row['id'];?>">Edit</a> || <a  onclick="return confirm('are you sure to delete?') "href="?userid=<?php echo $row['id'];?>">Delete</a></td>
						</tr>
					<?php 
						endwhile;
					endif;
					?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php include 'inc/footer.php'; ?>
