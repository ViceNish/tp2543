<?php
  include_once 'staffs_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Supreme Office Pro System : Staffs</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="staffs.php" method="post">
      Staff ID
      <input name="sid" type="text" id="sid" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_ID']; ?>"> <br>
      Staff Name
      <input name="sname" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_NAME']; ?>"> <br>
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['FLD_STAFF_ID']; ?>">
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <h2>Staff List</h2>
    <table border="1">
      <tr>
        <td>Staff ID</td>
        <td>Staff Name</td>
        <td></td>
      </tr>
      <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a174088_pt2 ORDER BY FLD_STAFF_ID ASC");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['FLD_STAFF_ID']; ?></td>
        <td><?php echo $readrow['FLD_STAFF_NAME']; ?></td>
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['FLD_STAFF_ID']; ?>">Edit</a>
          <a href="staffs.php?delete=<?php echo $readrow['FLD_STAFF_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      if (!isset($_GET['edit']) && $stmt->rowCount()>0){
        $no = ltrim($readrow['FLD_STAFF_ID'], 'S')+1;
        $no = 'S'.str_pad($no,2,"0",STR_PAD_LEFT);
      }elseif(!isset($_GET['edit'])){
            $no = 'S'.str_pad(1,2,"0",STR_PAD_LEFT);
      }
      $conn = null;
      ?>
      <script type="text/javascript">
        if("<?php echo $no ?>" !== null && "<?php echo $no ?>" !== ""){
          var pid = document.getElementById("sid");
          pid.value = "<?php echo $no ?>";
        }
      </script>
    </table>
  </center>
</body>
</html>