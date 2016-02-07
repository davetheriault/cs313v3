<div class="w3-col s4 m4 l4">
    <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
        <h3 class="w3-red w3-padding w3-margin-0">
            My Movies
        </h3>
        <div class="w3-container w3-padding mngmnt">
            <ul class="w3-ul">
                <li <?php if (basename(__FILE__) == 'collection.php'){echo 'class="w3-blue"';} ?> >
                    <a href="collection.php"><i class="fa fa-film"></i> My Collection</a></li>
                <li <?php if (basename(__FILE__) == 'addmovie.php'){echo 'class="w3-blue"';} ?> >
                    <a href="addmovie.php"><i class="fa fa-plus"></i> Add a Movie</a></li>
                <li <?php if (basename(__FILE__) == 'account.php'){echo 'class="w3-blue"';} ?> >
                    <a href="account.php"><i class="fa fa-cog"></i> My Account</a></li>
                <li <?php if (basename(__FILE__) == 'find.php'){echo 'class="w3-blue"';} ?> >
                    <a href="find.php"><i class="fa fa-search"></i> Find Movies</a></li>
            </ul>
        </div>
    </div> 
</div>