<?php 
	include 'config/config.php'; 
	include 'lib/Database.php'; 
	include 'helpers/Formate.php'; 
	$db = new Database();
	$fm = new Formate();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php 
			if(isset($_GET['pageid'])){
				$id = $_GET['pageid'];
				$query = "SELECT * FROM tbl_page WHERE id=$id";
				$result = $db->select($query);
				while($row = $result->fetch_assoc()){
					echo $row['title']."-".TITLE;
				}
			}else{
				echo TITLE;
			}
		?>
	</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<?php 
				$query = "SELECT * FROM tbl_title WHERE id=1";
				$result_t = $db->select($query);
				while($row_t = $result_t->fetch_assoc()):
			?>
			<div class="logo">
				<img src="admin/upload/<?php echo $row_t['logo'];?>" alt="Logo"/>
				<h2><?php echo $row_t['title'];?></h2>
				<p><?php echo $row_t['slogan'];?></p>
			</div>
			<?php endwhile; ?>
		</a>
		<div class="social clear">
		<?php 
			$query = "SELECT * FROM tbl_social where id=1";
			$result = $db->select($query);
			while($row = $result->fetch_assoc()):
		?>
			<div class="icon clear">
				<a href="<?php echo $row['facebook']?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['twitter']?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['linkedin']?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['google']?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
		<?php endwhile; ?>
			<div class="searchbtn clear">
			<form action="search.php" method="GET">
				<input type="text" name="keyword" placeholder="Search keyword..."/>
				<input type="submit" name="search" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a id="active" href="index.php">Home</a></li>
		<?php 
			$query = "SELECT * FROM tbl_page";
			$result = $db->select($query);
			if($result):
				$i=0;
				while($row = $result->fetch_assoc()):
					$i++;
		?>
		<li><a href="page.php?pageid=<?php echo $row['id']?>"><?php echo $row['title']?></a></li>
		
		<?php endwhile; endif; ?>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>