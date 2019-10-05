<?php
	include '../lib/Session.php'; 
	Session::init();
	include '../config/config.php'; 
	include '../lib/Database.php'; 
	include '../helpers/Formate.php'; 
	$db = new Database();
	$fm = new Formate();

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php 
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(isset($_POST['submit'])){
					$username = $fm->validation($_POST['username']);
					$password = $fm->validation(md5($_POST['password']));

					$username = mysqli_real_escape_string($db->link, $username);
					$password = mysqli_real_escape_string($db->link,$password);

					$query = "SELECT * FROM tbl_user WHERE username='$username' AND possword = '$password'";

					$result = $db->select($query);
					if($result == true){
						$value = mysqli_fetch_assoc($result);
						$row = mysqli_num_rows($result);
						if($row>0){
							Session::set('login', true);
							Session::set('username', $value['username']);
							Session::set('userId', $value['id']);
							header("Location: index.php");
						}
					}else{
						echo "<div style='font-size: 20px; background:red; color: #fff'>UserName and Password Does Not Match !!</div>";
					}
				}
			}
		?>
		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>