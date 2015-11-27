<html>
<head>
	<meta charset="UTF-8">
	<title>Car Rental Application</title>
</head>
<body>
	<h1>Mootown Rentals</h1>
	<p><a href="ca01_form.php">Step 1</a> > <u>Step 2</u></p> 
	<?php
		$chosenCar = json_decode($_POST['chosenCar'], true);
		echo $chosenCar['category'];
		$name = str_replace('-', ' ', $chosenCar['name']);
		$link = "cars/".$chosenCar['category']."/".$chosenCar['name'].".jpg";
	?>
	<p>You picked the car :</p>
	<h3><?= ucwords($name) ?></h3>
	<img src="<?= $link ?>" alt="<?= $chosenCar['name'] ?>">
</body>
</html>