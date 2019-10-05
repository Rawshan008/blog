	<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php 
						$c_query = "SELECT * FROM tbl_category";
						$result = $db->select($c_query);

						if($result):
							while($row = $result->fetch_assoc()):
					?>
						<li><a href="posts.php?category=<?php echo $row['id']?>"><?php echo strtoupper($row['name']); ?></a></li>
					<?php
						endwhile;
						else:
					?>
						<li>No Category Found</li>
					<?php 
						endif;
					?>				
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<?php 

						$l_query = "SELECT * FROM tbl_post ORDER BY date DESC LIMIT 4";
						$l_result = $db->select($l_query);
						if($l_result):
							while($l_row = $l_result->fetch_assoc()):
					
					?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $l_row['id'] ?>"><?php echo $l_row['title'] ?></a></h3>
						<a href="#"><img src="admin/upload/<?php echo $l_row['image'] ?>" alt="post image"/></a>
						<?php echo $fm->textShortner($l_row['body'], 150) ?>	
					</div>
					<?php
						endwhile;
						else: 
					?>
					<div class="popular clear">
						<h3>No Post Found</h3>	
					</div>
					<?php endif; ?>
	
			</div>
			
		</div>