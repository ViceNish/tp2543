<?php 
include_once 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Supreme Office Pro System</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/sopico.ico"/>

	<link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" type="text/css" href="body.css">
<style type="text/css">
	html {
    width:100%;
    height:100%;
    background:url(images/LOGOSOP.jpg) center center no-repeat;
    background-color: #080504;
    min-height:100%;
  }
  .btn1{
  	position: absolute;
  	right: 48%;
  	top: 75%;
  }
  .btn1:hover{
  background-image:linear-gradient(#fff,#1a1400);
  }
  .login{
    background-color: #ffc406;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }
</style>
</head>
<body>
<!-- <center>
	<a href="index.php">Home</a> |
	<a href="products.php">Products</a> | |
	<a href="customers.php">Customers</a> |
	<a href="staffs.php">Staffs</a> |
	<a href="orders.php">Orders</a> 
	<hr>

</center> -->
<?php include_once 'nav_bar.php'; ?>
<!-- <img src="images/LOGOSOP.jpg" width="40%" height="40%" style="display: block;margin-top: 10%;margin-bottom: 10%;margin-left: auto;margin-right: auto;"> -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
 <?php include_once 'footer.php'; ?>   
 <SCRIPT>

// alert(document.cookie);

</SCRIPT>
</body>
</html>