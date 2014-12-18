<?php 
	require ('components/config.php');

	$id = $_GET['id'];

	$query = "DELETE FROM subjects WHERE id = {$id} ";
	$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Databases</title>
  <style>
   .notice {color: green;}
   .error {color: red;}
  </style>
  <meta http-equiv="refresh" content="2; url=index.php">
</head>

<body>

<?php if ($result and mysqli_affected_rows($connect)) { ?>
  <p class="notice"><?php echo "Rida kustutatud"; ?></p>
<?php } else { ?>
  <p class="error"><?php echo "Sellist rida andmebaasis ei ole"; ?></p>
<?php } ?>


</body>
</html>

<?php mysqli_close($connect); ?>