<!DOCTYPE>
<html>
	<head>
		<title>Mootown Rental</title>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src='http://code.jquery.com/jquery-2.1.4.min.js'></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Getting some forms ready -->
		<script>
			$(document).ready(function(){
				$('#category').material_select();
			});
		</script>
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
				<div class="col s8 offset-s2 white z-depth-1">
					<div class="row">
						<h3 class="center">Filter</h3>
					</div>
					<div class="row">
						<form action="ca01_form.php" method="post">
							<select class="col s8" name="category" id="category">
								<option value="" disabled selected>Choose a category</option>
								<option value="*">All categories</option>
								<?php foreach($categories as $key => $category): ?>
									<option value='<?= $key ?>'><?= $category ?></option>
								<?php endforeach; ?>		
							</select>
							<button type="submit" class="col s2 offset-s1 btn waves-light waves-effect">Filter <i class="material-icons">loop</i></button>
						</form>
					</div>					
				</div>				
			</div>
			<div class="row">
				<form action="ca01_result.php" method="post" id='mainForm'>
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
							<div class="row">
								<h2 class="center"><?= $category ?></h2>
								<?php foreach(glob("cars\\".$category."\\*.jpg") as $link): ?>
									<div class="col s4">
										<div class="card">
											<?php
												$dir = "cars\\".$category."\\";
												$var = str_replace($dir, '', $link);
												$rough_name = str_replace('.jpg', '', $var);
												$name = str_replace('-', ' ', $rough_name);
											?>
											<div class="card-image">
												<img src="<?= $link ?>" alt="<?= $rough_name ?>">
												<span class="card-title black-text"><?= ucwords($name) ?></span>
											</div>											
											<div class="card-content">
												<p>
													<input type="radio" class='with-gap' name="chosenCar" id="<?= $rough_name ?>" value='{"name" : "<?= $rough_name ?>", "category" : "<?= $category ?>"}'>
													<label for="<?= $rough_name ?>">Pick this car</label>
												</p>
											</div>
										</div>
									</div>						
								<?php endforeach; ?>
							</div>		
						<?php endif; ?>					
					<?php endforeach; ?>
					<div class="fixed-action-btn" style="bottom: 45px; right: 24px;" onclick="document.getElementById('mainForm').submit();">
						<a class="btn-floating btn-large red">
							<i class="large material-icons">navigation</i>
						</a>
					</div>	
				</form>
			</div>			
		</main>
		<footer>
			
		</footer>
		
	</body>
</html>