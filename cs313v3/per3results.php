<?php session_start(); ?>

<?php 
    //get result data from file
    $reslts = file_get_contents('surveydata.txt');
    
    //total number of votes
    $totgenre = substr_count($reslts, "g");
    
    //Percent of votes for each genre
    $actnum = round((substr_count($reslts, "g1") / $totgenre * 100), 2);
    $scinum = round((substr_count($reslts, "g2") / $totgenre * 100), 2);
    $dranum = round((substr_count($reslts, "g3") / $totgenre * 100), 2);
    $comnum = round((substr_count($reslts, "g4") / $totgenre * 100), 2);
    $aninum = round((substr_count($reslts, "g5") / $totgenre * 100), 2);
    $hornum = round((substr_count($reslts, "g6") / $totgenre * 100), 2);
    $susnum = round((substr_count($reslts, "g7") / $totgenre * 100), 2);
    $fannum = round((substr_count($reslts, "g8") / $totgenre * 100), 2);
    $trunum = round((substr_count($reslts, "g0") / $totgenre * 100), 2);
    $docnum = round((substr_count($reslts, "g9") / $totgenre * 100), 2);
        
    //Percent of votes for least genre
    $actleast = round((substr_count($reslts, "l1") / $totgenre * 100), 2);
    $scileast = round((substr_count($reslts, "l2") / $totgenre * 100), 2);
    $draleast = round((substr_count($reslts, "l3") / $totgenre * 100), 2);
    $comleast = round((substr_count($reslts, "l4") / $totgenre * 100), 2);
    $anileast = round((substr_count($reslts, "l5") / $totgenre * 100), 2);
    $horleast = round((substr_count($reslts, "l6") / $totgenre * 100), 2);
    $susleast = round((substr_count($reslts, "l7") / $totgenre * 100), 2);
    $fanleast = round((substr_count($reslts, "l8") / $totgenre * 100), 2);
    $truleast = round((substr_count($reslts, "l0") / $totgenre * 100), 2);
    $docleast = round((substr_count($reslts, "l9") / $totgenre * 100), 2);
    
    //Percent of votes for film experience
    $imaxnum = round((substr_count($reslts, "f1") / $totgenre * 100), 2);
    $_3dnum = round((substr_count($reslts, "f2") / $totgenre * 100), 2);
    $soundnum = round((substr_count($reslts, "f3") / $totgenre * 100), 2);
    $_nanum = round((substr_count($reslts, "f4") / $totgenre * 100), 2);
    
    //Percent of votes for frequency
    $_12num = round((substr_count($reslts, "a1") / $totgenre * 100), 2);
    $_6num = round((substr_count($reslts, "a2") / $totgenre * 100), 2);
    $_3num = round((substr_count($reslts, "a3") / $totgenre * 100), 2);
    $_1num = round((substr_count($reslts, "a4") / $totgenre * 100), 2);
?>


<?php $title = 'Results'; ?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s0 m0 l1" style="line-height: 0.1;">&nbsp;</div>
        <div class="w3-col s12 m12 l10">
            <?php if (isset($_SESSION['voted'])){
                echo '<div class="w3-padding-0 w3-center">Your vote has been submitted. Thank you.</div>';} ?>
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Movie Survey Results  &nbsp; <span class="w3-medium"> (<?php echo $totgenre; ?> Votes)</span></h2>

                    <div class="w3-container w3-row">
                        <ul class="w3-ul w3-quarter">
                            <li><h3>Favorite Genre</h3></li>
                            <li>Action - <?php echo $actnum; ?>&percnt;</li>
                            <li>Sci-Fi - <?php echo $scinum; ?>&percnt;</li>
                            <li>Drama - <?php echo $dranum; ?>&percnt;</li>
                            <li>Comedy - <?php echo $comnum; ?>&percnt;</li>
                            <li>Animated - <?php echo $aninum; ?>&percnt;</li>
                            <li>Horror - <?php echo $hornum; ?>&percnt;</li>
                            <li>Suspense - <?php echo $susnum; ?>&percnt;</li>
                            <li>Fantasy - <?php echo $fannum; ?>&percnt;</li>
                            <li>True-Story - <?php echo $trunum; ?>&percnt;</li>
                            <li>Documentary - <?php echo $docnum; ?>&percnt;</li>
                        </ul>
                        <ul class="w3-ul w3-quarter">
                            <li><h3>Least Favorite Genre</h3></li>
                            <li>Action - <?php echo $actleast; ?>&percnt;</li>
                            <li>Sci-Fi - <?php echo $scileast; ?>&percnt;</li>
                            <li>Drama - <?php echo $draleast; ?>&percnt;</li>
                            <li>Comedy - <?php echo $comleast; ?>&percnt;</li>
                            <li>Animated - <?php echo $anileast; ?>&percnt;</li>
                            <li>Horror - <?php echo $horleast; ?>&percnt;</li>
                            <li>Suspense - <?php echo $susleast; ?>&percnt;</li>
                            <li>Fantasy - <?php echo $fanleast; ?>&percnt;</li>
                            <li>True-Story - <?php echo $truleast; ?>&percnt;</li>
                            <li>Documentary - <?php echo $docleast; ?>&percnt;</li>
                        </ul>
                        <ul>
                            <li><h3>Theater Experience</h3></li>
                            <li>Imax - <?php echo $imaxnum; ?>&percnt;</li>
                            <li>3D - <?php echo $_3dnum; ?>&percnt;</li>
                            <li>Premium Sound - <?php echo $soundnum; ?>&percnt;</li>
                            <li>Doesn't Matter - <?php echo $_nanum; ?>&percnt;</li>
                        </ul>
                            <li>
                                <p>
                                    <h3>Approximately how often do you watch movies at the theater?</h3>
                                    
                                </p>
                            </li>
                            <li>
                                <p><input class="w3-input" type="submit" form="per3form"/> </p><br>
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