<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:main_login.php");
}
?>

<?php include ("config.php"); ?>
<?php include ("header.php"); ?>
  <div>
		<h3>Welcome to the Admin page</h3>
		<p>Here you are able to add and delete books. </p><br>
  </div>
  <?php include ("footer.php"); ?>