<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php 
		 $query = "SELECT * FROM copyright WHERE id=1";
		 $result = $db->select($query);
		 while($row = $result->fetch_assoc()): 
	  ?>
	  <p><?php echo $row['text']; ?></p>
		 <?php endwhile; ?>
	</div>
	<?php 
		$query = "SELECT * FROM tbl_social where id=1";
		$result = $db->select($query);
		while($row = $result->fetch_assoc()):
	?>
	<div class="fixedicon clear">
		<a href="<?php echo $row['facebook']?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $row['twitter']?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $row['linkedin']?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $row['google']?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
	<?php endwhile; ?>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>