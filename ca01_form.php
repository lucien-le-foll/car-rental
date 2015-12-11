<!DOCTYPE>
<html>
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
    <?php
        $categories = scandir('img/cars');
        unset($categories[0], $categories[1]);
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
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="menu">
                <li class="menu-text">Mootown Rentals</li>
                <li><a href="ca01_form.php"><strong>Step One</strong></a></li>
                <li><a href="ca01_form.php">Step Two</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="columns small-12 medium-8">
            <h1>Mootown Rentals</h1>
            <p class="lead">Simple car rental app !</p>
        </div>
        <div class="columns small-12 medium-4">
            <h2>Filter</h2>
            <form action="ca01_form.php" method="post">
                <label>Please choose a category :
                    <select name="category" id="category">
                        <option value="*">All</option>
                        <?php foreach($categories as $key => $category): ?>
                            <option value='<?php echo  $key ?>'><?php echo  $category ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="submit" class="button expanded">Filter</button>
            </form>
        </div>
    </div>
    <div class="row columns">
        <hr>
    </div>
    <div class="row">
        <form action="ca01_result.php" method="post">
            <?php foreach($categories as $key => $category): ?>
                <?php if(isset($requiredCategory)): ?>
                    <?php if($key == $requiredCategory): ?>
                        <div class="row">
                            <h2 class="text-center"><?php echo  $category ?></h2>
                            <?php foreach(glob("img/cars/".$category."/*.jpg") as $link): ?>
                                <div class="columns small-12 medium-6">
                                    <?php
                                        $dir = "img/cars/".$category."/";
                                        $var = str_replace($dir, '', $link);
                                        $rough_name = str_replace('.jpg', '', $var);
                                        $name = str_replace('-', ' ', $rough_name);
                                        echo "<h3 class='text-center'>".ucwords($name)."</h3>";
                                    ?>
                                    <div class="row columns">
                                        <img src="<?php echo  $link ?>" alt="<?php echo  $rough_name ?>">
                                    </div>
                                    <div class="row">
                                        <div class="columns small-5 small-centered">
                                            <input type="radio" name="chosenCar" id="<?php echo  $rough_name ?>" value='<?php echo  $category."|".$rough_name ?>'>
                                            <label for="<?php echo  $rough_name ?>">Pick this car</label>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <button type="submit" class="button expanded success">Send</button>
                        </div>

                    <?php endif; ?>
                <?php else: ?>
                    <div class="row">
                        <h2 class="text-center"><?php echo  $category ?></h2>
                        <?php foreach(glob("img/cars/".$category."/*.jpg") as $link): ?>
                            <div class="columns small-12 medium-6">
                                <?php
                                $dir = "img/cars/".$category."/";
                                $var = str_replace($dir, '', $link);
                                $rough_name = str_replace('.jpg', '', $var);
                                $name = str_replace('-', ' ', $rough_name);
                                echo "<h3 class='text-center'>".ucwords($name)."</h3>";
                                ?>
                                <div class="row columns">
                                    <img src="<?php echo  $link ?>" alt="<?php echo  $rough_name ?>">
                                </div>
                                <div class="row">
                                    <div class="columns small-5 small-centered">
                                        <input type="radio" name="chosenCar" id="<?php echo  $rough_name ?>" value='<?php echo  $category."|".$rough_name ?>'>
                                        <label for="<?php echo  $rough_name ?>">Pick this car</label>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="button expanded success">Go !</button>
                        <div class="row-columns">
                            <hr>
                        </div>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </form>
    </div>
</body>
</html>