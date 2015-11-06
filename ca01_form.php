<!DOCTYPE>
<html>
	<head>
		<title>Mootown Rental</title>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src='http://code.jquery.com/jquery-2.1.4.min.js'></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

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
		<header>
			<nav>
				<div class="nav-wrapper">
					<a href="#" class="brand-logo center">Mootown Rentals</a>
					<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li class="active"><a href="#">Step 1</a></li>
						<li><a href="#">Step 2</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<main>
			<div class="row">
				<h2 class="col s4 white z-depth-1">Filter</h2>
				<form class="col s8 white z-depth-1" action="ca01_form.php" method="post">
					<select name="category" id="category">
						<option value="*">All categories</option>
						<?php foreach($categories as $key => $category): ?>
							<option value='<?= $key ?>'><?= $category ?></option>
						<?php endforeach; ?>		
					</select>
					<button type="submit">Filter</button>
				</form>
			</div>
			<div class="row">
				<form action="ca01_result.php" method="post">
					<?php foreach($categories as $key => $category): ?>
						<?php if(isset($requiredCategory)): ?>
							<?php if($key == $requiredCategory): ?>
								<h2><?= $category ?></h2>
								<?php foreach(glob("cars\\".$category."\\*.jpg") as $link): ?>
									<div>
										<img src="<?= $link ?>" alt="dummy">
										<?php
											$dir = "cars\\".$category."\\";
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
							<?php foreach(glob("cars\\".$category."\\*.jpg") as $link): ?>
								<div>
									<img src="<?= $link ?>" alt="dummy">
									<?php
										$dir = "cars\\".$category."\\";
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
			</div>			
		</main>
		<footer>
			
		</footer>
		
	</body>
</html>