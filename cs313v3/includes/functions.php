<?php

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function attempt_login($username, $password) {

    //echo 'attempt_login ' . $password . ' — ' . $username . '<br/>';
    //var_dump($password);

    $find_user = find_user_by_username($username);
    $user = $find_user[0];

    //echo '<br/><br/>$user: ' . $user;

    if (isset($user)) {
        // found user, now check password
        // echo '<br/>password_check called';
        if (password_check($password, $user['password'])) {
            // password matches
            return $user;
        } else {
            // password does not match
            return false;
        }
    } else {
        // user not found
        return false;
    }
}

function password_check($password, $existing_pass) {
    //var_dump($password);
    //echo '<br>';
    //var_dump($existing_pass);

    if ($password === $existing_pass) {
        //echo '<br/>password match';
        return true;
    } else {
        return false;
    }
}

function find_user_by_username($username) {
    global $db;

    //echo 'find_user_by_username '.$username.'<br/>';

    $safe_username = $db->quote($username);

    //echo 'Safe_Username: '.$safe_username . '<br/>';

    $query = "SELECT * ";
    $query .= "FROM user ";
    $query .= "WHERE username = {$safe_username} ";

    $stmt = $db->prepare($query);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();

    //echo 'Var Dump: ';
    //var_dump($result);
    //echo '<br/>Echo Result[username]: '.$result[0]['username'] . 
    //        '<br/>Echo Result[password]: '.$result[0]['password']. 
    //        '<br/>';

    confirm_query($result);

    return $result;
}

function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed.");
    }
}

function logged_in() {
    if ((isset($_SESSION['user_id'])) && ($_SESSION['user_id'] != NULL)) {
        return TRUE;
    } if (($_SESSION['user_id'] == NULL) || ($_SESSION['username']) == NULL) {
        return FALSE;
    } else {
        return FALSE;
    }
}

function confirm_logged_in() {
    $logged = logged_in();
    if ($logged == FALSE) {
        redirect_to("login.php");
    } 
}

function get_scripture_id($book, $chapter, $verse) {
    $query  = 'SELECT id FROM scripture ';
    $query .= 'WHERE book = "' . $book . '" ';
    $query .= 'AND chapter = "' . $chapter . '" ';
    $query .= 'AND verse = "' . $verse . '" ';
    $query .= 'LIMIT 1 ';
            
    $findSid = $db->prepare($query);
    $findSid->execute();
            
    $s_id = $findSid->fetch();
    return $s_id['id'];
}

function get_topic_id($name) {
    $queri  = 'SELECT id FROM topics ';
    $queri .= 'WHERE name = "' . $name . '" ';
    $queri .= 'LIMIT 1 ';
            
    $findTid = $db->prepare($queri);
    $findTid->execute();
            
    $t_id = $findTid->fetch();
    return $t_id['id'];
}


?>