<!DOCTYPE html>
<html>
<head>
	<title>Supreme Office Pro System : Staff</title>
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
    	<form action="staffs.php" method="post">

    		<table>
    			<tr>
    				<label for="sid">Staff ID</label>
    				<input type="text" name="sid"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="staffname">Staff Name</label>
    				<input type="text" name="staffname"> <br>
    			</tr>
    			<br>
    		</table>
    		<hr style="margin: 10px 0;">
    		<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
    			<button type="submit" name="addstaff">Add Staff</button>
    			<button type="reset" style="margin-left: 2em">Clear</button>	
    		</div>
    	</form>
    </div>
    <hr style="margin: 50px 0;">
    <div style="display: flex; align-items: center; justify-content: center;">
    	<table border="1" style="width: 30%">
    		<thead>
    			<tr>
    				<th>Staff ID</th>
    				<th>Staff Name</th>
    				<th></th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>S01</td>
    				<td>John Sebastian</td>
    				<td>
          <a href="staffs.php">Edit</a> |
          <a href="staffs.php">Delete</a> 
    				</td>
    			</tr>
    			
          <tr>
            <td>S02</td>
            <td>Sarah Elizabeth</td>
            <td>
              <a href="staffs.php">Edit</a> |
              <a href="staffs.php">Delete</a> 
            </td>
          </tr>

    		</tbody>
    	</table>
    </div>
	</center>

</body>
</html>