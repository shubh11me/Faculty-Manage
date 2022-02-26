<?php
session_start();
// Create connection
$mysqli = new mysqli('localhost', 'root', '', 'accounts');
include './functions.php';

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
if (!isset($_SESSION['username'])) {
  echo '<script>window.location.href="login.php"</script>';
}

$ivorg = $_SESSION['user_id'];
$ivorgAdded = $_SESSION['user_id'];
echo "Connected successfully";
if ($_SERVER['REQUEST_METHOD']   == 'POST') {
  // success!
  if ($_SESSION['role'] == 'admin') {
    $ivorg = $mysqli->real_escape_string($_POST['ivorg']);
  }
  $Place = $mysqli->real_escape_string($_POST['Place']);
  $date = $mysqli->real_escape_string($_POST['fromdate']);
  $level = $mysqli->real_escape_string($_POST['level']);
  $description = $mysqli->real_escape_string($_POST['description']);

  $sql = "INSERT INTO `iv`(`ivorg`, `Place`, `date`,`level`,`description`,`iv_added_by`,`iv_user_id`) 
 VALUES('$ivorg','$Place','$date','$level','$description','$ivorgAdded','$ivorg');";

  if ($mysqli->query($sql) == true) {
    alert("success");
  } else {
    // failed 

    alert("unsuccess");
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
        <?php
        if ($_SESSION['role'] == 'admin') {
          $users_q = mysqli_query($mysqli, "select * from users");

        ?>
          <select name="ivorg" id="">

            <option value="def">Select Faculty</option>
            <?php
            while ($users = mysqli_fetch_assoc($users_q)) {
              echo "<option value='" . $users['user_id'] . "'>" . $users['username'] . "</option>";
            }
            ?>
          </select><br>
        <?php

        } ?><br>
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