<?php 
	include 'inc/header.php'; 


	/**
	 * pagination of posts
	 */

	 $per_page = 3;
	 if(isset($_GET['page'])){
		$page = $_GET['page'];
	 }else{
		 $page = 1;
	 }
	 $start_form = ($page-1)*$per_page;

?>

<?php include 'inc/slider.php'; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<?php 
				$query = "SELECT * FROM tbl_post LIMIT {$start_form},{$per_page}";
				$post = $db->select($query);
				if($post):
					while($result = $post->fetch_assoc()):
			?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id']?>"><?php echo $result['title']?></a></h2>
				<h4><?php echo $fm->formateDate($result['date'])?>, By <a href="#"><?php echo $result['author']?></a></h4>
				<a href="post.php?id=<?php echo $result['id']?>"><img src="admin/upload/<?php echo $result['image']?>" alt="post image"/></a>
				<?php echo $fm->textShortner($result['body']);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>

			<?php
				endwhile;
			?>
			<div class="pagination">
			<?php 
				$query = "SELECT * FROM tbl_post";
				$result = $db->select($query);
				$rows_count = mysqli_num_rows($result);
				$rows_count = ceil($rows_count/$per_page);
			?>
				<a href="index.php?page=1">First Page</a>
				<?php for($i=1; $i<=$rows_count; $i++){ ?>
					<a href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a>
				<?php } ?>
				<a href="index.php?page=<?php echo $rows_count?>">last Page</a>
			</div>
			<?php
				else: 
					header("location: 404.php");
				endif;
			?>



		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<?php include 'inc/footer.php'; ?>