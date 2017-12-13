<?php require 'includes/session.php'; ?>

<?php $title = 'HomePage'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col l2">&nbsp;</div>
        <div class="w3-col l8">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">Team Readiness Assignment - Week 3</h3>

                <form id="tra3form" action="tra3results.php" method="post" class="w3-container">
                    <div class="w3-half w3-container">
                        <p>
                            <label>Name</label>
                            <input class="w3-input" type="text" name="name"/>
                        </p>
                        <p>
                            <label>Email</label>
                            <input class="w3-input" type="email" name="email"/>
                        </p>
                        <p>Major</p>
                        <ul class="w3-ul">
                            <li><input type="radio" name="major" value="Computer Science"/> Computer Science </li>
                            <li><input type="radio" name="major" value="Web Development and Design"/> Web Development and Design </li>
                            <li><input type="radio" name="major" value="Computer Information Technology"/> Computer Information Technology </li>
                            <li><input type="radio" name="major" value="Computer Engineering"/> Computer Engineering </li>
                        </ul>
                    </div>
                    <div class="w3-container w3-half">
                        <p>Places you have visited</p>
                        <ul class="w3-ul">
                            <li><input type="checkbox" name="places[]" value="North America"/> North America</li>
                            <li><input type="checkbox" name="places[]" value="South America"/> South America</li>
                            <li><input type="checkbox" name="places[]" value="Europe"/> Europe</li>
                            <li><input type="checkbox" name="places[]" value="Asia"/> Asia</li>
                            <li><input type="checkbox" name="places[]" value="Australia"/> Australia</li>
                            <li><input type="checkbox" name="places[]" value="Africa"/> Africa</li>
                            <li><input type="checkbox" name="places[]" value="Antarctica"/> Antarctica</li>
                        </ul>
                        <p>Comments </p>
                        <p>
                            <textarea class="w3-input w3-border" rows="4" cols="60" name="comments" form="tra3form"></textarea>
                        </p>
                    </div>

                    <p><input class="w3-input" type="submit" form="tra3form"/> </p><br>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>