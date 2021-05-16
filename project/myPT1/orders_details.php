<!DOCTYPE html>
<html>
<head>
  <title>Supreme Office Pro System : Order Details</title>
  <style>
    form {
      /* Center the form on the page */
      margin: 0 auto;
      width: 500px;
      /* Form outline */
      padding: 1em;
      border: 1px solid #CCC;
      border-radius: 1em;
    }

    label {
      /* Uniform size & alignment */
      display: inline-block;
      width: 160px;
      text-align: left;
    }
  </style>
</head>
<body>
  <br>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr style="margin: 20px 0;">
    <div style="margin: 0 10%">
      <form action="orders_details.php" method="post">
        <table>
          <tr>
            <label>Order ID</label>
            <label class="oid">P01</label> <br>
          </tr> <br>
          <tr>
            <label>Order Date</label>
            <label class="odate">18-01-2021</label> <br>
          </tr> <br>
          <tr>
            <label>Staff</label>
            <label class="S01">John Sebastian</label> <br>
          </tr> <br>
          <tr>
            <label>Customer</label>
            <label class="C01">John Wick</label> 
          </tr>
        </table>
      </form>
    </div>
    <hr style="margin: 20px 0;">

    <div style="margin: 0 10%">
      <form action="orders_details.php" method="post">
      <table>
        <tr>
          <label style="text-align: right; margin: 10px">Product</label>
            <select name="pid">
              <option >----Select----</option>
              <option value="F01">Home Office Chair Ergonomic Desk Chair, Pink</option>
              <option value="F02">Drawer Dresser Organizer Fabric Storage, Black</option>
              <option value="F03">Office Desktop Bookshelf (Espresso)</option>
            </select> <br>

          <label style="text-align: right; margin: 10px">Quantiy</label>
            <input type="number" name="qty">
              <br>
         <button type="submit" name="addproduct" style="margin: 10px">Add Product</button>
         <button type="reset" style="margin: 10px">Clear</button>
       </tr>
      </table>
    </form>
    </div>
    
    <hr style="margin: 20px 0;">
    <table border="1">
      <tr>
        <td>Order Detail ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>
      <tr>
        <td>OD01</td>
        <td>Home Office Chair Ergonomic Desk Chair, Pink</td>
        <td>1</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>OD02</td>
        <td>Drawer Dresser Organizer Fabric Storage, Black</td>
        <td>2</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
    </table>
    <hr style="margin: 20px 0;">
    <a href="invoice.php" target="_blank">Generate Invoice</a>
  </center>
</body>
</html>