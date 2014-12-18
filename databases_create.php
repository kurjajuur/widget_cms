<?php 
require ('components/config.php');

	if (isset($_POST['submit'])) {
	$menu_name = $_POST['menu_name'];
	$position = $_POST['position'];
	$visible = $_POST['visible'];

	$query = "INSERT INTO subjects (menu_name, position, visible)
	VALUES ('{$menu_name}', {$position}, {$visible})";

	$result = mysqli_query($connect, $query);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Databases</title>
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

<form action="databases_create.php" method="post">
      <div class="form-field">
        <label for="menu-name">Pealkiri</label>
        <input id="menu-name" type="text" name="menu_name">
      </div>
 
      <div class="form-field">
        <label for="position">Positsioon</label>
        <select id="position" name="position">
          <?php for ($i=0; $i < 16 ; $i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php } ?>
        </select>
      </div>
 
      <div class="form-field">
        <label for="visible">Nähtavus</label>
        <select id="visible" name="visible">
          <option value="0">Peidetud</option>
          <option value="1">Nähtav</option>
        </select>
      </div>
 
      <div class="form-field">
        <input type="submit" name="submit">
      </div>
    </form>
	

<a href="index.php">Tagasi</a>
</body>
</html>

<?php mysqli_close($connect); ?>