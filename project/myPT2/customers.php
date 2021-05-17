<?php
  include_once 'customers_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Supreme Office Pro System : Customers</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/sopico.ico"/>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="customers.php" method="post">
      Customer ID
      <input name="cid" type="text" id="cid" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_ID']; ?>" readonly> <br>
      Customer Name
      <input name="cname" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_NAME']; ?>" required> <br>
      Phone Number
      <input name="phone" type="text" pattern="^601[0-9]{1}([0-9]{8}|[0-9]{7})" placeholder="#60123456789" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_PHONE']; ?>" required> <br>
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldcid" value="<?php echo $editrow['FLD_CUSTOMER_ID']; ?>">
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <h2>Customer List</h2>
    <table border="1">
      <tr>
        <td>Customer ID</td>
        <td>Customer Name</td>
        <td>Phone Number</td>
        <td></td>
      </tr>
      <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a174088_pt2 ORDER BY FLD_CUSTOMER_ID ASC");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['FLD_CUSTOMER_ID']; ?></td>
        <td><?php echo $readrow['FLD_CUSTOMER_NAME']; ?></td>
        <td><?php echo $readrow['FLD_CUSTOMER_PHONE']; ?></td>
        <td>
          <a href="customers.php?edit=<?php echo $readrow['FLD_CUSTOMER_ID']; ?>">Edit</a>
          <a href="customers.php?delete=<?php echo $readrow['FLD_CUSTOMER_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      if (!isset($_GET['edit']) && $stmt->rowCount()>0){
        $no = ltrim($readrow['FLD_CUSTOMER_ID'], 'C')+1;
        $no = 'C'.str_pad($no,2,"0",STR_PAD_LEFT);
      }elseif(!isset($_GET['edit'])){
            $no = 'C'.str_pad(1,2,"0",STR_PAD_LEFT);
      }
      $conn = null;
      ?>
      <script type="text/javascript">
        if("<?php echo $no ?>" !== null && "<?php echo $no ?>" !== ""){
          var pid = document.getElementById("cid");
          pid.value = "<?php echo $no ?>";
        }
      </script>
    </table>
  </center>
</body>
</html>