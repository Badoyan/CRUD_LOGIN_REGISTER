<?php
//Include Libraries
require_once(__DIR__.'/class/news.class.php');
require_once(__DIR__.'/class/auth.class.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Location" content="http://localhost/news.com">
		<title>Welcome Dashboard</title>
		<link rel="stylesheet" href="css/style.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			session_start();
		//	error_reporting(E_ALL);
			$action = '';
			if ( isset($_REQUEST['page']) && !empty($_REQUEST['page']) ) {
				$action = $_REQUEST['page'];
			}
			
		?>

		<?php if ( isset($_SESSION['username']) && !empty($_SESSION['username']) && empty($action) ): ?>

		<div class="form">
			<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
			<p>This is yor admin panel, where you can add, edit or delete news.</p>
			<p><a href="index.php?page=list">List of news</a></p>
			<a href="index.php?page=logout">Logout</a>
		</div>
			<?php exit(); ?>
		<?php elseif ( !isset($_SESSION['username']) && empty($_SESSION['username']) && $action == 'login' ):  ?>
			<?php require_once("login.php"); ?>
			<?php exit(); ?>
		<?php elseif ( !isset($_SESSION['username']) && empty($_SESSION['username']) && empty($action) ):  ?>
			<?php require_once("login.php"); ?>
			<?php exit(); ?>

		<?php elseif ( !isset($_SESSION['username']) && empty($_SESSION['username']) && $action == 'registration' ):  ?>
			<?php require_once("registration.php"); ?>
			<?php exit(); ?>	

		<?php elseif ( isset($_SESSION['username']) && !empty($_SESSION['username']) && $action == 'logout' ):  ?>
			<?php
				// Destroying All Sessions
				if(session_destroy())
				{
				// Redirecting To Login Page
				header("Location: index.php");
				exit();
				} 
			?>

		<?php elseif ( isset($_SESSION['username']) && !empty($_SESSION['username']) && $action == 'list' ):  ?>	
			<?php require_once("list.php"); ?>
			<?php exit(); ?>

		<?php elseif ( isset($_SESSION['username']) && !empty($_SESSION['username']) && $action == 'read' ):  ?>	
			<?php require_once("read.php"); ?>
			<?php exit(); ?>

		<?php elseif ( isset($_SESSION['username']) && !empty($_SESSION['username']) && $action == 'create' ):  ?>	
			<?php require_once("create.php"); ?>
			<?php exit(); ?>

		<?php elseif ( isset($_SESSION['username']) && !empty($_SESSION['username']) && $action == 'update' ):  ?>	
			<?php require_once("update.php"); ?>
			<?php exit(); ?>

		<?php elseif ( isset($_SESSION['username']) && !empty($_SESSION['username']) && $action == 'delete' ):  ?>	
			<?php require_once("delete.php"); ?>
			<?php exit(); ?>			

		<?php endif; ?>

	</body>
</html>