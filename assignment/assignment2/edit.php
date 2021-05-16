<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM myguestbook WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
 ?>

<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 
<form method="post" action="update.php">
  Name :
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  <br>
  Email :
  <input type="text" name="email" size="25" required value="<?php echo $result["email"]; ?>">
  <br>
  How did you find me?
  <select name="find" required>
    <option <?php if ($result["find"]=="From a friend") echo "selected" ?>>From a friend</option>
    <option <?php if ($result["find"]=="I googled you") echo "selected" ?>>I googled you</option>
    <option <?php if ($result["find"]=="Just surf on in") echo "selected" ?>>Just surf on in</option>
    <option <?php if ($result["find"]=="From your Facebook") echo "selected" ?>>From your Facebook</option>
    <option <?php if ($result["find"]=="I clicked an ads") echo "selected" ?>>I clicked an ads</option>
  </select>
  <br>
  I like your : <br>
  <input type="checkbox" id="frontpage" name="frontpage" value="Front page" <?php if (isset($result['frontpage'])) echo "checked"; ?>>
  <label for="frontpage"> Front page</label><br>
  <input type="checkbox" id="form" name="form" value="Form" <?php if (isset($result['form'])) echo "checked"; ?>>
  <label for="form"> Form</label><br>
  <input type="checkbox" id="UI" name="UI" value="User Interface" <?php if (isset($result['UI'])) echo "checked"; ?>>
  <label for="UI"> User Interface</label>
  <br>
  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment">
  <input type="reset">
  <br>
</form>
 
</body>
</html>