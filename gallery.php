<?php include("config.php"); ?>
<?php include("header.php"); ?>
<html>
<div class="maincontent">
<form id='login' action='gallery.php' method='post' accept-charset='UTF-8'>
Username
<input type='text' name='username' id='username'  maxlength="50" />
<br>
Password
<input type='password' name='password' id='password' maxlength="50" />

<input type='submit' name='Submit' value='Submit' />
 
</form>

<?php

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    echo("<br><a href=index.php>Return to home page </a>");
    exit();
}

$username = "";
$password = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
}

$username = addslashes($username);
$password = addslashes($password);



$query = "select Username, Password from User where Username=\"$username\" and Password=\"" . sha1($password) . "\"";

/*echo "executing query: " . $query;*/



    $stmt = $db->prepare($query);
    $stmt->execute();


if ($stmt->fetch()) {
	echo "<button><a href='fileUpload.php'> Click to upload image.</a></button>";
}


// Sort in ascending order - this is default
$dateinamen = scandir("uploadedfiles");

// array_shift($dateinamen);
// array_shift($dateinamen);

for ($i=2; $i < count($dateinamen); $i++) { 
	echo "<br> <img src='uploadedfiles/$dateinamen[$i]'";
}

?>
</div>
</html>


<?php include("footer.php"); ?>