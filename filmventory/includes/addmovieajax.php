<?php

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$dbName = "dave";

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

print_r($_GET['user']);
print_r($_GET['mov']);

$db->exec('INSERT INTO movie2user (user_id, movie_id) VALUES ("' . $_GET['user'] . '", "' . $_GET['mov'] . '")');


?>