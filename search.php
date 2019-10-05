<?php include 'inc/header.php'; ?>

<?php
	

	if(!isset($_GET['keyword']) || $_GET['keyword'] == null){
		header("Location: 404.php");
	}else{
		$keyword = $_GET['keyword'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			
				<?php 
					$query = "SELECT * FROM tbl_post WHERE title LIKE '%$keyword%' OR body LIKE '%$keyword%'";
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
                ?>
                <h1>Search Keyword Not found</h1>
                <?php
					endif;
				?>
			
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>
<?php include 'inc/footer.php'; ?>