<!DOCTYPE html>
<html>
	<head>
		<link href="../main.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<title>Lab 6</title>
		<meta name="description" content=”Lab6"/> 
		<meta charset="utf-8" />
	</head> 
	<header>
		<nav>
			<ul>
				<li>
					<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">HOME</a>
				<li>
					<a class="<?php echo ($current_page == 'addbook.php' || $current_page == '') ? 'active' : NULL ?>" href="addbook.php">ADD BOOK</a>
				</li>
				<li>
					<a class="<?php echo ($current_page == 'deletebook.php' || $current_page == '') ? 'active' : NULL ?>" href="deletebook.php">DELETE BOOK</a>
				</li>
				<li>
					<a class="<?php echo ($current_page == 'gallery.php' || $current_page == '') ? 'active' : NULL ?>" href="gallery.php">UPLOAD</a>
				</li>
				<li>
					<a class="<?php echo ($current_page == 'logout.php' || $current_page == '') ? 'active' : NULL ?>" href="logout.php">LOGOUT</a>
				</li>
			</ul>
		</nav>

	</header>
	