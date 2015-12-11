<html lang="en">
<head>
    <title>Mootown Rentals</title>

    <!-- setting the document to display properly on all devices -->
	<meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- CSS -->
        <!-- getting the needed fonts from a distant server -->
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Open+Sans' rel='stylesheet' type='text/css'>
        <!-- importing the Foundation CSS -->
        <link rel="stylesheet" href="css/foundation.min.css">
        <!-- using custom CSS rules for the app -->
        <link rel="stylesheet" href="css/app.css">
</head>
<body>
	<div class="top-bar">
		<div class="top-bar-left">
			<ul class="menu">
				<li class="menu-text">Mootown Rentals</li>
				<li><a href="ca01_form.php">Step One</a></li>
				<li><a href="ca01_form.php"><strong>Step Two</strong></a></li>
			</ul>
		</div>
	</div>
	<?php
		$result = $_POST['chosenCar'];
		$tab = explode('|', $result);

		$link = 'img/cars/'.$tab[0].'/'.$tab[1].'.jpg';
		$name = str_replace('-', ' ', $tab[1]);
	?>
	<div class="row">
        <h3 class="text-center"><?php echo ucwords($name) ?></h3>
        <img src="<?php echo $link ?>" alt="<?php echo $name ?>">
        <p class="text-center">A great choice, for great trips !</p>
    </div>

</body>
</html>