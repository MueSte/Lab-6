<!-- In this file:
Deleting works, but it doesn't look good: Delete Button is "selected" and then I submit it - book deleted
Before I changed this file, adding books worked -->

<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("location:main_login.php");
// }
?> 

<?php
include("config.php");
$title = "Delete book";
include("header.php");
?>

<div class="maincontent">

<h3>Search Catalog</h3>
<hr>

<form action="deletebook.php" method="POST">
    <table>
        <tbody>
            <tr>
                <td><h3>Title:</h3></td>
                <td><INPUT type="text" name="searchtitle"></td>
            </tr>
            <tr>
                <td><h3>Author:</h3></td>
                <td><INPUT type="text" name="searchauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Submit"></td>
            </tr>
        </tbody>
    </table>
</form>

<h3>Book List</h3>
<hr>
<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}

//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
// }

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    echo("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select BookID, Title, Author from Book";  //deleted Reserve


if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " where Title like '%" . $searchtitle . "%'";
    // select bookid, Title, Author from Book  where Title like '%origin%'
}

if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " where Author like '%" . $searchauthor . "%'";
}

if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " where Title like '%" . $searchtitle . "%' and Author like '%" . $searchauthor . "%'"; // unfinished
}

// echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($bookid, $Title, $Author); 
    $stmt->execute();

    echo '<table bgcolor="#dddddd" cellpadding="6">';
    echo '<tr><b> <td>BookID</td> <td>Title</td> <td>Author</td> <td>Delete</td> </b> </tr>';
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td> $bookid </td> <td>$Title </td><td> $Author </td>";
      
        	echo '<td><a href="deletebook.php?BookID=' . urlencode($bookid) . '"> Delete </a></td>';

        echo "</tr>";
    }
    echo "</table>";
    ?>

<?php
if (isset($_GET['submit'])) {
    // We know the borrower so go ahead and check the book out
    # Get data from form
    $BookID = trim($_GET['BookID']);      // From the hidden field
    $bookid = addslashes($bookid);

    # Open the database using the "admin" account
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("delete from Book where BookID = ?");
        $stmt->bind_param('i', $BookID);
        $response = $stmt->execute();
        printf("<br>Book deleted!");
        printf("<br><a href=index.php>Return to home page </a>");
    
    
    exit;
}
?>

<!-- It would be nice, if it would show up after I selected a book... -->

<div class="maincontent">
<h3>Delete book</h3>
<hr>
<form action="deletebook.php" method="GET"> 
   Are you sure you want to delete book?
   <?php
   $bookid = trim($_GET['BookID']);
   echo '<INPUT type="hidden" name="BookID" value=' . $bookid . '>';
   ?>
   <INPUT type="submit" name="submit" value="Continue">
</form>
</div>
</div>

<?php include("footer.php"); ?>


