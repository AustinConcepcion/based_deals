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
//
    //// create sql query
    $sql = 'UPDATE user_account SET address = ?, name = ?, creditinfo = ? WHERE uid = ?';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssi', $address, $name, $creditinfo, $uid);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('username_already_taken');
        }
        printf('%d Row inserted.<br>', mysqli_stmt_affected_rows($stmt));

    //generate order
    } else {
        throw new Exception('mysql_error');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{"error":'.$error.'}';
    if ('none' != $error) {
        header('Location: ../CCinfo.php.php?error='.$error);
        exit;
    }

    header('Location: ../grouppage.php');
    exit;
}
