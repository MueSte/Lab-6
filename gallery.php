<?php include("config.php"); ?>
<?php include("header.php"); ?>

<div class="maincontent">

<?php
// Sort in ascending order - this is default
$dateinamen = scandir("uploadedfiles");

// array_shift($dateinamen);
// array_shift($dateinamen);

for ($i=2; $i < count($dateinamen); $i++) { 
	echo "<br> <img src='uploadedfiles/$dateinamen[$i]'";
}

?>

</div>

<?php include("footer.php"); ?>