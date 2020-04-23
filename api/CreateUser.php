<?php

include './includes/db.inc.php';
$error = 'none';

try {
    // get json data
    $data = json_decode(file_get_contents('php://input'));
    $username = $data->username;
    $email = $data->email;
    $password = $data->password;
    $shopkeeper = $data->shopkeeper;

    //verify data
    if (empty($username) || empty($name) || empty($email) || empty($password) || empty($address) || empty($creditinfo) || empty($shopkeeper)) {
        throw new Exception('Empty field.');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email.');
    }
    if (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        throw new Exception('Invalid username.');
    }
    if (!preg_match('/^[a-zA-Z]*$/', $name)) {
        throw new Exception('Invalid name');
    }
    if (!preg_match('/^[0-9]*$/', $name) || strlen($name) < 15 || strlen($name) > 19) {
        throw new Exception('Invalid credit card info');
    }
    if (!filter_var($shopkeeper, FILTER_VALIDATE_BOOLEAN)) {
        throw new Exception('Invalid shop keeper');
    }

    // create sql querie
    $sql = 'INSERT user_account (username, name, email, password, address, creditinfo, shopkeeper, dateCreated) VALUES(?, ?, ?, ?, ?, ?, ?, NOW())';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssssssi', $username, $name, $email, $password, $address, $creditinfo, ($shopkeeper ? 1 : 0));
        mysqli_stmt_execute($stmt);
    } else {
        throw new Exception('MySQL error.');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{ "error": "'.$error.'" }';
}
