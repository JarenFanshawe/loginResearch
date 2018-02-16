<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome to your admin panel login</title>

	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/main.css"

	<link href="https://fonts.googleapis.com/css?family=Muli|Open+Sans" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body id="loginBody">
	<h1 class="hide">Login Page</h1>

	<div class="hide">
		<?php if(!empty($message)){ echo $message;} ?>
	</div>

	<section class="row fullWidth">
		<div class="small-12 columns" id="loginCon">
			<h2>Member Login</h2>
			<form action="admin_login.php" method="post">
				<label>Username</label>
				<input class="inputForm" type="text" name="username" value="" placeholder="ex: janesmith123" required>

				<label>Password</label>
				<input class="inputForm" type="password" name="password" value="" placeholder="••••••••" required>

				<input class="inputForm" type="radio" name="rememberme" value="rememberme"><span id="radioText">Remember Me</span><br>

				<input class="loginButton" id="loginButton" type="submit" name="signup" value="Sign Up">
				<input class="loginButton" id="signupButton" type="submit" name="submit" value="Login">
			</form>
		</div>
	</section>


	<script src="js/vendor/jquery.js"></script>
      <script src="js/foundation.min.js"></script>
      <script src="js/main.js"></script>
      <script>
        $(document).foundation();
    </script>

</body>
</html>
