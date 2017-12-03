<!DOCTYPE html>
<html>
	<head>
		<link href="main.css" rel="stylesheet" type="text/css">
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
					<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php"> HOME</a>
				<li>
					<a class="<?php echo ($current_page == 'aboutus.php' || $current_page == '') ? 'active' : NULL ?>" href="aboutus.php">ABOUT US</a>
				</li>
				<li>
					<a class="<?php echo ($current_page == 'browsebooks.php' || $current_page == '') ? 'active' : NULL ?>" href="browsebooks.php">BROWSE BOOKS</a>
				</li>
				<li>
					<a class="<?php echo ($current_page == 'reservedBooks.php' || $current_page == '') ? 'active' : NULL ?>" href="reservedBooks.php">MY BOOKS</a>
				</li>
				<li>
					<a class="<?php echo ($current_page == 'contact.php' || $current_page == '') ? 'active' : NULL ?>" href="contact.php">CONTACT</a>
				</li>
				<li>
					<a class="<?php echo ($current_page == 'gallery.php' || $current_page == '') ? 'active' : NULL ?>" href="gallery.php">GALLERY</a>
				</li>
			</ul>
		</nav>

<?php include 'sessionHijacking.php'; ?>	

	</header>

<!-- to comment out, shortcut: cmd+shit+7 -->
	