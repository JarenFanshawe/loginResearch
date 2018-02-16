<?php
	require_once('phpscripts/config.php');
	require_once('phpscripts/connect.php');
	confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tblQuery = "SELECT * FROM tbl_user WHERE user_id = '{$id}'";
	$user_set = mysqli_query($link, $tblQuery);

	$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
	$date = $founduser['user_date'];

	$afternoon = "Almost quitting time! ";
	$evening = "Time to head home! ";
	$late = "Sleep tight! ";
	$moring = "Get to work! ";

	date_default_timezone_set('America/Toronto');
	$current_time = date(G);

	if ($current_time >= 12 && $current_time <= 16) {
	echo $afternoon;
	}elseif ($current_time >= 17 && $current_time <= 24) {
	echo $evening;
	}elseif ($current_time >= 1 && $current_time <= 5) {
	echo $late;
	}elseif ($current_time >= 6 && $current_time <= 11) {
	echo $morning;
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['user_name']; ?>'s admin panel.</title>

	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/main.css"

	<link href="https://fonts.googleapis.com/css?family=Muli|Open+Sans" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<h1 class="hide">Admin Page</h1>

	<section class="row fullWidth" id="profileCon">
		<h2 class="hide">Profile Container</h2>

		<div class="small-6 columns" id="profileImg">
			<i class="fa fa-user-circle-o" aria-hidden="true"></i>
		</div>

		<div class="small-6 columns" id="profileTitle">
			<h3><?php echo $_SESSION['user_name']; ?></h3>
			<h4>Last login: <?php echo $date; ?></h4>
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
