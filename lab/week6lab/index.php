<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
<body>
 
<div align="center">
  <table width="379" height="286" border="3" bordercolor="#666666">
    <tr>
      <td height="190" bgcolor="#999999">
          <p align="center"><strong>My Guestbook</strong></p>
          <p align="center">Date : <?php echo date("d-m-Y",time()); ?></p>
          <p align="center">Time : <?php date_default_timezone_set("Asia/Kuala_Lumpur");echo date("H:i",time()); ?></p>
          <p align="center"><a href="new_form.php">Add</a> | <a href="list.php">List</a></p>
      </td>
    </tr>
  </table>
</div>
 
</body>
</html>