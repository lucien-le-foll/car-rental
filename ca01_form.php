<!DOCTYPE>
<html>
	<head>
		<title>Car Rental Application</title>
		<meta charset="utf-8">
		<?php
			$categories = scandir('cars');
			unset($categories[0]);
			unset($categories[1]);
			if (isset($_POST['category'])){
				if($_POST['category'] == '*'){

				}
				else {
					$requiredCategory = $_POST['category'];
				}				
			}
		?>
	</head>
	<body>
		<h1>Mootown Rentals</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi eos accusamus nemo doloremque saepe molestiae, voluptas maxime, molestias recusandae eligendi et dolor ullam hic minima repellat optio alias, ratione quisquam!</p>
		<h2>Filter</h2>
		<form action="ca01_form.php" method="post">
			<select name="category" id="category">
				<option value="*">All categories</option>
				<?php foreach($categories as $key => $category): ?>
					<option value='<?= $key ?>'><?= $category ?></option>
				<?php endforeach; ?>		
			</select>
			<button type="submit">Filter</button>
		</form>
		<form action="ca01_result.php" method="post">
			<?php foreach($categories as $key => $category): ?>
				<?php if(isset($requiredCategory)): ?>
					<?php if($key == $requiredCategory): ?>
						<h2><?= $category ?></h2>
						<?php foreach(glob("cars/".$category."/*.jpg") as $link): ?>
							<div>
								<img src="<?= $link ?>" alt="dummy">
								<?php
									$dir = "cars/".$category."/";
									$var = str_replace($dir, '', $link);
									$rough_name = str_replace('.jpg', '', $var);
									$name = str_replace('-', ' ', $rough_name);
									echo "<h3>".ucwords($name)."</h3>";
								?>
								<label for="<?= $rough_name ?>">Pick this car</label>
								<input type="radio" name="chosenCar" id="<?= $rough_name ?>" value='{"name" : "<?= $rough_name ?>", "category" : "<?= $category ?>"}'>
							</div>							
						<?php endforeach; ?>
						<button type="submit">Send</button>
					<?php endif; ?>
				<?php else: ?>
					<h2><?= $category ?></h2>
					<?php foreach(glob("cars/".$category."/*.jpg") as $link): ?>
						<div>
							<img src="<?= $link ?>" alt="dummy">
							<?php
								$dir = "cars/".$category."/";
								$var = str_replace($dir, '', $link);
								$rough_name = str_replace('.jpg', '', $var);
								$name = str_replace('-', ' ', $rough_name);
								echo "<h3>".ucwords($name)."</h3>";
							?>
							<label for="<?= $rough_name ?>">Pick this car</label>
							<input type="radio" name="chosenCar" id="<?= $rough_name ?>" value='{"name" : "<?= $rough_name ?>", "category" : "<?= $category ?>"}'>
						</div>						
					<?php endforeach; ?>
					<button type="submit">Send</button>
				<?php endif; ?>					
			<?php endforeach; ?>	
		</form>
	</body>
</html>