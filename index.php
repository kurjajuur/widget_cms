<?php 
	require ('components/config.php');

	$query = "SELECT * FROM subjects WHERE visible = 1";
	$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Databases</title>
</head>

<body>
	<ul>
		<?php if ($editmode) { ?>
			<li><a href="databases_create.php">Lisa uus</a></li>			
		<?php } ?>

		<?php while($row = mysqli_fetch_assoc($result)) { ?>
		
			<li class="page-title">
				<?php echo $row["menu_name"]; ?><?php if ($editmode) { ?>
				<a href="databases_update.php?id=<?php echo $row['id']; ?>">Muuda</a>
				<a href="databases_delete.php?id=<?php echo $row['id']; ?>">Kustuta</a><? } ?>
			</li>
			
		<? } ?>
	</ul>
	<?php
	mysqli_free_result($result);
	?>
	<br>

</body>
</html>

<?php mysqli_close($connect); ?>