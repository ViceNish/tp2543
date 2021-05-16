<?php
 
include "db.php";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    $stmt = $conn->prepare("SELECT * FROM myguestbook");
    $stmt->execute();
 
    $result = $stmt->fetchAll();
 
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
 
$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
<body>
 <div>
   <center><a href="index.php">Menu</a></center>
 </div>
 <hr>
<ol>
<?php
foreach($result as $row) {
  $arr = array();
  if ($row['frontpage']) 
    array_push($arr, "Front page");
  if ($row['form']) 
    array_push($arr, "Form");
  if ($row['UI']) 
    array_push($arr, "User Interface");

  
  echo "<li>";
  echo "Name : ".$row["user"]."<br>";
  echo "Email : ".$row["email"]."<br>";
  echo "Date : ".$row["postdate"]."<br>";
  echo "Time : ".$row["posttime"]."<br>";
  echo "How did you find me : ".$row["find"]."<br>";
  //echo "I like your : ".$row["frontpage"]." ".$row["form"]." ".$row["UI"]."<br>";
  echo "I like your : ";
  echo join(", ", $arr)."<br>";
  echo "Comments : ".$row["comment"]."<br>";
  echo "Action : <a href=edit.php?id=".$row["id"].">Edit</a> / <a href=delete.php?id=".$row["id"].">Delete</a>";
  echo "</li>";
  echo "<hr>";
}
?>
</ol>
 
</body>
</html>