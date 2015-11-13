<html>
<head>
	<meta charset="UTF-8">
	<title>Car Rental Application</title>
</head>
<body>
	<h1>Mootown Rentals</h1>
	<p><a href="ca01_form.php">Step 1</a> > <u>Step 2</u></p> 
	<?php
		$result = $_POST['chosenCar'];
		$tab = explode('|', $result);

		$link = 'cars/'.$tab[0].'/'.$tab[1].'.jpg';
		$name = str_replace('-', ' ', $tab[1]);
	?>
	<p>You picked the car :</p>
	<h3><?= ucwords($name) ?></h3>
	<img src="<?= $link ?>" alt="<?= $name ?>">
</body>
</html>