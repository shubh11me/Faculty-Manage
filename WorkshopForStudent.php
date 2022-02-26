<?php 
session_start();
$_SESSION['message']='';
include './functions.php';

// Create connection
$mysqli = new mysqli('localhost','root' ,'','accounts' );
if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}
$workshoporg=$_SESSION['user_id'];
$workshoporgAddedBy=$_SESSION['user_id'];
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
echo "Connected successfully";
if($_SERVER['REQUEST_METHOD']   == 'POST')
{
        // success!
        if ($_SESSION['role'] == 'admin') {
             $workshoporg= $mysqli->real_escape_string($_POST['workshoporg']);
        }
             $workshopname= $mysqli->real_escape_string($_POST['workshopname']);
             $fromdate= $mysqli->real_escape_string($_POST['fromdate']);
             
             $todate= $mysqli->real_escape_string($_POST['todate']);
             $level= $mysqli->real_escape_string($_POST['level']);
              

 $sql= "INSERT INTO `wsorgfstud`(`workshoporg`, `workshopname`, `fromdate`, `todate`, `level`,`wsorgfstud_added_by`, `wsorgfstud_user_id`) 
 VALUES('$workshoporg','$workshopname','$fromdate','$todate','$level','$workshoporgAddedBy','$workshoporg');";

              if($mysqli->query($sql)== true)
              {
                $last_id = $mysqli->insert_id;

                genID($last_id,'wsorgfstud','wsorgfstud_id','wsorgfstud');
                alert("success");  
                            }

             else {
                    // failed 

                    alert("Unsuccessful");

                  }
}
  
?>


<html> 
<body>
//<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>workshop Organised for Student</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <?php
        if ($_SESSION['role'] == 'admin') {
          $users_q = mysqli_query($mysqli, "select * from users");

        ?>
          Name of faculty:<br>
          <select name="workshoporg" id="">

            <option disabled selected value="def">Select Faculty</option>
            <?php
            while ($users = mysqli_fetch_assoc($users_q)) {
              echo "<option value='" . $users['user_id'] . "'>" . $users['username'] . "</option>";
            }
            ?>
          </select><br>
        <?php

        } ?>
    Worshop Name:<br>
   <input type="text" name="workshopname"><br>
   
    From Date:<br>
   <input type="date" name="fromdate"><br>
   To Date:<br>
  <input type="date" name="todate"><br>
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