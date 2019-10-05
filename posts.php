<?php include 'inc/header.php'; ?>

<?php
	

	if(!isset($_GET['category']) || $_GET['category'] == null){
		header("Location: 404.php");
	}else{
		$category = $_GET['category'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			
				<?php 
					$query = "SELECT * FROM tbl_post WHERE cat={$category}";
					$result = $db->select($query);
					if($result):
						while($row = $result->fetch_assoc()):
				?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?php echo $row['id']?>"><?php echo $row['title']; ?></a></h2>
                    <h4><?php echo $fm->formateDate($row['date'])?>, By <?php echo $row['author']; ?></h4>
                    <img src="admin/upload/<?php echo $row['image']; ?>" alt="MyImage"/>
                    <?php echo $fm->textShortner($row['body'],150); ?>
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