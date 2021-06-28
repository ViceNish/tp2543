<?php

include_once 'database.php';

function uploadPhoto($file,$id){
  $target_dir="products/";
  $target_file2=$target_dir . basename($file["name"]);
  //$namefile= basename($file["name"]);// . explode(".", basename($file["name"][0]));
  // $nanamefile = explode(".", $namefile["name"][0]);
  //$file_direct=$target_dir . $namefile;
  $imageFileType=strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
  // $newfilename = "{$namefile}-".microtime().".{$imageFileType}";
  $newfilename = "{$id}.{$imageFileType}";
  $target_file = $target_dir . $newfilename;
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

  

  // return array('status' => 200, 'name' => basename($file["name"]));
  return array('status' => 200, 'name' => $newfilename,'ext' => $imageFileType);

}
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create

if (isset($_POST['create'])) {

 $flag = uploadPhoto($_FILES['fileToUpload'],$_POST['pid']);

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

// // Rename file after upload
 //  $id = $conn->query("SELECT MAX(FLD_PRODUCT_ID) AS LASTID FROM tbl_products_a174088_pt2")->fetch()['LASTID'];
 // rename("products/{$flag['name']}", "products/{$id}.{$flag['ext']}");
    

    $_SESSION['success'] = "Your product have successfully registered.";
  }

  catch(PDOException $e)
  {
   $_SESSION['error'] = $e->getMessage();
 }
}else{
  if ($flag==0) {
    $_SESSION['error'] = "Please make sure the file uploaded is an image.";
    // echo '<script>alert("Error : Please make sure the file uploaded is an image."); </script>';
  }elseif ($flag==1) {
    $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
  }elseif ($flag==2) {
    $_SESSION['error'] = "Sorry, only PNG & GIF files are allowed.";
  }elseif ($flag==3) {
    $_SESSION['error'] = "Sorry, there was an error uploading your file.";
  }elseif ($flag==4) {
    $_SESSION['error'] = "Please upload an image.";
  }else{
    $_SESSION['error'] = "An unknown error has been occurred.";
  }
}

header("LOCATION: {$_SERVER['REQUEST_URI']}");
  // header('LOCATION: products.php');
exit();
}

//Update
if (isset($_POST['update'])) {

  try {

    //   $stmt = $conn->prepare("UPDATE tbl_products_a174088_pt2 SET 
    //     FLD_PRODUCT_NAME = :name, FLD_PRICE = :price, FLD_BRAND = :brand,
    //     FLD_TYPE = :type, FLD_QUANTITY = :quantity, FLD_COLOUR = :colour
    //     WHERE FLD_PRODUCT_ID = :oldpid LIMIT 1");

    //   // $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    //   $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    //   $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    //   $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
    //   $stmt->bindParam(':type', $type, PDO::PARAM_STR);
    //   $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    //   $stmt->bindParam(':colour', $colour, PDO::PARAM_INT);
    //  // $stmt->bindParam(':image', $flag['name'], PDO::PARAM_STR);
    //   $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);

    // // $pid = $_POST['pid'];
    // $name = $_POST['name'];
    // $price = $_POST['price'];
    // $brand =  $_POST['brand'];
    // $type = $_POST['type'];
    // $quantity = $_POST['quantity'];
    // $colour = $_POST['colour'];
    // // $image = $_POST['image'];
    // $oldpid = $_POST['oldpid'];

    // $stmt->execute();
    // $_SESSION['success'] = "Your product have successfully edited.";


    // Upload image
    $flag = uploadPhoto($_FILES['fileToUpload'],$_POST['pid']);
    if (isset($flag['status']) || $flag==4) {
      // $stmt = $conn->prepare("UPDATE tbl_products_a174088_pt2 SET FLD_IMAGE = :image
      //   WHERE FLD_PRODUCT_ID = :oldpid LIMIT 1");

      $sql = "UPDATE tbl_products_a174088_pt2 SET 
      FLD_PRODUCT_NAME = :name, FLD_PRICE = :price, FLD_BRAND = :brand,
      FLD_TYPE = :type, FLD_QUANTITY = :quantity, FLD_COLOUR = :colour";

      if (isset($flag['status'])) {
        $sql .= ", FLD_IMAGE = :image";
      }

      $sql .= " WHERE FLD_PRODUCT_ID = :oldpid LIMIT 1";

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':colour', $colour, PDO::PARAM_INT);

      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
      $name = $_POST['name'];
      $price = $_POST['price'];
      $brand =  $_POST['brand'];
      $type = $_POST['type'];
      $quantity = $_POST['quantity'];
      $colour = $_POST['colour'];

      $oldpid = $_POST['oldpid'];

      if (isset($flag['status'])) {
        $stmt->bindParam(':image', $flag['name']);
      }

   //    $pid = $_GET['update'];
   // $stmt = $conn->prepare("SELECT FLD_IMAGE FROM tbl_products_a174088_pt2 WHERE FLD_PRODUCT_ID = :pid LIMIT 1");

   // $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);

   // $stmt->execute();

   // $result = $stmt->fetch(PDO::FETCH_ASSOC);

   // $path = 'products/' . $result['FLD_IMAGE'];
   // if (file_exists($path))
   //  unlink($path);

      $stmt->execute();
      $_SESSION['success'] = "Your product have successfully edited.";
      // $stmt->bindParam(':image', $flag['name'] );
      // $stmt->bindParam(':oldpid', $oldpid);
      // $stmt->execute();

      // $_SESSION['success'] = "Your product have successfully edited.";



    }else{
      // unset($_SESSION['success']);
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
   $_SESSION['error']=   $e->getMessage();
 }

 if (isset($_SESSION['error']))
  header("LOCATION: {$_SERVER['REQUEST_URI']}");
else
  header("Location: products.php");

  //exit();
  // $_SESSION['success'] = "Your product have successfully edited.";
  // header("Location: products.php");
exit();
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