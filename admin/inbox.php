<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
           <div class="grid_2">
            <?php include 'inc/sidebar.php'; ?>
        </div>
        <div class="grid_10">
		<?php 
			if(isset($_GET['seenid'])){
				$seenid = $_GET['seenid'];

				$query = "UPDATE tbl_contact SET status = 1 WHERE id=$seenid";
				$result = $db->update($query);
				if($result){
					echo "Send message in Seenbox";
				}
			}
		?>
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contact WHERE status=0";
						$result = $db->select($query);
							if($result):
							$i = 0;
							while($row = $result->fetch_assoc()):
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $fm->textShortner($row['message'], 30);?></td>
							<td><?php echo $fm->formateDate($row['date']);?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $row['id']?>">View</a> || 
								<a href="replaymsg.php?msgid=<?php echo $row['id']?>">Replay</a> || 
								<a href="?seenid=<?php echo $row['id']?>">Seen</a>
							</td>
						</tr>
					<?php 
						endwhile;
					endif;
					?>
					</tbody>
				</table>
				<h2>Seen Box</h2>
				<table class="data display datatable" id="example">
				<?php 
					if(isset($_GET['smgdis'])){
						$smgdis = $_GET['smgdis'];

						$query = "DELETE FROM tbl_contact WHERE id=$smgdis";
						$result = $db->delete($query);
						if($result){
							echo "Message Delete Successfullt";
						}
					}
				?>
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contact WHERE status=1";
						$result = $db->select($query);
						if($result):
							$i = 0;
							while($row = $result->fetch_assoc()):
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $fm->textShortner($row['message'], 30);?></td>
							<td><?php echo $fm->formateDate($row['date']);?></td>
							<td>
							<a onclick="return confirm('are you sure to delete?') " href="?smgdis=<?php echo $row['id'];?>">Delete</a>
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