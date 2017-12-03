<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("location:main_login.php");
// }
?>

<?php include("config.php"); ?>
<?php include("header.php"); ?>


<?php



if(isset($_FILES['upload'])) {

  $allowedextensions = array ('jpeg', 'png', 'jpg');

  $extension = strtolower(substr($_FILES['upload']['name'], strpos($_FILES['upload']['name'], '.') +1));

  echo $extension;

  $error = array ();




  if(in_array($extension, $allowedextensions ) === false) {

    $error[] = "Extension is not allowed, the allowed ones are... ";

  }

  if($_FILES['upload']['size']>10000000){

    $error[] = "Thie file size is too big. Maximum is 10MB";

  }


  if(empty($error)){

    move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$_FILES['upload']['name']}"); //correct folder name?


  }


}


 ?>


<html>
    <head>
        <title>Security - Upload</title>
    </head>
      <body>

          <?php

          if(isset($error)) {

            if (empty($error)) {
              
              echo '<a href= "uploadedfiles/'.$_FILES['upload']['name'].'">This is your file'; //correct folder?

            }

            else {

              foreach($error as $err) {

                echo $err;
                echo '<br>';
                
              }

            }

          }

          ?>
            <div>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <input type="file" name="upload" /></br>
                  <input  type="submit" value="submit" />
                  </form>                   
            </div>
  <?php include("../footer.php"); ?>
      </div>
      </div>
    </body>
</html>