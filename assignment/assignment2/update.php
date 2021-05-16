<?php
 
if (isset($_POST['edit_form'])) {
 
  include "db.php";
 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
       //sql statement
    $stmt = $conn->prepare("UPDATE myguestbook SET user = :name, email = :email, comment = :comment, find = :find, frontpage = :frontpage, form = :form, UI = :UI WHERE id = :record_id");
 
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':find', $find, PDO::PARAM_STR);
    $stmt->bindParam(':frontpage', $frontpage, PDO::PARAM_STR);
    $stmt->bindParam(':form', $form, PDO::PARAM_STR);
    $stmt->bindParam(':UI', $UI, PDO::PARAM_STR);


    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    $find = $_POST['find'];
    $frontpage = $_POST['frontpage'];
    $form = $_POST['form'];
    $UI = $_POST['UI'];
 
    $stmt->execute();
     
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