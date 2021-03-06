<?php require 'includes/session.php'; ?>

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
        <div class="rel w3-col s12 m12 l10">
            <?php
            if (isset($_SESSION['voted'])) {
                echo '<div class="w3-padding w3-dark-grey w3-card-8" id="voteThanks">Your vote has been submitted. Thank you.</div>';
            }
            ?>
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Movie Survey Results  &nbsp; <span class="w3-medium"> (<?php echo $totgenre; ?> Votes)</span></h2>

                <div class="w3-container w3-padding-bottom-8">
                    <div class="w3-row">
                        <ul class="results w3-ul w3-quarter w3-padding-bottom">
                            <div class="w3-margin">
                                <h3><span class="noWrap">Most Favorite</span> Genre</h3>
                                <li style="background-color: rgba(<?php echo round($actnum+15) .',105,'. round($actnum*2.5); ?>,0.4); width: <?php echo $actnum*4; ?>px"> &nbsp;Action - <?php echo $actnum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo round($scinum+100).',200,'. round($scinum*2.5); ?>,0.4); width: <?php echo $scinum*4; ?>px"> &nbsp;Sci-Fi - <?php echo $scinum; ?>&percnt;</li> 
                                <li style="background-color: rgba(<?php echo round($dranum+50).',80,'. round($dranum*2.5); ?>,0.4); width: <?php echo $dranum*4; ?>px"> &nbsp;Drama - <?php echo $dranum; ?>&percnt;</li> 
                                <li style="background-color: rgba(<?php echo round($comnum+10).',180,'. round($comnum*2.5); ?>, 0.4); width: <?php echo $comnum*4; ?>px"> &nbsp;Comedy - <?php echo $comnum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo round($aninum+155).',195,'. round($aninum*2.5); ?>,0.4); width: <?php echo $aninum*4; ?>px"> &nbsp;Animated - <?php echo $aninum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo round($hornum+79).',150,'. round($hornum*2.5); ?>,0.4); width: <?php echo $hornum*4; ?>px"> &nbsp;Horror - <?php echo $hornum; ?>&percnt;</li> 
                                <li style="background-color: rgba(<?php echo round($susnum+111).',230,'. round($susnum*2.5); ?>,0.4); width: <?php echo $susnum*4; ?>px"> &nbsp;Suspense - <?php echo $susnum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo round($fannum+1).',18,'. round($fannum*2.5); ?>,0.4); width: <?php echo $fannum*4; ?>px"> &nbsp;Fantasy - <?php echo $fannum; ?>&percnt;</li> 
                                <li style="background-color: rgba(<?php echo round($trunum*2).',125,'. round($trunum*2.5); ?>,0.4); width: <?php echo $trunum*4; ?>px"> &nbsp;True-Story - <?php echo $trunum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo round($docnum+138).',255,'. round($docnum*2.5); ?>,0.4); width: <?php echo $docnum*4; ?>px"> &nbsp;Documentary - <?php echo $docnum; ?>&percnt;</li> 
                            </div>
                        </ul>
                        <ul class="results w3-ul w3-quarter w3-padding-bottom">
                            <div class="w3-margin">
                                <h3><span class="noWrap">Least Favorite</span> Genre</h3>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($actleast*2.5); ?>,0.4); width: <?php echo $actleast*4; ?>px"> &nbsp;Action - <?php echo $actleast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','.round($scileast*2.5); ?>,0.4); width: <?php echo $scileast*4; ?>px"> &nbsp;Sci-Fi - <?php echo $scileast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','.round($draleast*2.5); ?>,0.4); width: <?php echo $draleast*4; ?>px"> &nbsp;Drama - <?php echo $draleast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','.round($comleast*2.5); ?>,0.4); width: <?php echo $comleast*4; ?>px"> &nbsp;Comedy - <?php echo $comleast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($anileast*2.5); ?>,0.4); width: <?php echo $anileast*4; ?>px"> &nbsp;Animated - <?php echo $anileast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($horleast*2.5); ?>,0.4); width: <?php echo $horleast*4; ?>px"> &nbsp;Horror - <?php echo $horleast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($susleast*2.5); ?>,0.4); width: <?php echo $susleast*4; ?>px"> &nbsp;Suspense - <?php echo $susleast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($fanleast*2.5); ?>,0.4); width: <?php echo $fanleast*4; ?>px"> &nbsp;Fantasy - <?php echo $fanleast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($truleast*2.5); ?>,0.4); width: <?php echo $truleast*4; ?>px"> &nbsp;True-Story - <?php echo $truleast; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($docleast*2.5); ?>,0.4); width: <?php echo $docleast*4; ?>px"> &nbsp;Documentary - <?php echo $docleast; ?>&percnt;</li>
                            </div>
                        </ul>
                        <ul class="results w3-ul w3-quarter w3-padding-bottom">
                            <div class="w3-margin">
                                <h3>Theater Experience</h3>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($imaxnum*2.5); ?>,0.4); width: <?php echo $imaxnum*4; ?>px"> &nbsp;Imax - <?php echo $imaxnum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($_3dnum*2.5); ?>,0.4); width: <?php echo $_3dnum*4; ?>px"> &nbsp;3D - <?php echo $_3dnum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($soundnum*2.5); ?>,0.4); width: <?php echo $soundnum*4; ?>px"> &nbsp;Sound - <?php echo $soundnum; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($_nanum*2.5); ?>,0.4); width: <?php echo $_nanum*4; ?>px"> &nbsp;Menh... - <?php echo $_nanum; ?>&percnt;</li>
                            </div>
                        </ul>
                        <ul class="results w3-ul w3-quarter w3-padding-bottom">
                            <div class="w3-margin">
                                <h3>Theater Frequency</h3>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($_12num*2.5); ?>,0.4); width: <?php echo $_12num*4; ?>px"> &nbsp;Monthly - <?php echo $_12num; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($_6num*2.5); ?>,0.4); width: <?php echo $_6num*4; ?>px"> &nbsp;Bi-Monthly - <?php echo $_6num; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($_3num*2.5); ?>,0.4); width: <?php echo $_3num*4; ?>px"> &nbsp;Few Times - <?php echo $_3num; ?>&percnt;</li>
                                <li style="background-color: rgba(<?php echo rand(10, 255).','.rand(10, 255).','. round($_1num*2.5); ?>,0.4); width: <?php echo $_1num*4; ?>px"> &nbsp;Once p/Year - <?php echo $_1num; ?>&percnt;</li>
                            </div>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>