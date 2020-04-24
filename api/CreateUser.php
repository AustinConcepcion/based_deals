<?php

include './includes/db.inc.php';
$error = 'none';
//echo 'test<br>';

try {
    // get json data
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $shopkeeper = ('on' == $_POST['shopkeeper']) ? 1 : 0;

    //echo "username:{$username} <br> email:{$email} <br> password:{$password} <br> shopkeeper:{$shopkeeper} <br>";

    //verify data
    if (empty($username) || empty($email) || empty($password) || empty($shopkeeper)) {
        throw new Exception('Empty field.');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email.');
    }
    if (!filter_var($shopkeeper, FILTER_VALIDATE_BOOLEAN)) {
        throw new Exception('Invalid shop keeper');
    }
//
    //// create sql query
    $sql = 'INSERT user_account (username, email, password, shopkeeper, dateCreated) VALUES(?, ?, ?, ?, NOW())';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssi', $username, $email, $password, $shopkeeper);
        mysqli_stmt_execute($stmt);
    //printf('%d Row inserted.<br>', mysqli_stmt_affected_rows($stmt));
        //echo 'success';
    } else {
        throw new Exception('MySQL error.');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{ "error": "'.$error.'" }';
    //header('Location: ../login.html?error='.$error);
}
