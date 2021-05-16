<!DOCTYPE html>
<html>
<head>
  <title>Supreme Office Pro System : Orders</title>
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

     input,
    textarea,
    select {

      width: 300px;
      box-sizing: border-box;

      /* Match form field borders */
      border: 1px solid #999;
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
      <form action="orders.php" method="post">
        <table>
          <tr>
            <label for="oid">Order ID</label>
            <input type="text" name="oid" disabled> <br>
          </tr>
          <br>
          <tr>
            <label for="orderdate">Order Date</label>
            <input type="date" name="orderdate" disabled> <br>
          </tr>
          <br>
          <tr>
            <label for="sid">Staff</label>
            <select name="sid">
              <option value="">----Select----</option>
              <option value="S01">John Sebastian</option>
              <option value="S02">Sarah Elizabeth</option>
              <option value="S03">Vice Malone</option>
            </select> <br>
          </tr>
          <br>
          <tr>
            <label for="cid">Customer</label>
            <select name="cid">
              <option value="">----Select----</option>
              <option value="C01">John Wick</option>
              <option value="C02">Snoop Stan</option>
              <option value="C03">Amanda Cerny</option>
            </select> <br>
          </tr>
          <br>
        </table>
        <hr style="margin: 10px 0;">
        <div style="margin: auto; display: flex; align-items: center; justify-content: center;">
          <button type="submit" name="addorder">Add Order</button>
          <button type="reset" style="margin-left: 2em">Clear</button>  
        </div>
      </form>
    </div>
    <hr style="margin: 50px 0;">
    <div style="display: flex; align-items: center; justify-content: center;">
      <table border="1" style="width: 40%">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Staff</th>
            <th>Customer</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>P01</td>
            <td>18-01-2021</td>
            <td>S01</td>
            <td>C01</td>
            <td>
              <a href="orders_details.php">Details</a> |
              <a href="products.php">Edit</a> |
              <a href="products.php">Delete</a> 
            </td>
          </tr>
        </tbody>
      </table>
    </div>

</body>
</html>