<?php include 'inc/header.php'; ?>
        <div class="clear">
        </div>
           <div class="grid_2">
            <?php include 'inc/sidebar.php'; ?>
        </div>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Single Message</h2>
                <div class="block">
                    <?php if(isset($_GET['msgid'])): ?>        
                    <table class="data display datatable">
					<thead>
						<tr>
							<th width="15%">Name</th>
							<th width="20%">Email</th>
							<th width="45%">Message</th>
							<th width="20%">Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        $id = $_GET['msgid'];
						$query = "SELECT * FROM tbl_contact WHERE id=$id";
						$result = $db->select($query);
						while($row = $result->fetch_assoc()):
					?>
						<tr class="odd gradeX">
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['message'];?></td>
							<td><?php echo $fm->formateDate($row['date']);?></td>
						</tr>
					<?php 
						endwhile;
					?>
					</tbody>
				</table>
                <?php endif; ?>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php include 'inc/footer.php'; ?>