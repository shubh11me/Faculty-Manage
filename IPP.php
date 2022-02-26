<?php 
session_start();
include './functions.php';

$_SESSION['message']='';
// Create connection
$mysqli = new mysqli('localhost','root' ,'','accounts' );
// Check connection
if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}
$user_id = $_SESSION['user_id'];

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
echo "Connected successfully";
if($_SERVER['REQUEST_METHOD']   == 'POST')
{
        // success!
             $Author1= $mysqli->real_escape_string($_POST['Author1']);
             $Author2= $mysqli->real_escape_string($_POST['Author2']);
             $PaperTitle= $mysqli->real_escape_string($_POST['PaperTitle']);
             
             $JournalName= $mysqli->real_escape_string($_POST['JournalName']);
             $DOP= $mysqli->real_escape_string($_POST['DOP']);
              $Volume= $mysqli->real_escape_string($_POST['Volume']);
              $Pagenos= $mysqli->real_escape_string($_POST['Pagenos']);
              $DOI= $mysqli->real_escape_string($_POST['DOI']);


 $sql= "INSERT INTO `inpaperpublication`(`Author1`, `Author2`, `PaperTitle`, `JournalName`, `DOP`, `Volume`, `Pagenos`, `DOI`, `inpaperpublication_added_by`,`inpaperpublication_user_id`)
  VALUES('$Author1','$Author2','$PaperTitle','$JournalName','$DOP','$Volume','$Pagenos','$DOI','$user_id','$user_id');";

              if($mysqli->query($sql)== true)
              {
                alert("success");
              }

             else {
                    // failed 

                    alert("unsuccessful");

                  }
}
  
?>


<html> 
<body>

<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>International Level Paper Publication</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      Author 1:<br>
   <input type="text" name="Author1"><br>
    Author 2:<br>
   <input type="text" name="Author2"><br>
   
    Paper Title:<br>
   <input type="text" name="PaperTitle"><br>
   Name of the Journal:<br>
  <input type="text" name="JournalName"><br>
   Date of Publication:<br><br>
   <input type="date" name="DOP">  <br>
Volume:<br><br>
  <input type="text" name="Volume"><br>
Page Nos.:<br>
  <input type="text" name="Pagenos"><br>
DOI.:<br>
  <input type="text" name="DOI"><br>

 <input type="submit" value="Submit" name="Submit" class="btn btn-block btn-primary" />
      
      
    </form>
  </div>
</div>


</body>
</html>