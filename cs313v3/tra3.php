<?php $title = 'HomePage'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-third w3-margin-top">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
            <h3 class="w3-red w3-padding w3-margin-0">Team Readiness Assignment - Week 3</h3>
            <form id="tra3form" action="results.php" method="post" class="w3-container">
                <p>
                    <label>Name</label>
                    <input class="w3-input" type="text" name="name"/>
                </p>
                <p>
                    <label>Email</label>
                    <input class="w3-input" type="email" name="email"/>
                </p>
                <p>
                    <label>Major</label>
                    <input class="w3-input" type="radio" name="major" value="Computer Science"/> Computer Science
                </p>
                
            </form>
        </div>
    </div>
    
</main>

<?php include 'includes/footer.php'; ?>