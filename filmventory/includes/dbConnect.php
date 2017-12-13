<?php

$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

if ($openShiftVar === null || $openShiftVar == "") {
    // Not in the openshift environment
    $dbHost = "localhost";
    require("setLocalDatabaseCredentials.php");
    //
} else {

    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $dbName = "film";
}

try {
    $dbh = new PDO("mysql:host=$dbHost", $dbUser, $dbPassword);

    $dbh->exec("CREATE DATABASE IF NOT EXISTS `$dbName`;")
            or die(print_r($dbh->errorInfo(), true));
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}


$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$table = "CREATE TABLE IF NOT EXISTS movie (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(45) DEFAULT NULL,
  mpaa VARCHAR(10) DEFAULT NULL,
  runtime INT(11) DEFAULT NULL,
  release_year int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB";
$db->exec($table);

echo "ok";

?>