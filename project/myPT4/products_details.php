<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Supreme Office Pro System : Products Details</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/sopico.ico"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" type="text/css" href="css/body.css"> 
</head>
<body>
  <!-- <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr> -->

    <?php include_once 'nav_bar.php'; ?>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a174088_pt2 WHERE FLD_PRODUCT_ID = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>


  <div class="container-fluid">
  <div class="row" style="padding-top: 20px;">
    <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center" style="background-color: #808080;">
      <?php if ($readrow['FLD_IMAGE'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="products/<?php echo $readrow['FLD_IMAGE'] ?>" class="img-responsive" width="100%" height="100%">
      <?php } ?>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4">
      <div class="panel" style="background-color: #696969;">
      <div class="panel-heading"><strong style="color: #ffc406;">Product Details</strong></div>
      <div class="panel-body"style="background-color: #808080;">
          Below are specifications of the product.
      </div>
      <table class="table " style="background-color: #7d7d7d;">
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
          <td><?php echo $readrow['FLD_PRODUCT_ID'] ?></td>
        </tr>
        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $readrow['FLD_PRODUCT_NAME'] ?></td>
        </tr>
        <tr>
          <td><strong>Price</strong></td>
          <td>RM <?php echo $readrow['FLD_PRICE'] ?></td>
        </tr>
        <tr>
          <td><strong>Brand</strong></td>
          <td><?php echo $readrow['FLD_BRAND'] ?></td>
        </tr>
        <tr>
          <td><strong>Type</strong></td>
          <td><?php echo $readrow['FLD_TYPE'] ?></td>
        </tr>
        <tr>
          <td><strong>Quantity</strong></td>
          <td><?php echo $readrow['FLD_QUANTITY'] ?></td>
        </tr>
        <tr>
          <td><strong>Colour</strong></td>
          <td><?php echo $readrow['FLD_COLOUR'] ?></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>


    <!-- Product ID: <?php echo $readrow['FLD_PRODUCT_ID'] ?> <br>
    Name: <?php echo $readrow['FLD_PRODUCT_NAME'] ?> <br>
    Price: RM <?php echo $readrow['FLD_PRICE'] ?> <br>
    Brand: <?php echo $readrow['FLD_BRAND'] ?> <br>
    Type: <?php echo $readrow['FLD_TYPE'] ?> <br>
    Quantity: <?php echo $readrow['FLD_QUANTITY'] ?> <br>
    Colour: <?php echo $readrow['FLD_COLOUR'] ?> <br>
    <img src="products/<?php echo $readrow['FLD_IMAGE'] ?>" width="30%" height="30%"> -->
  <!-- </center> -->


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


 <?php include_once 'footer.php'; ?> 
</body>
</html>
