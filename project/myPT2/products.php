<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Supreme Office Pro System : Products</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="products.php" method="post">
      Product ID
      <input name="pid" type="text" id="pid" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; ?>" readonly> <br>
      Name
      <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>" required> <br>
      Price
      <input name="price" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>" required> <br>
      Brand
      <input type="text" name="brand" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_BRAND']; ?>" required> <br>
      Type
      <select name="type">
        <option value="Table" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Table") echo "selected"; ?>>Table</option>
        <option value="Chair" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Chair") echo "selected"; ?>>Chair</option>
        <option value="Drawer" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Drawer") echo "selected"; ?>>Drawer</option>
        <option value="Shelf" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Shelf") echo "selected"; ?>>Shelf</option>
      </select> <br>
      Quantity
      <input name="quantity" type="number" min="1" step="1" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_QUANTITY']; ?>"> <br>
      Colour
      <input name="colour" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_COLOUR']; ?>"> <br>
      <!-- image -->
      <input type="hidden" name="image" value="noimage.png"> <br>
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>

    <hr>
    <h2>Product List</h2>
    <table border="1">
      <tr>
        <td>Product ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Brand</td>
        <td>Type</td>
        <td>Quantity</td>
        <td>Colour</td>
        <td></td>
      </tr>
      <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a174088_pt2 ORDER BY FLD_PRODUCT_ID ASC");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?> 
      <tr>
        <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
        <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
        <td><?php echo 'RM '.$readrow['FLD_PRICE']; ?></td>
        <td><?php echo $readrow['FLD_BRAND']; ?></td>
        <td><?php echo $readrow['FLD_TYPE']; ?></td>
        <td><?php echo $readrow['FLD_QUANTITY']; ?></td>
        <td><?php echo $readrow['FLD_COLOUR']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Details</a>
          <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      if (!isset($_GET['edit']) && $stmt->rowCount()>0){
        $no = ltrim($readrow['FLD_PRODUCT_ID'], 'F')+1;
        $no = 'F'.str_pad($no,2,"0",STR_PAD_LEFT);
      }elseif(!isset($_GET['edit'])){
            $no = 'F'.str_pad(1,2,"0",STR_PAD_LEFT);
      }
      $conn = null;
      ?>
    <script type="text/javascript">
        if("<?php echo $no ?>" !== null && "<?php echo $no ?>" !== ""){
          var pid = document.getElementById("pid");
          pid.value = "<?php echo $no ?>";
        }
      </script>

    </table>
  </center>
</body>
</html>