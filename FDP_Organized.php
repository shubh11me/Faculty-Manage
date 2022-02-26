<?php
session_start();
echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}

$FDPOrganizedAdded = $_SESSION['user_id'];
$FDPOrganizedBy=$_SESSION['user_id'];
include './functions.php';
// Create connection
$mysqli = new mysqli('localhost', 'root', '', 'accounts');
// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";
if ($_SERVER['REQUEST_METHOD']   == 'POST') {
  // success!
  if ($_SESSION['role'] == 'admin') {

    $FDPOrganizedBy = $mysqli->real_escape_string($_POST['FDPOrganizedBy']);
  }

  # code...
  $fdpname = $mysqli->real_escape_string($_POST['fdpname']);

  $fromdate = $mysqli->real_escape_string($_POST['fromdate']);

  $todate = $mysqli->real_escape_string($_POST['todate']);
  $level = $mysqli->real_escape_string($_POST['level']);


  $sql = "INSERT INTO `fdporg`(`fdpname`, `fromdate`, `todate`, `level`,`fdporg_user_id`, `fdporg_added_by`) 
  VALUES('$fdpname','$fromdate','$todate','$level','$FDPOrganizedBy','$FDPOrganizedAdded');";

  if ($mysqli->query($sql) == true) {
    $last_id = $mysqli->insert_id;

    genID($last_id, "fdporg", "fdporg_id", "fdporg");
alert("success");
  } else {
    // failed 

    alert("unsuccessful");
  }
}

?>


<html>

<body>
  //
  <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="form.css" type="text/css">
  <div class="body-content">
    <div class="module">
      <h1>FDP Organized By</h1>
      <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"></div>
        <?php
        if ($_SESSION['role'] == 'admin') {
          $users_q = mysqli_query($mysqli, "select * from users");

        ?>
          Name of faculty:<br>
          <select name="FDPOrganizedBy" id="">

            <option value="def">Select Faculty</option>
               <?php
while ($users=mysqli_fetch_assoc($users_q)) {
echo "<option value='".$users['user_id']."'>".$users['username']."</option>";
}
               ?>
          </select>
          <br>
        <?php
        }
        ?>

        FDP Name:<br>
        <input type="text" name="fdpname"><br>

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