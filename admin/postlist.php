﻿<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
           <div class="grid_2">
            <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
			<?php 
				if(isset($_GET['delpid'])){
					$query = "DELETE FROM tbl_post WHERE id={$_GET['delpid']}";
					$result = $db->delete($query);
					if($result){
						echo "Delete Successfull";
					}
				}
			?>
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Title</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id";
						$result = $db->select($query);
						if($result):
							$i=0;
							while($row = $result->fetch_assoc()):
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><a href="editpost.php?editpid=<?php echo $row['id'];?>">Edit</a> || <a onclick="return confirm('are you sure to delete?')" href="?delpid=<?php echo $row['id'];?>">Delete</a></td>
						</tr>
						<?php endwhile; endif; ?>
						
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
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <?php include 'inc/footer.php' ?>
