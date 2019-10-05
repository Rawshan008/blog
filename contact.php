<?php include 'inc/header.php'; ?>

				<div class="contentsection contemplete clear">
					<div class="maincontent clear">
						<div class="about">
						<h2>Contact us</h2>
						<?php 
							if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
								$name = $_POST['name'];
								$email = $_POST['email'];
								$message = $_POST['message'];

								$name = htmlspecialchars($_POST['name']);
								$email = $_POST['email'];
								$email = filter_var($email, FILTER_SANITIZE_EMAIL);
								if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
									echo("$email is a valid email address");
								}
								$message = htmlspecialchars($_POST['message']);

								$query = "INSERT INTO tbl_contact(name, email, message) VALUE('$name', '$email', '$message')";

								$result = $db->insert($query);
								if($result){
									echo "Form Submitted Successfullt";
								}

							}
						?>
						<form action="" method="post">
							<table>
							<tr>
								<td>Your Name:</td>
								<td>
								<input type="text" name="name" placeholder="Enter Your Name" required="1"/>
								</td>
							</tr>
							
							<tr>
								<td>Your Email Address:</td>
								<td>
								<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
								</td>
							</tr>
							<tr>
								<td>Your Message:</td>
								<td>
								<textarea name="message"></textarea>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
								<input type="submit" name="submit" value="Submit"/>
								</td>
							</tr>
					</table>
				<form>				
			</div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<?php include 'inc/footer.php'; ?>