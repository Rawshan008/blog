<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
           <div class="grid_2">
            <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<?php 
					if(isset($_GET['delid'])){
						$delid = $_GET['delid'];

						$query = "DELETE FROM tbl_category WHERE id='$delid'";
						$result = $db->delete($query);
						if($result){
							echo "Category Delete Successfllt";
						}
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_category ORDER BY id";
						$category = $db->select($query);
						if($category):
							$i = 0;
							while($row = mysqli_fetch_assoc($category)):
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $row['id'];?>">Edit</a> || <a  onclick="return confirm('are you sure to delete?') "href="?delid=<?php echo $row['id'];?>">Delete</a></td>
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
