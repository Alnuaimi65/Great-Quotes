<!doctype html>
<html lang="en">
<head>
	<!-- https://www.bootdey.com/snippets/view/single-advisor-profile#html -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/css/index.css" />
	<title>Modify Author</title>
</head>
<body>
	<?php
	require('../csv_util.php');
	$idx = $_GET['index'];
	$authors = readCSVFile("../authors.csv");
	$quotes = readCSVFile("../quotes.csv");
	echo '<h2>'.$authors[$idx][0].' '.$authors[$idx][1].'</h2>';
	?>
	<form action="" method="POST">
		Author First Name:
		<input type="text" name="fname" value=<?php echo "'{$authors[$idx][0]}'"; ?>>
		<br>
		Author Last Name:
		<input type="text" name="lname" value=<?php echo "'{$authors[$idx][1]}'"; ?>>
		<br>
		<br>
		<input type="hidden" name="form_submitted" value="1" />
		<input type="submit" value="Modify">
	</form>
	<?php
	if (isset($_POST['form_submitted'])){
		$row = array(
			$_POST['fname'],
			$_POST['lname']
		);
		updateCSVFile("../authors.csv",$idx,$row);
		echo "<p>Author Modified.</p>";
		echo '<p ><a href="\../index.php">Go To Details Page.</a></p>';
		echo '<p ><a href="\authors\">Go To All Authors Page.</a></p>';
	}
	?>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
