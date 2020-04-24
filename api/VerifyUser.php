<?php

include './includes/db.inc.php';
$error = 'none';

try {
    // get json data
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    $remember = htmlspecialchars($_POST['remember'], ENT_QUOTES);

    echo "email:{$email} <br> password:{$password} <br>";

    //verify data
    if (empty($email) || empty($password)) {
        throw new Exception('empty_field');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('invalid_email');
    }

    // create sql querie
    $sql = 'SELECT password, uid, username FROM user_account WHERE email = ?';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $dpassword = '';
        $uid = 0;
        $username = '';
        $count = 0;
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            ++$count;
            $dpassword = $row[0];
            $uid = $row[1];
            $username = $row[2];
        }

        if ($count < 1) {
            throw new Exception('username_not_exist');
        }

        echo "dpassword:{$dpassword} <br> uid:{$uid} <br>";
        if (!password_verify($password, $dpassword)) {
            throw new Exception('invalid_username_or_password');
        }

        if (0 != $uid && !empty($username)) {
            if ('on' == $remember) {
                $time = time() + 7 * 24 * 3600;
            } else {
                $time = time() + 2 * 3600;
            }
            setcookie('uid', $uid, $time, '/based_deals');
            setcookie('username', $username, $time, '/based_deals');
        }
        // expire in 1 hour
    } else {
        throw new Exception('mysql_error');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{"error":'.$error.'}';
    if ('none' != $error) {
        header('Location: ../login.php?error='.$error);
        exit;
    }

    echo 'no error';
    header('Location: ../searchresults.php');
    exit;
}
