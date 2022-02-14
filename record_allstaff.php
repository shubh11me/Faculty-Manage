<?php 
session_start();
$_SESSION['message']='';
// Create connection
$mysqli = new mysqli('localhost','root' ,'','accounts' );
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
//echo "Connected successfully";

 //if( $_SESSION['username']= "Vrushali Kulkarni")


$username= mysqli_query($mysqli,"SELECT * FROM users ");
if( ($_SESSION['username']) =='Vrushali Kulkarni')
{
 

             $result = mysqli_query($mysqli,"SELECT * FROM npaperpublication");

   echo "<table border='1'>
     <caption>National Publication's</caption>
      <tr>
    <th>Author1</th>
          <th>Author2</th>

         <th>PaperTitle</th>
           <th>JournalName</th>
         <th>DOP</th>
       <th>Volume</th>
       <th>Pagenos</th>
        <th>DOI</th>

        </tr>";

     while($row = mysqli_fetch_array($result))
     {
      echo "<tr>";
       echo "<td>" . $row['Author1'] . "</td>";
     echo "<td>" . $row['Author2'] . "</td>";
        echo "<td>" . $row['PaperTitle'] . "</td>";
       echo "<td>" . $row['JournalName'] . "</td>";
     echo "<td>" . $row['DOP'] . "</td>";
      echo "<td>" . $row['Volume'] . "</td>";
         echo "<td>" . $row['Pagenos'] . "</td>";
        echo "<td>" . $row['DOI'] . "</td>";

       echo "</tr>";
     }
        echo "</table>";



       $result = mysqli_query($mysqli,"SELECT * FROM inpaperpublication ");

              echo "<table border='1'>
               <caption>International Publication's</caption>
                      <tr>
                           <th>Author1</th>
                           <th>Author2</th>

                           <th>PaperTitle</th>
                          <th>JournalName</th>
                             <th>DOP</th>
                       <th>Volume</th>
                            <th>Pagenos</th>
                            <th>DOI</th>

                               </tr>";

                  while($row = mysqli_fetch_array($result))
                   {
                           echo "<tr>";
                            echo "<td>" . $row['Author1'] . "</td>";
                               echo "<td>" . $row['Author2'] . "</td>";
                                 echo "<td>" . $row['PaperTitle'] . "</td>";
                           echo "<td>" . $row['JournalName'] . "</td>";
                           echo "<td>" . $row['DOP'] . "</td>";
                              echo "<td>" . $row['Volume'] . "</td>";
                           echo "<td>" . $row['Pagenos'] . "</td>";
                            echo "<td>" . $row['DOI'] . "</td>";

                           echo "</tr>";
                    }
                         echo "</table>";
         

             
        
}
 else {echo "You don't Have Permission!";

    

         
        }

mysqli_close($mysqli);


?>


<html> 
<body>

<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    
    <form class="form" action="ad.php" method="post" enctype="multipart/form-data" autocomplete="off">
     
      
      
    </form>
  </div>
</div>


</body>
</html>