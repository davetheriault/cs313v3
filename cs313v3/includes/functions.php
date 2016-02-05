<?php

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function attempt_login($username, $password) {
    echo 'attempt_login ' . $password . ' — ' . $username . '<br/>';
    $user = find_user_by_username($username);
    
    echo '<br/><br/>$user: ' . $user;
    
    if (isset($user)) {
        // found user, now check password
        echo '<br/>password_check called';
        if (password_check($password, $user['password'])) {
            // password matches
            return true;
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
 
   
    if ($password === $existing_pass) {
        echo '<br/>password match';
        return true;
    } else {
        return false;
    }
}

function find_user_by_username($username) {
    global $db;

    echo 'find_user_by_username '.$username.'<br/>';
    
    $safe_username = $db->quote($username);
    
    echo 'Safe_Username: '.$safe_username . '<br/>';

    $query = "SELECT * ";
    $query .= "FROM user ";
    $query .= "WHERE username = {$safe_username} ";
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    $result = $stmt->fetchAll();
    
    echo 'Var Dump: ';
    var_dump($result);
    echo '<br/>Echo Result[username]: '.$result[0]['username'] . 
            '<br/>Echo Result[password]: '.$result[0]['password']. 
            '<br/>';
    
    confirm_query($result);
    
    return $result;
}

function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed.");
    }
}

?>