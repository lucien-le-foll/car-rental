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
        // scanning the cars directory to get all the cars
        $categories = scandir('img/cars');
        // removing the hidden paths we got from scandir (. & ..)
        unset($categories[0], $categories[1]);

        // checking if there is a category chosen from a previous visit
        if (isset($_POST['category'])){
            if($_POST['category'] == '*'){
                // if the user requires all the categories, we do nothing
            }
            else {
                // elseway, we set the var to the required category
                $requiredCategory = $_POST['category'];
            }
        }
    ?>
</head>
<body>
    <!-- creating the menu with the Foundation Framework -->
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
        <!-- splitting the top part of the page in two, except for small screens -->
        <div class="columns small-12 medium-8">
            <h1>Mootown Rentals</h1>
            <p class="lead">Simple car rental app !</p>
        </div>
        <div class="columns small-12 medium-4">
            <h2>Filter</h2>
            <form action="ca01_form.php" method="post">
                <label>Please choose a category :
                    <select name="category" id="category">
                        <!-- giving the 'all' option -->
                        <option value="*">All</option>
                        <!-- generating the select options from the categories array -->
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
        <!-- wrapping the whole part of the page in a form to get the desired result -->
        <form action="ca01_result.php" method="post">
            <!-- looping on the categories array -->
            <?php foreach($categories as $key => $category): ?>
                <!-- checking if the user has required to see a specific category -->
                <?php if(isset($requiredCategory)): ?>
                    <!-- checking if the category we loop on is the one required, if so we display it -->
                    <?php if($key == $requiredCategory): ?>
                        <div class="row">
                            <h2 class="text-center"><?php echo  $category ?></h2>
                            <!-- getting all the cars from the category -->
                            <?php foreach(glob("img/cars/".$category."/*.jpg") as $link): ?>
                                <div class="columns small-12 medium-6">
                                    <?php
                                        // some string manipulation to get the name of the cars, and their path
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
                            <!-- displaying a send button for each category -->
                            <button type="submit" class="button expanded success">Send</button>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- this part is the same as the upper one -->
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