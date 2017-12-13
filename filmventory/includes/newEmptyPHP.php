<?php

$totevote = $db->prepare('SELECT votes FROM candidates');
$totevote->execute();
$totevote->setFetchMode(PDO::FETCH_ASSOC);
$votes = $totevote->fetchAll();

$total = 0;
foreach ($votes as $each){
    $total += $each['votes'];
}

?>