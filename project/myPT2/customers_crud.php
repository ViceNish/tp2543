<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_customers_a174088_pt2(FLD_CUSTOMER_ID, FLD_CUSTOMER_NAME, FLD_CUSTOMER_PHONE) VALUES(:cid, :cname, :phone)");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':cname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
       
    $cid = $_POST['cid'];
    $fname = $_POST['cname'];
    $phone = $_POST['phone'];
       
    $stmt->execute();
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_customers_a174088_pt2 SET FLD_CUSTOMER_ID = :cid,
      FLD_CUSTOMER_NAME = :cname, FLD_CUSTOMER_PHONE = :phone
      WHERE FLD_CUSTOMER_ID = :oldcid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':cname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);
       
    $cid = $_POST['cid'];
    $fname = $_POST['cname'];
    $phone = $_POST['phone'];
    $oldcid = $_POST['oldcid'];
       
    $stmt->execute();
 
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_customers_a174088_pt2 WHERE FLD_CUSTOMER_ID = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_customers_a174088_pt2 WHERE FLD_CUSTOMER_ID = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $ccid = $conn->query("SELECT MAX(FLD_CUSTOMER_ID) AS LASTID FROM tbl_customers_a174088_pt2")->fetch()['LASTID'];
  $ccid = ltrim($ccid, 'C')+1;
  $conn = null;
 
?>