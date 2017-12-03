<!-- In this file:
Adding worked, but then I worked in deleting books, now it just says says "Book added" but it doesn't show up in database
 -->
 
 <?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("location:main_login.php");
// }
?>

<?php
include("config.php");
$title = "Add new book";
include("header.php");
?>

<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim($_POST['newbooktitle']);
    $newbookauthor = trim($_POST['newbookauthor']); //spaces before and after will be ignored, values identically to form

    if (!$newbooktitle || !$newbookauthor) { //if they're not entered, this happens 
        printf("You must specify both a title and an author");
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    $newbooktitle = addslashes($newbooktitle);
    $newbookauthor = addslashes($newbookauthor); //if booktitle has Apstrophen so code can process it 

    # Open the database using the "Book" account
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); //based on cofig file

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an insert statement and execute it
    $stmt = $db->prepare("insert into Book(BookID, Title, Author) values (null, ?, ?)"); //do I need BookID //BookID Title Author Reserved, but BookID is AI...and reserved should be 0
    $stmt->bind_param('iss', $newbooktitle, $newbookauthor); //sending it as string
    $stmt->execute();
    printf("<br>Book Added!");             
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
}

//UPDATE: It says "Book added" but it doesn't show up in database (but it worked before I made changes in "deletebook.php")

// Not a postback, so present the book entry form
?>

<h3>Add a new book</h3>
<hr>
Enter both, a title and an author. 
<form action="addbook.php" method="POST">
    <table>
        <tbody>
            <tr>
                <td>Title:</td>
                <td><INPUT type="text" name="newbooktitle"></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><INPUT type="text" name="newbookauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Add Book"></td>
            </tr>
        </tbody>
    </table>
</form>
<?php include("footer.php"); ?>