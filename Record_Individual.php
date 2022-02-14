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
   
 
$result = mysqli_query($mysqli,"SELECT * FROM npaperpublication WHERE `Author1` = '".$_SESSION['username']."'");

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



$result = mysqli_query($mysqli,"SELECT * FROM inpaperpublication WHERE `Author1` = '".$_SESSION['username']."'");

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



/*function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  // file name for download
  $filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $flag = false;
  foreach( $result as  $row ) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\n";
      $flag = true;
    }
    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\n";
  }

  exit;

*/




mysqli_close($mysqli);


?>


<html> 
<body>

<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    
    <form class="form" action="d2.php" method="post" enctype="multipart/form-data" autocomplete="off">
     
       <a href="d4.php">download</a>
      
    </form>
  </div>
</div>


</body>
</html>