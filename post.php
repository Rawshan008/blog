<?php include 'inc/header.php'; ?>

<?php

	if(!isset($_GET['id']) || $_GET['id'] == null){
		header("Location: 404.php");
	}else{
		$id = $_GET['id'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					$query = "SELECT * FROM tbl_post WHERE id={$id}";
					$result = $db->select($query);
					if($result):
						while($row = $result->fetch_assoc()):
				?>
				<h2><?php echo $row['title']; ?></h2>
				<h4><?php echo $fm->formateDate($row['date'])?>, By <?php echo $row['author']; ?></h4>
				<img src="admin/upload/<?php echo $row['image']; ?>" alt="MyImage"/>
				<?php echo $row['body'] ?>
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
						$r_query = "SELECT * FROM tbl_post WHERE cat='{$row['cat']}' ORDER BY rand() LIMIT 6";
						$r_result = $db->select($r_query);
						if($r_result):
							while($r_rows = $r_result->fetch_assoc()):
					?>
					<a href="post.php?id=<?php echo $r_rows['id'];?>"><img src="admin/upload/<?php echo $r_rows['image']; ?>" alt="post image"/></a>

					<?php 
						endwhile;
						else:
							echo "No post found this category";
						endif;
					?>
				</div>

				<?php 
					endwhile;
					else:
						header("Location: 404.php");
					endif;
				?>
			</div>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>
<?php include 'inc/footer.php'; ?>