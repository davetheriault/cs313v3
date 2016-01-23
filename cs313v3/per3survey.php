<?php $title = 'Survey'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col l3">&nbsp;</div>
        <div class="w3-col l6">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">Movie Survey</h3>

                <form id="per3form" action="per3submit.php" method="post" class="w3-container w3-row">
                    <div class="w3-container">
                        <ul class="w3-ul">
                            <li>
                                <p>
                                    1. <label>What is your <strong>favorite</strong> movie genre?</label>
                                    <select class="w3-select w3-padding" name="genre" required>
                                        <option value="" disabled selected>Please choose an option...</option>
                                        <option value="g1">Action</option>
                                        <option value="g2">Sci-Fi</option>
                                        <option value="g3">Drama</option>
                                        <option value="g4">Comedy</option>
                                        <option value="g5">Animated</option>
                                        <option value="g6">Horror</option>
                                        <option value="g7">Suspense</option>
                                        <option value="g8">Fantasy</option>
                                        <option value="g0">True-Story</option>
                                        <option value="g9">Documentary</option>
                                    </select>
                                </p>
                            </li>

                            <li>
                                <p>
                                    2. <label>What is your <strong>least favorite</strong> movie genre?</label>
                                    <select class="w3-select w3-padding" name="least" required>
                                        <option value="" disabled selected>Please choose an option...</option>
                                        <option value="l1">Action</option>
                                        <option value="l2">Sci-Fi</option>
                                        <option value="l3">Drama</option>
                                        <option value="l4">Comedy</option>
                                        <option value="l5">Animated</option>
                                        <option value="l6">Horror</option>
                                        <option value="l7">Suspense</option>
                                        <option value="l8">Fantasy</option>
                                        <option value="l0">True-Story</option>
                                        <option value="l9">Documentary</option>
                                    </select>
                                </p>
                            </li>
                            <li>
                                <p>
                                    3. <label>When watching a film in theaters, which experience do you prefer?</label>
                                    <select class="w3-select w3-padding" name="film">
                                        <option value="" disabled selected>Please choose an option...</option>
                                        <option value="f1">Imax</option>
                                        <option value="f2">3D</option>
                                        <option value="f3">Premium Sound</option>
                                        <option value="f4">"Doesn't matter. Whatever is cheapest."</option>
                                    </select>
                                </p>
                            </li>

                            <li>
                                <p>
                                    4. <label>Approximately how often do you watch movies at the theater?</label>
                                    <select class="w3-select w3-padding" name="amnt">
                                        <option value="" disabled selected>Please choose an option...</option>
                                        <option value="a1">Every month</option>
                                        <option value="a2">Every other month</option>
                                        <option value="a3">A few times each year</option>
                                        <option value="a4">Once a year</option>
                                    </select>
                                </p>
                            </li>
                            <li>
                                <p><input class="w3-input" type="submit" form="tra3form"/> </p><br>
                            </li>
                        </ul>

                    </div>
                    <div class="w3-half"
                         
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>