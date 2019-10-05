<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
           <div class="grid_2">
            <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
				<?php 
					if(isset($_GET['desid'])){
						$desid = $_GET['desid'];

						$query = "DELETE FROM tbl_slider WHERE id='$desid'";
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
							<th>Slide Title</th>
							<th>Slide Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_slider ORDER BY id";
						$result = $db->select($query);
						if($result):
							$i = 0;
							while($row = $result->fetch_assoc()):
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['title'];?></td>
							<td><img width="200px" src="upload/<?php echo $row['image'];?>" alt=""></td>
							<td><a href="editslide.php?slidetid=<?php echo $row['id'];?>">Edit</a> || <a  onclick="return confirm('are you sure to delete?') "href="?desid=<?php echo $row['id'];?>">Delete</a></td>
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
