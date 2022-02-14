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
             $workshopatt= $mysqli->real_escape_string($_POST['workshopatt']);
             $workshopname= $mysqli->real_escape_string($_POST['workshopname']);
             $fromdate= $mysqli->real_escape_string($_POST['fromdate']);
             
             $todate= $mysqli->real_escape_string($_POST['todate']);
             $level= $mysqli->real_escape_string($_POST['level']);
              

 $sql= "INSERT INTO `wsatt`(`workshopatt`, `workshopname`, `fromdate`, `todate`, `level`) VALUES('$workshopatt','$workshopname','$fromdate','$todate','$level');";

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

//<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<!-- <link rel="stylesheet" href="form.css" type="text/css"> -->
<div class="body-content">
  <div class="module">
    <h1>Workshop Attedned</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      Name of faculty:<br>
   <input type="text" name="workshopatt"><br>
    Worshop Name:<br>
   <input type="text" name="workshopname"><br>
   
    From Date:<br>
   <input type="date" name="fromdate"><br>
   To Date:<br>
  <input type="date" name="todate"><br>
  Level:<br><br>
   
<select name="level">
  <option value="State">State</option>
  <option value="National">National</option>
  <option value="International">International</option>
  
</select> <br>
 <input type="submit" value="Submit" name="Submit" class="btn btn-block btn-primary" />
      
      
    </form>
  </div>
</div>


</body>
</html>