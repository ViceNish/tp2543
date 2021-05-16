<!DOCTYPE html>
<html>
<head>
	<title>Supreme Office Pro System : Customers</title>
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
    	<form action="customers.php" method="post">

    		<table>
    			<tr>
    				<label for="cid">Customer ID</label>
    				<input type="text" name="cid"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="custname">Customer Name</label>
    				<input type="text" name="custname"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="custno">Customer Phone</label>
    				<input type="number" name="custno"> <br>
    			</tr>
    			<br>
    		</table>
    		<hr style="margin: 10px 0;">
    		<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
    			<button type="submit" name="addcustomer">Add Customer</button>
    			<button type="reset" style="margin-left: 2em">Clear</button>	
    		</div>
    	</form>
    </div>
    <hr style="margin: 50px 0;">
    <div style="display: flex; align-items: center; justify-content: center;">
    	<table border="1" style="width: 50%">
    		<thead>
    			<tr>
    				<th>Customer ID</th>
    				<th>Customer Name</th>
    				<th>Customer Phone</th>
    				<th></th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>C01</td>
    				<td>John Wick</td>
    				<td>+60113579778</td>
    				<td>
          <a href="customers.php">Edit</a> |
          <a href="customers.php">Delete</a> 
    				</td>
    			</tr>
    			
          <tr>
            <td>C02</td>
            <td>Snoop Stan</td>
            <td>+60154654767</td>
            <td>
              <a href="customers.php">Edit</a> |
              <a href="customers.php">Delete</a> 
            </td>
          </tr>
    		</tbody>
    	</table>
    </div>
	</center>

</body>
</html>