<?php
  include_once 'staffs_crud.php';

  if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Supreme Office Pro System : Staffs</title>
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
    if (isset($_SESSION['user']) && $_SESSION['user']['FLD_ROLE'] == 'admin') {
      ?>

    <div class="container-fluid">
      <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Add New Staff</h2>
      </div>
    <form action="staffs.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="sid" class="col-sm-3 control-label">Staff ID</label>
          <div class="col-sm-9">
      <input name="sid" type="text" id="sid" class="form-control" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_ID']; else echo sprintf('S%02d',$ssid); ?>" readonly> 
      </div>
        </div>
      <div class="form-group">
          <label for="sname" class="col-sm-3 control-label">Staff Name</label>
          <div class="col-sm-9">
      <input name="sname" type="text" class="form-control" id="sname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_NAME']; ?>"> 
      </div>
        </div>
        <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input name="email" type="text" class="form-control" id="email" placeholder="Staff Email" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_EMAIL']; ?>"> 
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <input name="password" type="text" class="form-control" id="password" placeholder="Staff Password" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PASS']; ?>"> 
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Role</label>
                <div class="col-sm-9">
                  <select name="role" class="form-control" id="role" required>
                    <option value="">Please select</option>
                    <option value="Admin" <?php if(isset($_GET['edit'])) if($editrow['FLD_ROLE']=="Admin") echo "selected"; ?>>Admin</option>
                    <option value="Staff" <?php if(isset($_GET['edit'])) if($editrow['FLD_ROLE']=="Staff") echo "selected"; ?>>Staff</option>
                  </select> 
                </div>
              </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['FLD_STAFF_ID']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <?php } ?>
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
    </div>
  </div>
    </form>
  </div>
</div>

<?php } ?>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Staff List</h2>
      </div>
    <table class="table table-bordered">
      <tr>
        <th>Staff ID</th>
        <th>Staff Name</th>
        <?php
    if (isset($_SESSION['user']) && $_SESSION['user']['FLD_ROLE'] == 'admin') {
      ?>
        <th></th>
      <?php } ?>
      </tr>
      <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a174088_pt2 ORDER BY FLD_STAFF_ID ASC LIMIT $start_from,$per_page");
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
        <?php
    if (isset($_SESSION['user']) && $_SESSION['user']['FLD_ROLE'] == 'admin') {
      ?>
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['FLD_STAFF_ID']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="staffs.php?delete=<?php echo $readrow['FLD_STAFF_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      <?php } ?>
      </tr>
      <?php
      }
      // if (!isset($_GET['edit']) && $stmt->rowCount()>0){
      //   $no = ltrim($readrow['FLD_STAFF_ID'], 'S')+1;
      //   $no = 'S'.str_pad($no,2,"0",STR_PAD_LEFT);
      // }elseif(!isset($_GET['edit'])){
      //       $no = 'S'.str_pad(1,2,"0",STR_PAD_LEFT);
      // }
      $conn = null;
      ?>
      <!-- <script type="text/javascript">
        if("" !== null && "" !== ""){
          var pid = document.getElementById("sid");
          pid.value = "";
        }
      </script> -->
    </table>
  </div>
</div>
  <!-- </center> -->

<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a174088_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>

</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


 <?php include_once 'footer.php'; ?> 
</body>
</html>