<?php include("config.php"); ?>
<?php include("header.php"); ?>

<body>

<?php




// $bookid = trim($_GET['bookid']);
// echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo "You are reserving book with the ID: " . $bookid;

    // Prepare an update statement and execute it

    $query = "UPDATE Book SET Reserved=1 WHERE BookID=" . $bookid;

    $stmt = $db->prepare($query);
    $stmt->execute();

    printf("<br>Book Reserved!");
    printf("<br><a href=browsebooks.php>Search and book more Books </a>");
    printf("<br><a href=reservedBooks.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    // exit();
    ?>
    
</body>
<?php include("footer.php"); ?>



