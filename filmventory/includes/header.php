<!DOCTYPE html>

<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <link type="text/css" rel="stylesheet" href="css/w3.css" />
        <link type="text/css" rel="stylesheet" href="css/font-awesome.css" />
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div id="container">
            <header class="w3-container w3-blue w3-text-shadow">
                <nav class="w3-topnav w3-xlarge">
                    <a href="index.php" class="w3-border-right"><i class="fa fa-home w3-xxlarge"></i> Home</a>
                    <a href="about.php" class="w3-border-right">About</a>
                    <a href="collection.php" class="w3-border-right">Movie Collection</a>
                    <a href="tra6.php" class="w3-border-right">Scripture Database</a>
                </nav>

            </header>
            <?php echo message(); ?>