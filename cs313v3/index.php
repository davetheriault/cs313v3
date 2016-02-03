<?php session_start(); ?>
<?php $title = 'HomePage'; ?>

<?php if (isset($_POST['endo'])) {
     session_destroy();
} ?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-third">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
            <h3 class="w3-red w3-padding w3-margin-0">Team Readiness Assignments</h3>
            <ul class="w3-ul w3-large">
                <li><a href="tra3.php">Week 3 - Form</a></li>
                <li><a href="tra4.php">Week 4 - Conference DB</a></li>
                <li><a href="tra5.php">Week 5 - Scriptures DB</a></li>
                <li><a href="#">Week 6</a></li>
                <li><a href="#">Week 7</a></li>
                <li><a href="#">Week 8</a></li>
                <li><a href="#">Week 9</a></li>
                <li><a href="#">Week 10</a></li>
                <li><a href="#">Week 11</a></li>
                <li><a href="#">Week 12</a></li>
                <li><a href="#">Week 13</a></li>
                <li><a href="#">Week 14</a></li>
            </ul>
        </div>
    </div>
    <div class="w3-third">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
            <h3 class="w3-green w3-padding w3-margin-0">PHP / Java Projects</h3>
            <ul class="w3-ul w3-large">
                <li><a href="per3survey.php">Week 3 - Survey</a></li>
                <li><a href="per4.php">Week 4 - DB Set Up</a></li>
                <li><a href="#">Week 5</a></li>
                <li><a href="#">Week 6</a></li>
                <li><a href="#">Week 7</a></li>
                <li><a href="#">Week 8</a></li>
                <li><a href="#">Week 9</a></li>
                <li><a href="#">Week 10</a></li>
                <li><a href="#">Week 11</a></li>
                <li><a href="#">Week 12</a></li>
                <li><a href="#">Week 13</a></li>
                <li><a href="#">Week 14</a></li>
            </ul>
        </div>
    </div>
    <div class="w3-third">
        <div class="w3-container w3-card-4 w3-padding-0 w3-margin">
            <h3 class="w3-blue-grey w3-padding w3-margin-0">About Me</h3>
            <div class="w3-container w3-padding-0 w3-white" style="overflow: hidden;">
                <div class="w3-image">
                    <img class="w3-half" src="images/face.jpg" alt="Profile Picture" />
                </div>
                <blockquote class="w3-half w3-blockquote w3-large w3-white w3-padding" style="bottom: 0;">"Hi. My name is David, and this is my site.</blockquote>
            </div>
        </div>
        <form id="endSesh" action="" method="post" >
            <input type="radio" name="endo" value="endo" checked hidden />
            <input type="submit" form="endSesh" id="endSeshSub" style="width: 100px; height: 30px; opacity: 0;" />
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>