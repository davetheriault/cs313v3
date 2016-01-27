<?php $title = 'Conference DB Tables'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-col l3">&nbsp;</div>
        <div class="w3-col l6">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
            
            <h3 class="w3-red w3-padding w3-margin-0">Team Readiness Activity - W4 - Conference Database</h3>
            
            <div class="w3-blockquote">
                MariaDB [conferenceDB]> show tables;
+------------------------+
| Tables_in_conferencedb |
+------------------------+
| note                   |
| speaker                |
| talk                   |
| user                   |
+------------------------+
4 rows in set (0.00 sec)

MariaDB [conferenceDB]> describe note;
+---------+----------+------+-----+---------+----------------+
| Field   | Type     | Null | Key | Default | Extra          |
+---------+----------+------+-----+---------+----------------+
| id      | int(11)  | NO   | PRI | NULL    | auto_increment |
| talk_id | int(11)  | YES  | MUL | NULL    |                |
| user_id | int(11)  | YES  | MUL | NULL    |                |
| content | longtext | YES  |     | NULL    |                |
| date    | date     | YES  |     | NULL    |                |
+---------+----------+------+-----+---------+----------------+
5 rows in set (0.01 sec)

MariaDB [conferenceDB]> describe speaker
    -> ;
+------------+-------------+------+-----+---------+----------------+
| Field      | Type        | Null | Key | Default | Extra          |
+------------+-------------+------+-----+---------+----------------+
| id         | int(11)     | NO   | PRI | NULL    | auto_increment |
| first_name | varchar(30) | YES  |     | NULL    |                |
| last_name  | varchar(30) | YES  |     | NULL    |                |
+------------+-------------+------+-----+---------+----------------+
3 rows in set (0.01 sec)

MariaDB [conferenceDB]> describe talk;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| id         | int(11)      | NO   | PRI | NULL    | auto_increment |
| conf_date  | date         | YES  |     | NULL    |                |
| speaker_id | int(11)      | YES  | MUL | NULL    |                |
| title      | varchar(100) | YES  |     | NULL    |                |
| content    | longtext     | YES  |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
5 rows in set (0.01 sec)

MariaDB [conferenceDB]> describe user;
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id       | int(11)     | NO   | PRI | NULL    | auto_increment |
| username | varchar(20) | YES  |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
2 rows in set (0.01 sec)


MariaDB [conferenceDB]> show create table user
    -> ;
+-------+------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table | Create Table                                                                                                                                                     |
+-------+------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| user  | CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |
+-------+------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.00 sec)

MariaDB [conferenceDB]> show CREATE TABLE speaker;
+---------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table   | Create Table                                                                                                                                                                                                  |
+---------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| speaker | CREATE TABLE `speaker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |
+---------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.00 sec)

MariaDB [conferenceDB]> show create table talk;
+-------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table | Create Table                                                                                                                                                                                                                                                                                                                                                                                    |
+-------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| talk  | CREATE TABLE `talk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_date` date DEFAULT NULL,
  `speaker_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`id`),
  KEY `FK_talk_speaker_id` (`speaker_id`),
  CONSTRAINT `FK_talk_speaker_id` FOREIGN KEY (`speaker_id`) REFERENCES `speaker` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |
+-------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.00 sec)

MariaDB [conferenceDB]> show create table note;
+-------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Table | Create Table                                                                                                                                                                                                                                                                                                                                                                                                                                                                                |
+-------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| note  | CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `talk_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` longtext,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_note_user_id` (`user_id`),
  KEY `FK_note_talk_id` (`talk_id`),
  CONSTRAINT `FK_note_talk_id` FOREIGN KEY (`talk_id`) REFERENCES `talk` (`id`),
  CONSTRAINT `FK_note_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |
+-------+---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
1 row in set (0.00 sec)



            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>