<?php 
  if (!isset($_GET['id']) ) {
    header('location: index.php');
  }

	require ('components/config.php');
  
  $id = $_GET['id'];

	if (isset($_POST['submit'])) {
	$menu_name = $_POST['menu_name'];
	$position = $_POST['position'];
	$visible = $_POST['visible'];
 

	$query = "UPDATE subjects SET
          menu_name = '{$menu_name}', 
          position =  {$position}, 
          visible = {$visible}
          WHERE id = {$id}";
	//$query2 = "SELECT * FROM pages";
	//$pealkiri = "SELECT menu_name FROM pages";
	//$sisu = "SELECT content FROM pages";
	$result = mysqli_query($connect, $query);
	//$result2 = mysqli_query($connect, $query2);

	//$result2 = mysqli_query($connect, $pealkiri);
	//$result3 = mysqli_query($connect, $sisu);

if ($result) {
  $answer = "Õnnestus";
} else {
  $answer = "Ebaõnnestus";
}
}else {
  $query = "SELECT * FROM subjects WHERE id = $id";
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_assoc($result);

  $menu_name = $row['menu_name'];
  $position = $row['position'];
  $visible = $row['visible'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Databases</title>
  <?php if(isset($_POST['submit'])) { ?>
    <meta http-equiv="refresh" content="2; url=index.php">
  <?php } ?>
</head>

<body>
	
	

<?php
if (isset($_POST['submit'])) {
  if ($result) {
    echo "Õnnestus";
  } else {
    echo "Ebaõnnestus";
  }
}
?>

<?php if (!isset($_POST['submit'])) { ?>
<form action="databases_update.php?id=<?php echo $id; ?>" method="post">
      <div class="form-field">
        <label for="menu-name">Pealkiri</label>
        <input id="menu-name" type="text" name="menu_name" value = "<?php echo $menu_name; ?>">
      </div>
 
      <div class="form-field">
        <label for="position">Positsioon</label>
        <select id="position" name="position">
          <?php for ($i=0; $i < 16 ; $i++) { ?>
            <option value="<?php echo $i; ?>"<?php if ($i == $position) {echo "selected";} ;?>><?php echo $i; ?></option>
          <?php } ?>
        </select>
      </div>
 
      <div class="form-field">
        <label for="visible">Nähtavus</label>
        <select id="visible" name="visible">
          <option value="0" <?php if ($visible == 0) {echo "selected";} ; ?>>Peidetud</option>
          <option value="1" <?php if ($visible == 1) {echo "selected";} ; ?>>Nähtav</option>
        </select>
      </div>
 
      <div class="form-field">
        <input type="submit" name="submit">
      </div>
    </form>
  
  <a href="index.php">Tagasi</a>

<?php } ?>
</body>
</html>

<?php mysqli_close($connect); ?>