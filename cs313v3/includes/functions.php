<?php

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function attempt_login($username, $password) {
    $user = find_user_by_username($username);
    if ($user) {
        // found user, now check password
        if (password_check($password, $user["hashed_password"])) {
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

function password_check($password, $existing_hash) {
    // existing hash contains format and salt at start
    $hash = crypt($password, $existing_hash);
    if ($hash === $existing_hash) {
        return true;
    } else {
        return false;
    }
}

function find_user_by_username($username) {
    global $db;

    $safe_username = mysqli_real_escape_string($username);


    $query = "SELECT * ";
    $query .= "FROM user ";
    $query .= "WHERE username = '{$safe_username}' ";
    $query .= "LIMIT 1";
    $user_set = $db->query($query);
    var_dump($user_set);
    echo '<br/>'.$username;
    confirm_query($user_set);
    if ($user = mysqli_fetch_assoc($user_set)) {
        return $user;
    } else {
        return null;
    }
}

function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed.");
    }
}

?>