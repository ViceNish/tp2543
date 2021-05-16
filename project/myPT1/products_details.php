<!DOCTYPE html>
<html>
<head>
  <title>Supreme Office Pro System : Products Details</title>

  <style>
    ul {
            list-style: none;
            padding: 0;
            margin: 0 12px;
        }

        form li+li {
            margin-top: 1em;
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

    <h1>Product Details</h1>
  </center>

  <div style="display: flex; align-items: center; justify-content: center;">
        <table border="1" style="width: 50%">
            <tr>
                <td>
                    <form>
                        <ul>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product ID</label>
                                <label>:</label>
                                <label class="pid">F01</label>
                            </li>
                                
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product Name</label>
                                <label>:</label>
                                <label class="pname">Home Office Chair Ergonomic Desk Chair, Pink</label>
                            </li>

                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Price</label>
                                <label>:</label>
                                <label class="price">300</label>
                            </li>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Brand</label>
                                <label>:</label>
                                <label class="brand">BestOffice</label>
                            </li>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Type</label>
                                <label>:</label>
                                <label class="type">Chair</label>
                            </li>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Quantity</label>
                                <label>:</label>
                                <label class="qty">45</label>
                            </li>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Colour</label>
                                <label>:</label>
                                <label class="colour">Pink</label>
                            </li>
                        </ul>
                        
                    </form>
                </td>

                <td>
                    <center>
                         <img src="products/F01.jpg" width="200" height="300">   
                    </center>
                   </td>
            </tr>
         </table>
    </div>
</body>
</html>
