<?php
include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Supreme Office Pro System : Products</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <link rel="shortcut icon" type="image/x-icon" href="images/sopico.ico"/>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <link rel="stylesheet" type="text/css" href="body.css">
      <!-- <style>
        input[type="file"] {
            display: none;
        }
    </style> -->
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
    <div class="container-fluid">

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <?php if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger' role='alert'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
          }  elseif(isset($_SESSION['success'])){
            echo "<div class='alert alert-success' role='alert'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']);
          }
          ?>
          

          <div class="page-header">

            <h2>Add New Product</h2>
          </div>
          <div class="row">
            <form action="products.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <!-- Image -->
            <div class="col-md-4">
              <div class="thumbnail dark-1">
                <img src="products/<?php echo (isset($_GET['edit']) ? $editrow['FLD_IMAGE'] : '') ?>" onerror="this.onerror=null;this.src='products/noimage.png';" id="pphoto" alt="Product Image" style="width: 100%;height: 225px;">
                <div class="caption text-center">
                  <h3 id="productImageTitle" style="word-break: break-all;">Product Image</h3>
                  <p>
                    <label class="btn btn-primary">
                      <input type="file" accept="images/*" name="fileToUpload" id="inputImage" onchange="loadFile(event);"/>
                      <i class="fa fa-cloud-upload"></i>
                    </label>
                    <?php
                    /*if (isset($_GET['edit']) && $editrow['FLD_IMAGE'] != '') {
                      echo '<a href="#" class="btn btn-danger disabled" role="button">Delete</a>';
                    }*/
                    ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              
            <div class="form-group">
              <label for="pid" class="col-sm-3 control-label">Product ID</label>
              <div class="col-sm-9">
                <input name="pid" class="form-control" type="text" id="pid" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; else echo sprintf('F%02d',$ppid); ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="productname" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input name="name" class="form-control" type="text" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>" required> 
              </div>
            </div>
            <div class="form-group">
              <label for="productprice" class="col-sm-3 control-label">Price</label>
              <div class="col-sm-9">
                <input name="price" type="number" min="0.00" step="0.01" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>" required> 
              </div>
            </div>
            <div class="form-group">
              <label for="brand" class="col-sm-3 control-label">Brand</label>
              <div class="col-sm-9">
                <input type="text" name="brand" class="form-control" id="brand" placeholder="Brand" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_BRAND']; ?>" required> 
              </div>
            </div>
            <div class="form-group">
              <label for="type" class="col-sm-3 control-label">Type</label>
              <div class="col-sm-9">
                <select name="type" class="form-control" id="type" required>
                  <option value="">Please select</option>
                  <option value="Table" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Table") echo "selected"; ?>>Table</option>
                  <option value="Chair" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Chair") echo "selected"; ?>>Chair</option>
                  <option value="Drawer" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Drawer") echo "selected"; ?>>Drawer</option>
                  <option value="Shelf" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Shelf") echo "selected"; ?>>Shelf</option>
                </select> 
              </div>
            </div>
            <div class="form-group">
              <label for="qty" class="col-sm-3 control-label">Quantity</label>
              <div class="col-sm-9">
                <input name="quantity" type="number" min="1" step="1" class="form-control" id="qty" placeholder="Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_QUANTITY']; ?>" required> 
              </div>
            </div>
            <div class="form-group">
              <label for="colour" class="col-sm-3 control-label">Colour</label>
              <div class="col-sm-9">
                <input name="colour" type="text" class="form-control" id="colour" placeholder="Colour" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_COLOUR']; ?>" required> 
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <!-- <input type="hidden" name="image" value="noimage.png"> --> 
                <?php if (isset($_GET['edit'])) { ?>
                  <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
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
        </div>
      </div>


      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h2>Product List</h2>
          </div>
          <table class="table table-bordered">
            <tr>
              <th>Product ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Brand</th>
              <th>Type</th>
              <th>Quantity</th>
              <th>Colour</th>
              <th></th>
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
              $stmt = $conn->prepare("SELECT * FROM tbl_products_a174088_pt2 ORDER BY FLD_PRODUCT_ID ASC LIMIT $start_from,$per_page");
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
                  <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
                  <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
                  <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
                </td>
              </tr>
              <?php
            }
      // if (!isset($_GET['edit']) && $stmt->rowCount()>0){
      //   $no = ltrim($readrow['FLD_PRODUCT_ID'], 'F')+1;
      //   $no = 'F'.str_pad($no,2,"0",STR_PAD_LEFT);
      // }elseif(!isset($_GET['edit'])){
      //       $no = 'F'.str_pad(1,2,"0",STR_PAD_LEFT);
      // }
            $conn = null;
            ?>
    <!-- <script type="text/javascript">
        if("" !== null && "" !== ""){
          var pid = document.getElementById("pid");
          pid.value = ";
        }
      </script> -->

    </table>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
    <nav>
      <ul class="pagination">
        <?php
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a174088_pt2");
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
          <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
        }
        for ($i=1; $i<=$total_pages; $i++)
          if ($i == $page)
            echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
          else
            echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>


  <!-- </center> -->
</div>

<?php include_once 'footer.php'; ?> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="application/javascript">
  var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
      var output = document.getElementById('pphoto');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
    // <?php if (isset($_GET['edit'])) { ?>
    //   document.getElementById('productImageTitle').innerText = event.target.files[1]['name'];
    // <?php } else { ?>
    //   document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
    // <?php } ?>

    document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
  };
</script>


</body>
</html>