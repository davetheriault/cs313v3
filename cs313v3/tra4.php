<?php $title = 'Conference DB Tables'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-col l3">&nbsp;</div>
        <div class="w3-col l6">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
            
            <h3 class="w3-red w3-padding w3-margin-0">Team Readiness Activity - W4 - Conference Database</h3>
            
            <div class="w3-black w3-padding" style="font-family: monospace;">
                MariaDB [conferenceDB]> show tables; <br/>
+------------------------+ <br/>
| Tables_in_conferencedb |<br/>
+------------------------+<br/>
| note ***************** |<br/>
| speaker ************** |<br/>
| talk ***************** |<br/>
| user ***************** |<br/>
+------------------------+<br/>
4 rows in set (0.00 sec)<br/>
<br/>
MariaDB [conferenceDB]> describe note;<br/>
+---------+----------+------+-----+---------+----------------+<br/>
| Field * | Type *** | Null | Key | Default | Extra ******** |<br/>
+---------+----------+------+-----+---------+----------------+<br/>
| id **** | int(11) *| NO   | PRI | NULL ** | auto_increment |<br/>
| talk_id | int(11) *| YES  | MUL | NULL ** | ************** |<br/>
| user_id | int(11) *| YES  | MUL | NULL ** | ************** |<br/>
| content | longtext | YES  | --- | NULL ** | ************** |<br/>
| date ** | date *** | YES  | *** | NULL ** | ************** |<br/>
+---------+----------+------+-----+---------+----------------+<br/>
5 rows in set (0.01 sec)<br/>
<br/>
MariaDB [conferenceDB]> describe speaker;<br/>
+------------+-------------+-------+-----+---------+----------------+<br/>
| Field **** | Type ****** | Null *| Key | Default | Extra ******** |<br/>
+------------+-------------+-------+-----+---------+----------------+<br/>
| id ******* | int(11) *** | NO ** | PRI | NULL ** | auto_increment |<br/>
| first_name | varchar(30) | YES * | *** | NULL ** | ************** |<br/>
| last_name  | varchar(30) | YES * | *** | NULL ** | ************** |<br/>
+------------+-------------+----- -+-----+---------+----------------+<br/>
3 rows in set (0.01 sec)<br/>
<br/>
MariaDB [conferenceDB]> describe talk;<br/>
+------------+--------------+------+-----+---------+----------------+<br/>
| Field      | Type         | Null | Key | Default | Extra          |<br/>
+------------+--------------+------+-----+---------+----------------+<br/>
| id         | int(11)      | NO   | PRI | NULL    | auto_increment |<br/>
| conf_date  | date         | YES  |     | NULL    |                |<br/>
| speaker_id | int(11)      | YES  | MUL | NULL    |                |<br/>
| title      | varchar(100) | YES  |     | NULL    |                |<br/>
| content    | longtext     | YES  |     | NULL    |                |<br/>
+------------+--------------+------+-----+---------+----------------+<br/>
5 rows in set (0.01 sec)<br/>
<br/>
MariaDB [conferenceDB]> describe user;<br/>
+----------+-------------+------+-----+---------+----------------+<br/>
| Field    | Type        | Null | Key | Default | Extra          |<br/>
+----------+-------------+------+-----+---------+----------------+<br/>
| id       | int(11)     | NO   | PRI | NULL    | auto_increment |<br/>
| username | varchar(20) | YES  |     | NULL    |                |<br/>
+----------+-------------+------+-----+---------+----------------+<br/>
2 rows in set (0.01 sec)<br/>
<br/>
<br/>
MariaDB [conferenceDB]> show create table user;<br/>
+-------+-------------------------------------------------------+<br/>
| Table | Create Table                                          |<br/>
+-------+-------------------------------------------------------+<br/>
| user  | CREATE TABLE `user` (<br/>
  `id` int(11) NOT NULL AUTO_INCREMENT,<br/>
  `username` varchar(20) DEFAULT NULL,<br/>
  PRIMARY KEY (`id`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |<br/>
+-------+-------------------------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
MariaDB [conferenceDB]> show CREATE TABLE speaker;<br/>
+---------+-----------------------------------------------------+<br/>
| Table   | Create Table                                        |<br/>                                                                                                                                                    |
+---------+-----------------------------------------------------+<br/>
| speaker | CREATE TABLE `speaker` (<br/>
  `id` int(11) NOT NULL AUTO_INCREMENT,<br/>
  `first_name` varchar(30) DEFAULT NULL,<br/>
  `last_name` varchar(30) DEFAULT NULL,<br/>
  PRIMARY KEY (`id`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |<br/>
+---------+-----------------------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
MariaDB [conferenceDB]> show create table talk;<br/>
+-------+-------------------------------------------------------+<br/>
| Table | Create Table                                          |<br/>                                                                                                                                                                                                                                                                                                                                          
+-------+-------------------------------------------------------+<br/>
| talk  | CREATE TABLE `talk` (<br/>
  `id` int(11) NOT NULL AUTO_INCREMENT,<br/>
  `conf_date` date DEFAULT NULL,<br/>
  `speaker_id` int(11) DEFAULT NULL,<br/>
  `title` varchar(100) DEFAULT NULL,<br/>
  `content` longtext,<br/>
  PRIMARY KEY (`id`),<br/>
  KEY `FK_talk_speaker_id` (`speaker_id`),<br/>
  CONSTRAINT `FK_talk_speaker_id` FOREIGN KEY (`speaker_id`) REFERENCES `speaker` (`id`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |<br/>
+-------+-------------------------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
MariaDB [conferenceDB]> show create table note;<br/>
+-------+-------------------------------------------------------+<br/>
| Table | Create Table                                          |<br/>
+-------+-------------------------------------------------------+<br/>
| note  | CREATE TABLE `note` (<br/>
  `id` int(11) NOT NULL AUTO_INCREMENT,<br/>
  `talk_id` int(11) DEFAULT NULL,<br/>
  `user_id` int(11) DEFAULT NULL,<br/>
  `content` longtext,<br/>
  `date` date DEFAULT NULL,<br/>
  PRIMARY KEY (`id`),<br/>
  KEY `FK_note_user_id` (`user_id`),<br/>
  KEY `FK_note_talk_id` (`talk_id`),<br/>
  CONSTRAINT `FK_note_talk_id` FOREIGN KEY (`talk_id`) REFERENCES `talk` (`id`),<br/>
  CONSTRAINT `FK_note_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)<br/>
) ENGINE=InnoDB DEFAULT CHARSET=latin1 |<br/>
+-------+-------------------------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
<br/>

            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>