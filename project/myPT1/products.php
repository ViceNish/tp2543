<!DOCTYPE html>
<html>
<head>
	<title>Supreme Office Pro System : Products</title>
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
    	<form action="products.php" method="post">

    		<table>
    			<tr>
    				<label for="pid">Product ID</label>
    				<input type="text" name="pid"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="pname">Product Name</label>
    				<input type="text" name="pname"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="price">Price</label>
    				<input type="number" min="1" step="any" name="price"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="brand">Brand</label>
    				<input type="text" name="brand"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="type">Type</label>
    				<select name="type">
    					<option value="">----Select----</option>
    					<option value="table">Table</option>
    					<option value="chair">Chair</option>
    					<option value="drawer">Drawer</option>
    					<option value="shelf">Shelf</option>
    				</select> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="qty">Quantity</label>
    				<input type="number" name="qty" min="1" max="100" step="1"> <br>
    			</tr>
    			<br>
    			<tr>
    				<label for="colour">Colour</label>
    				<input type="text" name="colour"> <br>
    			</tr>
    			
    		</table>
    		<hr style="margin: 10px 0;">
    		<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
    			<button type="submit" name="addproduct">Add Product</button>
    			<button type="reset" style="margin-left: 2em">Clear</button>	
    		</div>
    	</form>
    </div>
    <hr style="margin: 50px 0;">
    <div style="display: flex; align-items: center; justify-content: center;">
    	<table border="1" style="width: 70%">
    		<thead>
    			<tr>
    				<th>Product ID</th>
    				<th>Product Name</th>
    				<th>Price</th>
    				<th>Brand</th>
    				<th>Type</th>
    				<th>Quantity</th>
    				<th>Colour</th>
    				<th></th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>F01</td>
    				<td>Home Office Chair Ergonomic Desk Chair, Pink</td>
    				<td>300.00</td>
    				<td>BestOffice</td>
    				<td>Chair</td>
    				<td>45</td>
    				<td>Pink</td>
    				<td>
    					<a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
    				</td>
    			</tr>
    			
          <tr>
            <td>F02</td>
            <td>Drawer Dresser Organizer Fabric Storage, Black</td>
            <td>275.00</td>
            <td>Seseno</td>
            <td>Drawer</td>
            <td>43</td>
            <td>Black</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F03</td>
            <td>ALPHA HOME High Back Executive Chair, Black</td>
            <td>345.00</td>
            <td>Alpha Home</td>
            <td>Chair</td>
            <td>38</td>
            <td>Black</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F04</td>
            <td>ALPHA HOME Ergonomic Office Chair, Casters</td>
            <td>320.00</td>
            <td>Alpha Home</td>
            <td>Chair</td>
            <td>45</td>
            <td>Black</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F05</td>
            <td>Drawer Dresser Organizer Fabric Storage, Black</td>
            <td>275.00</td>
            <td>Seseno</td>
            <td>Drawer</td>
            <td>43</td>
            <td>Black</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F06</td>
            <td>Ashley Furniture Signature Design - Medium Brown</td>
            <td>260.00</td>
            <td>Ashley</td>
            <td>Drawer</td>
            <td>32</td>
            <td>Medium Brown</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F07</td>
            <td>Ashley Furniture Signature Design - Dark Reddish Brown</td>
            <td>260.00</td>
            <td>Ashley</td>
            <td>Drawer</td>
            <td>45</td>
            <td>Reddish Brown</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F08</td>
            <td>Ashley Furniture Signature Design - Warm Brown</td>
            <td>260.00</td>
            <td>Ashley</td>
            <td>Drawer</td>
            <td>28</td>
            <td>Warm Brown</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F09</td>
            <td>Writing Computer Desk, Brown</td>
            <td>289.00</td>
            <td>Coavas</td>
            <td>Table</td>
            <td>71</td>
            <td>Brown</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

          <tr>
            <td>F10</td>
            <td>Writing Computer Desk, Black</td>
            <td>289.00</td>
            <td>Coavas</td>
            <td>Table</td>
            <td>56</td>
            <td>Matte Black</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>
    		</tbody>
    	</table>
    </div>
	</center>

</body>
</html>