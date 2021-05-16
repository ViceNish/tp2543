<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("SELECT picture FROM guestbookw6 WHERE id= :id LIMIT 1");
      $stmt->bindParam(':id',$id,PDO::PARAM_INT);
      $id = $_GET['id'];
      $stmt->execute();
       
      $result = $stmt->fetch(); 
      $stmt = $conn->prepare("DELETE FROM guestbookw6 WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();

      unlink($result['picture']);
 
      header("Location:list.php");
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
?>