<?php 
session_start();
$_SESSION['message']='';
include './functions.php';

// Create connection
$mysqli = new mysqli('localhost','root' ,'','accounts' );
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$glorg=$_SESSION['user_id'];
$glorgAddedBy=$_SESSION['user_id'];
if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}
echo "Connected successfully";
if($_SERVER['REQUEST_METHOD']   == 'POST')
{
        // success!
        if ($_SESSION['role'] == 'admin') {
             $glorg= $mysqli->real_escape_string($_POST['glorg']);
        }
             $glname= $mysqli->real_escape_string($_POST['glname']);
             $fromdate= $mysqli->real_escape_string($_POST['fromdate']);
             
             $todate= $mysqli->real_escape_string($_POST['todate']);
             $level= $mysqli->real_escape_string($_POST['level']);
              

 $sql= "INSERT INTO `guestlect`(`glorg`, `glname`, `date`,`level`, `guestlect_user_id`,`guestlect_added_by`) 
 VALUES('$glorg','$glname','$date','$level','$glorg','$glorgAddedBy');";

              if($mysqli->query($sql)== true)
              {
                $last_id = $mysqli->insert_id;

                genID($last_id,'guestlect','guestlect_id','guestlect');
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
//<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Guest Lecture Organised By</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <?php
        if ($_SESSION['role'] == 'admin') {
          $users_q = mysqli_query($mysqli, "select * from users");

        ?>
          Name of faculty:<br>
          <select name="glorg">

            <option disabled selected value="def">Select Faculty</option>
            <?php
            while ($users = mysqli_fetch_assoc($users_q)) {
              echo "<option value='" . $users['user_id'] . "'>" . $users['username'] . "</option>";
            }
            ?>
          </select><br>
        <?php

        } ?>
    Topic Name:<br>
   <input type="text" name="glname"><br>
   
    Date:<br>
   <input type="date" name="date"><br>
   
 Class:<br><br>
   <select name="level">
  <option value="SE">SE</option>
  <option value="TE">TE</option>
  <option value="BE">BE</option>
  
</select> <br>

 <input type="submit" value="Submit" name="Submit" class="btn btn-block btn-primary" />
      
      
    </form>
  </div>
</div>


</body>
</html>