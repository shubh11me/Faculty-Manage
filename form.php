<?php 
session_start();
$_SESSION['message']='';
// Create connection
$mysqli = new mysqli('localhost','root' ,'', 'accounts' );
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
echo "Connected successfully";
if($_SERVER['REQUEST_METHOD']   == 'POST')
{
    if ($_POST['password'] == $_POST['confirmpassword'])
      {
        // success!
             $username= $mysqli->real_escape_string($_POST['username']);
             $email= $mysqli->real_escape_string($_POST['email']);
             $password= $mysqli->real_escape_string($_POST['password']);
             $confirmpassword= md5($_POST['confirmpassword']);


               $sql= "INSERT INTO `users` (`username`, `email`, `password`, `confirmpassword`) VALUES('$username','$email','$password','$confirmpassword');";

              if($mysqli->query($sql)== true)
              {
                $_SESSION['message']="Successfully Inserted";
              }

             else {
                    // failed 

                    $_SESSION['message']="Unsuccessful";

                  }
}
     else {
       // failed 

         $_SESSION['message']="plz check password";
         }

}

?>


<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>