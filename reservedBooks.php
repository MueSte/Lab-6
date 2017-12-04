<?php

include("config.php");
$title = "My reserved books";
include("header.php");
?>


<div class="maincontent">

<?php 

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    echo("<br><a href=index.php>Return to home page </a>");
    exit();
}

$query = " select BookID, Title, Author, Reserved from Book";

$stmt = $db->prepare($query);
$stmt->bind_result($BookID, $Title, $Author, $Reserved); 
$stmt->execute();

    echo '<table bgcolor="#dddddd" cellpadding="6">';
    echo '<tr><b> <td>BookID</td> <td>Title</td> <td>Author</td> <td>Return</td> </b> </tr>';
    while ($stmt->fetch()) {

        if ($Reserved === 1) {
            echo "<tr><td> $BookID </td> <td>$Title </td><td> $Author </td>";
            echo '<td><a href="returnBook.php?bookid=' . urlencode($BookID) . '"> Return </a></td></tr>';

        }

    }
    echo "</table>";

?>
</div>
<?php include("footer.php"); ?>

