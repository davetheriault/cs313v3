<?php require 'includes/session.php'; ?>

<?php $title = 'Movie DB Tables'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-col l3">&nbsp;</div>
        <div class="w3-col l6">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
            
            <h3 class="w3-red w3-padding w3-margin-0">Personal Activity - W4 - DB Set Up</h3>
            
            <div class="w3-black w3-padding" style="font-family: monospace;">
                MariaDB [dave]> show tables; <br/>
+----------------+<br/>
| Tables_in_dave |<br/>
+----------------+<br/>
| genre ........ |<br/>
| genre2movie .. |<br/>
| movie ........ |<br/>
| user ......... |<br/>
+----------------+<br/>
4 rows in set (0.00 sec)<br/>
<br/>
<br/>
MariaDB [dave]> describe user;<br/>
+----------+-------------+------+-----+---------+----------------+<br/>
| Field .. | Type ...... | Null | Key | Default | Extra ........ |<br/>
+----------+-------------+------+-----+---------+----------------+<br/>
| id ..... | int(11) ... | NO . | PRI | NULL .. | auto_increment |<br/>
| username | varchar(30) | NO . | ... | NULL .. | .............. |<br/>
| password | text ...... | NO . | ... | NULL .. | .............. |<br/>
+----------+-------------+------+-----+---------+----------------+<br/>
3 rows in set (0.01 sec)<br/>
<br/>
<br/>
MariaDB [dave]> show create table user;<br/>
+------++------------------------------------------------------------+<br/>
| Table|| Create Table ............................................. |<br/>
+------++------------------------------------------------------------+<br/>
| user || CREATE TABLE `user` ( .................................... |<br/>
| .... || `id` int(11) NOT NULL AUTO_INCREMENT, .................... |<br/>
| .... || `username` varchar(30) NOT NULL, ......................... |<br/>
| .... || `password` text NOT NULL, ................................ |<br/>
| .... || PRIMARY KEY (`id`) ....................................... |<br/>
| .... || ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ..................... |<br/>
+------++------------------------------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
<br/>
MariaDB [dave]> describe movie;<br/>
+--------------+--------------+------+-----+---------+----------------+<br/>
| Field ...... | Type ....... | Null | Key | Default | Extra ........ |<br/>
+--------------+--------------+------+-----+---------+----------------+<br/>
| id ......... | int(11) .... | NO . | PRI | NULL .. | auto_increment |<br/>
| title ...... | varchar(100) | NO . | ... | NULL .. | .............. |<br/>
| mpaa ....... | varchar(10) .| NO . | ... | NULL .. | .............. |<br/>
| runtime .... | time ....... | NO . | ... | NULL .. | .............. |<br/>
| release_year | year(4) .... | NO . | ... | NULL .. | .............. |<br/>
+--------------+--------------+------+-----+---------+----------------+<br/>
5 rows in set (0.02 sec)<br/>
<br/>
<br/>
MariaDB [dave]> show create table movie;<br/>
+-------+-----------------------------------------+<br/>
| Table | Create Table .......................... |<br/>
+-------+-----------------------------------------+<br/>
| movie | CREATE TABLE `movie` ( ................ |<br/>
| ..... | `id` int(11) NOT NULL AUTO_INCREMENT, . |<br/>
| ..... | `title` varchar(100) NOT NULL, ........ |<br/>
| ..... | `mpaa` varchar(10) NOT NULL, .......... |<br/>
| ..... | `runtime` time NOT NULL, .............. |<br/>
| ..... | `release_year` year(4) NOT NULL, ...... |<br/>
| ..... | PRIMARY KEY (`id`) .................... |<br/>
| ..... | ) ENGINE=InnoDB DEFAULT CHARSET=utf8  . |<br/>
+-------+-----------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
<br/>
MariaDB [dave]> describe genre;<br/>
+---------+-------------+------+-----+---------+----------------+<br/>
| Field . | Type ...... | Null | Key | Default | Extra ........ |<br/>
+---------+-------------+------+-----+---------+----------------+<br/>
| id .... | int(11) ... | NO . | PRI | NULL .. | auto_increment |<br/>
| name .. | varchar(30) | NO . | ... | NULL .. | .............. |<br/>
+---------+-------------+------+-----+---------+----------------+<br/>
2 rows in set (0.00 sec)<br/>
<br/>
<br/>
MariaDB [dave]> show create table genre;<br/>
+-------+--------------+<br/>
| Table | Create Table |<br/>
+-------+-----------------------------------------+<br/>
| genre | CREATE TABLE `genre` ( ................ |<br/>
| ..... | `id` int(11) NOT NULL AUTO_INCREMENT, . |<br/>
| ..... | `name` varchar(30) NOT NULL, .......... |<br/>
| ..... | PRIMARY KEY (`id`) .................... |<br/>
| ..... | ) ENGINE=InnoDB DEFAULT CHARSET=utf8 .. |<br/>
+-------+-----------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
<br/>
MariaDB [dave]> describe genre2movie;<br/>
+----------+---------+------+-----+---------+-------+<br/>
| Field .. | Type .. | Null | Key | Default | Extra |<br/>
+----------+---------+------+-----+---------+-------+<br/>
| genre_id | int(11) | NO . | MUL | NULL .. | ..... |<br/>
| movie_id | int(11) | NO . | MUL | NULL .. | ..... |<br/>
+----------+---------+------+-----+---------+-------+<br/>
2 rows in set (0.02 sec)<br/>
<br/>
<br/>
MariaDB [dave]> show create table genre2movie;<br/>
+-------------+------------------------------+<br/>
| Table ..... | Create Table ............... |<br/>
+-------------+------------------------------+<br/>
| genre2movie | CREATE TABLE `genre2movie` ( |<br/>
| ........... | `genre_id` int(11) NOT NULL, |<br/>
| ........... | `movie_id` int(11) NOT NULL, |<br/>
| ........... | KEY `movie_id` (`movie_id`), |<br/>
|_____________| KEY `genre_id` (`genre_id`), |<br/>
| CONSTRAINT `FK_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre`<br/>
| (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,<br/>
| CONSTRAINT `FK_novie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie`<br/>
| (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION<br/>
| ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ..... |<br/>
+--------------------------------------------+<br/>
1 row in set (0.00 sec)<br/>
<br/>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>