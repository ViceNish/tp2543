<?php
 
include_once 'database.php';
 
function uploadPhoto($file){
  $target_dir="products/";
  $target_file=$target_dir . basename($file["name"]);
  $imageFileType=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  /*
   * 0 = image file is a fake image
   * 1 = file is too large.
   * 2 = PNG & GIF files are allowed
   * 3 = Server error
   * 4 = No file were uploaded
   */

  if ($file['error']==4) {
    return 4;
  }

  // Check if image file is a actual image or fake image
  if (!getimagesize($file['tmp_name'])) {
    return 0;
  }

  //check file size
  if ($file["size"]>10000000) {
    return 1;
  }

  //Allow certain format file
  if ($imageFileType != "png" && $imageFileType !="gif") {
    return 2;
  }

  if (!move_uploaded_file($file["tmp_name"], $target_file)) {
    return 3;
  }

  return array('status' => 200, 'name' => basename($file["name"]));

}
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create

if (isset($_POST['create'])) {

 $flag = uploadPhoto($_FILES['fileToUpload']);

 if (isset($flag["status"])) {

   try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a174088_pt2(FLD_PRODUCT_ID,
        FLD_PRODUCT_NAME, FLD_PRICE, FLD_BRAND, FLD_TYPE,
        FLD_QUANTITY, FLD_COLOUR, FLD_IMAGE) VALUES(:pid, :name, :price, :brand,
        :type, :quantity, :colour, :image)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':colour', $colour, PDO::PARAM_INT);
      $stmt->bindParam(':image', $flag['name'], PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $colour = $_POST['colour'];
    // $image = $_POST['image'];
     
    $stmt->execute();

    $_SESSION['success'] = "Your product have successfully registered.";
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
 }else{
  if ($flag==0) {
    $_SESSION['error'] = "Please make sure the file uploaded is an image.";
    // echo '<script>alert("Error : Please make sure the file uploaded is an image."); </script>';
  }elseif ($flag==1) {
    $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
  }elseif ($flag==2) {
    $_SESSION['error'] = "Sorry, there was an error uploading your file.";
  }elseif ($flag==3) {
    $_SESSION['error'] = "Please upload an image.";
  }elseif ($flag==4) {
    $_SESSION['error'] = "Please upload an image.";
  }else{
    $_SESSION['error'] = "An unknown error has been occurred.";
  }
 }
 
 //header("LOCATION: {$_SERVER['REQUEST_URI']}");
  // header('LOCATION: products.php');
  // exit();
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a174088_pt2 SET 
        FLD_PRODUCT_NAME = :name, FLD_PRICE = :price, FLD_BRAND = :brand,
        FLD_TYPE = :type, FLD_QUANTITY = :quantity, FLD_COLOUR = :colour
        WHERE FLD_PRODUCT_ID = :oldpid LIMIT 1");
     
      // $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':colour', $colour, PDO::PARAM_INT);
     // $stmt->bindParam(':image', $flag['name'], PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    // $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $colour = $_POST['colour'];
    // $image = $_POST['image'];
    $oldpid = $_POST['oldpid'];
     
     $_SESSION['success'] = "Your product have successfully edited.";
    $stmt->execute();



    // Upload image
    $flag = uploadPhoto($_FILES['fileToUpload']);
    if (isset($flag['status'])) {
      $stmt = $conn->prepare("UPDATE tbl_products_a174088_pt2 SET FLD_IMAGE = :image
        WHERE FLD_PRODUCT_ID = :oldpid LIMIT 1");

      $stmt->bindParam(':image', $flag['name'] );
      $stmt->bindParam(':oldpid', $oldpid);

      $_SESSION['success'] = "Your product have successfully edited.";
      $stmt->execute();

      



    }elseif($flag == 4){
      if ($flag == 0)
          $_SESSION['error'] = "Please make sure the file uploaded is an image.";
      elseif ($flag == 1)
          $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
      elseif ($flag == 2)
          $_SESSION['error'] = "Sorry, only PNG & GIF files are allowed.";
      elseif ($flag == 3)
          $_SESSION['error'] = "Sorry, there was an error uploading your file.";
      else
          $_SESSION['error'] = "An unknown error has been occurred.";
    }
 
     
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }

  // if (isset($_SESSION['error']))
  //       header("LOCATION: {$_SERVER['REQUEST_URI']}");
  //   else
        // header("Location: products.php");

  //exit();
  $_SESSION['success'] = "Your product have successfully edited.";
  header("Location: products.php");

}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {

   $pid = $_GET['delete'];
   $stmt = $conn->prepare("SELECT FLD_IMAGE FROM tbl_products_a174088_pt2 WHERE FLD_PRODUCT_ID = :pid LIMIT 1");

   $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);

   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);

   $path = 'products/' . $result['FLD_IMAGE'];
   if (file_exists($path))
    unlink($path);

  $stmt = $conn->prepare("DELETE FROM tbl_products_a174088_pt2 WHERE FLD_PRODUCT_ID = :pid");
  $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
  $stmt->execute();

  header("Location: products.php");
}

catch(PDOException $e)
{
  echo "Error: " . $e->getMessage();
}
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a174088_pt2 WHERE FLD_PRODUCT_ID = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
 //next id
 $ppid = $conn->query("SELECT MAX(FLD_PRODUCT_ID) AS LASTID FROM tbl_products_a174088_pt2")->fetch()['LASTID'];
  $ppid = ltrim($ppid, 'F')+1; 
  $conn = null;
?>