<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');

		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		$user_set = mysqli_query($link, $loginstring);
		//echo mysqli_num_rows($user_set);

		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$lastLogin = $founduser['user_lastlogin'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];

			if(mysqli_query($link, $loginstring)){
				$updateIp = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id= {$id}";
				$updateLogin = "UPDATE tbl_user SET user_lastlogin='{$lastLogin}' WHERE user_id= {$id}";
				$updatequery = mysqli_query($link, $updateIp, $updateLogin);
			}

			redirect_to("admin_index.php");
		}else{
			$errorLogin = "SELECT * FROM tbl_user WHERE user_name ='{$username}'";
			$errorLoginQuery = mysqli_query($link, $errorLogin);

			$errorUser = mysqli_fetch_array($errorLoginQuery, MYSQLI_ASSOC);

			$attempts = $errorUser['user_lock'];
			$attemptsCount = ++$attempts;
			$updateLock = "UPDATE tbl_user SET user_lock = '{$attemptsCount}' WHERE user_name = '{$username}'";

			$message = "Looks like you missed something. Try again!";
			return $message;
		}

		mysqli_close($link);
	}
?>
