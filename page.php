<?php include 'inc/header.php'; ?>
<?php
	

	if(!isset($_GET['pageid']) || $_GET['pageid'] == null){
		header("Location: 404.php");
	}else{
		$pageid = $_GET['pageid'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
				
				$query = "SELECT * FROM tbl_page WHERE id=$pageid";
				$result = $db->select($query);
				if($result):
					while($row = $result->fetch_assoc()):

			?>
			<div class="about">
				<h2><?php echo $row['title']?></h2>
	
				<?php echo $row['body']; ?>
			</div>

			<?php 
				endwhile;
			else:
				header("Location: 404.php");
			endif;
			?>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>
<?php include 'inc/footer.php'; ?>