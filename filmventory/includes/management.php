

<?php
    echo ''
       . '<div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">'
       .    '<h3 class="w3-red w3-padding w3-margin-0">'
       .         'My Movies'
       .     '</h3>'
       .     '<div class="w3-container mngmnt">'
       .         '<ul class="w3-ul">'
       .             '<li';
    if ($title == $_SESSION['username'] . '&apos;s Movies!') {
        echo ' class="w3-blue"';
    }
    echo '>'
       . '<a href="collection.php"><i class="fa fa-film"></i> My Collection</a></li>'
       . '<li';
    if ($title == 'Add a Movie') {
        echo ' class="w3-blue"';
    }
    echo '>'
       . '<a href="addmovie.php"><i class="fa fa-plus"></i> Add a Movie</a></li>'
       . '<li'; 
    if ($title == 'My Account') {
        echo 'class="w3-blue"';
    }
    echo '>'
       . '<a href="account.php"><i class="fa fa-cog"></i> My Account</a></li>'
       . '<li'; 
    if ($title == 'Find Movies') {
        echo ' class="w3-blue"';
    } 
    echo '>'
       . '<a href="find.php"><i class="fa fa-search"></i> Find Movies</a></li>'
       . '<li'; 
    if ($title == 'Log Out') {
        echo ' class="w3-blue"';
    } 
    echo '>'
       . '<a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>'     
       . '</ul>'
       . '</div>'
       . '</div>';