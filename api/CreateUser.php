<?php

include './includes/db.inc.php';
$error = 'none';
//echo 'test<br>';

try {
    // get json data
    $username = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $password = password_hash(htmlspecialchars($_POST['password'], ENT_QUOTES), PASSWORD_DEFAULT);
    $shopkeeper = ('on' == $_POST['shopkeeper']) ? 1 : 0;

    echo "username:{$username} <br> email:{$email} <br> password:{$password} <br> shopkeeper:{$shopkeeper} <br>";

    //verify data
    if (empty($username) || empty($email) || empty($password)) {
        throw new Exception('empty_field');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('invalid_email');
    }
//
    //// create sql query
    $sql = 'INSERT user_account (username, email, password, shopkeeper, dateCreated) VALUES(?, ?, ?, ?, NOW())';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssi', $username, $email, $password, $shopkeeper);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('username_already_taken');
        }
        printf('%d Row inserted.<br>', mysqli_stmt_affected_rows($stmt));
    } else {
        throw new Exception('mysql_error');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{"error":'.$error.'}';
    if ('none' != $error) {
        header('Location: ../register.html?error='.$error);
        exit;
    }

    header('Location: ../login.html');
    exit;
}
