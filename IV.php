<?php 
session_start();
$_SESSION['message']='';
// Create connection
$mysqli = new mysqli('localhost','root' ,'','accounts' );
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
echo "Connected successfully";
if($_SERVER['REQUEST_METHOD']   == 'POST')
{
        // success!
             $ivorg= $mysqli->real_escape_string($_POST['ivorg']);
             $Place= $mysqli->real_escape_string($_POST['Place']);
             $date= $mysqli->real_escape_string($_POST['fromdate']);
             $level= $mysqli->real_escape_string($_POST['level']);
             $description= $mysqli->real_escape_string($_POST['description']); 

 $sql= "INSERT INTO `iv`(`ivorg`, `Place`, `date`,`level`,`description`) VALUES('$ivorg','$Place','$date','$level','$description');";

              if($mysqli->query($sql)== true)
              {
                $_SESSION['message']="Successfully Inserted";
              }

             else {
                    // failed 

                    $_SESSION['message']="Unsuccessful";

                  }
}
  
?>


<html> 
<body>

<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Industrial Visit Organised By</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      Name of faculty:<br>
   <input type="text" name="ivorg"><br>
    Place:<br>
   <input type="text" name="Place"><br>
   
    Date:<br>
   <input type="date" name="date"><br>
   
 Class:<br><br>
   <select name="level">
  <option value="SE">SE</option>
  <option value="TE">TE</option>
  <option value="BE">BE</option>
  
</select> <br>
 Decription:<br>
   <input type="text" name="description"><br>

 <input type="submit" value="Submit" name="Submit" class="btn btn-block btn-primary" />
      
      
    </form>
  </div>
</div>


</body>
</html>