<?php
 
if (isset($_POST['add_form'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      // Prepare the SQL statement
      $stmt = $conn->prepare("INSERT INTO myguestbook(user, email, postdate, posttime, find, frontpage, form, UI, comment) VALUES (:user, :email, :pdate, :ptime, :find, :frontpage, :form, :UI, :comment )");
     
      // Bind the parameters
      $stmt->bindParam(':user', $name, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':pdate', $postdate, PDO::PARAM_STR);
      $stmt->bindParam(':ptime', $posttime, PDO::PARAM_STR);
      $stmt->bindParam(':find', $find, PDO::PARAM_STR);
      $stmt->bindParam(':frontpage', $frontpage, PDO::PARAM_STR);
      $stmt->bindParam(':form', $form, PDO::PARAM_STR);
      $stmt->bindParam(':UI', $UI, PDO::PARAM_STR);
      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
      
       
      // Give value to the variables
      $name = $_POST['name'];
      $email = $_POST['email'];
      $postdate = date("Y-m-d",time());
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $posttime = date("H:i:s",time());
      $find = $_POST['find'];
      $frontpage = (isset($_POST['frontpage']) ? 'Front page':'');
      $form = (isset($_POST['form']) ? 'Form':'');
      $UI = (isset($_POST['UI']) ? 'User Interface':'');
      $comment = $_POST['comment'];
      
    $stmt->execute();
 
      //echo "New records created successfully";
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