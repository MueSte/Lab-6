<!-- In this file:
 Go/Submit Button doens't go anywhere??! Therefore the session checks in the other files are commented out
 Include SQL Injection?
 Login funktioniert nicht mit "hello / goodbye"
 -->

 <?php
 session_start();
 if (isset($_SESSION['username'])) {
	 header("location:index.php");
 }
 ?>
 
 <?php 
 include("../config.php"); 
 include("header.php");
 ?>
 
 <div class="maincontent">
 
 <?php 
 if(isset($_POST) && !empty($_POST)){ //if user has entered something
 
	 $myusername =  stripslashes($_POST['myusername']); 
	 $mypassword =  stripslashes($_POST['mypassword']); 
	 
	 @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
 
	 if ($db->connect_error) {
		 echo "could not connect: " . $db->connect_error;
		 exit();
	 }
 
 
	 $stmt = $db->prepare("SELECT Adminname, Adminpassword FROM Admin WHERE Adminname = ?");
	 $stmt->bind_param('s', $myusername); //its in the database, then store it into this variables 
 
	 $stmt->bind_result($username, $password); //password from db stored in this variable 
	 $stmt->execute();
 
	 while ($stmt->fetch()) {
		 if (sha1($mypassword) == $password) //comparison if typed in password matches to the on in db
		 //try without sha1
		 {
			 $_SESSION['username'] = $myusername; //try echoing out
			 header("location: index.php");
			 // echo "<script>window.location.replace('index.php');</script>";
			 exit();
		 }
	 }
 
	 //THIS WORKED BEFORE:
	 // $stmt->fetch();
	 // if ("3c8ec4874488f6090a15-nicht komplett" == $password){ //see if they're the same, only one admin
	 // 	$_SESSION['username'] = $myusername;
	 
	 // 	echo "<script>window.location.replace('index.php');</script>";
 
	 // 	exit();
	 // }
 }
 ?>
 
 
 <!-- USE THIS LOG IN 
	 
	 @ $db = new mysqli('localhost', 'root', 'dbpass', 'dbname');   
 
 if ($db->connect_error) {
	 echo "could not connect: " . $db->connect_error;
	 printf("<br><a href=index.php>Return to home page </a>");
	 exit();
 }
 
 if (isset($_POST['Adminname'], $_POST['Adminpassword'])) { //did user type something in?
 
	 $uname = mysqli_real_escape_string($db, $_POST['Adminname']);
	 
	 $upass = sha1($_POST['Adminpassword']);
	 
	 
	 $query = ("SELECT * FROM Admin WHERE Adminname = '{$uname}' "." AND Adminpassword = '{$upass}'");
		
	 
	 $stmt = $db->prepare($query);
	 $stmt->execute();
	 $stmt->store_result(); 
	 
	 $totalcount = $stmt->num_rows();
 
	 if ($totalcount==1){
		 $_SESSION['Adminname']=$uname;
			 header("location:index.php"); 			//or .../index.php?
	 }
	 else {
		 echo "Wrong password ord adminname!"
		 header("location:main_login.php"); 			//or wherever, it was unsuccessful
	 }
 
 } -->
 
 
 
 <div class="topnav">
   <a class="active" href="main_login.php">Login</a>
 </div>
 <div class="container">
	 <form method="POST" action="main_login.php">
		 <input type="text" name="myusername">
		 <input type="password" name="mypassword">
		 <input id="admin-submit" type="submit" value="Submit"> 
	 </form>
 </div>
 
 <!-- Submit Button doens't go anywhere??!! -->
 </div>
 
 <?php include("footer.php"); ?>