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
    $sql = 'SELECT password, uid FROM user_account WHERE email = ?';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        printf('%d Row selected.<br>', mysqli_stmt_num_rows($stmt));
        if (mysqli_stmt_num_rows($stmt) < 1) {
            throw new Exception('username_not_exist');
        }
        $result = mysqli_stmt_get_result($stmt);
        $dpassword = '';
        $uid = 0;
        //while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        //    echo var_dump($row);
        //    $dpassword = $row['password'];
        //    $uid = $row['uid'];
        //}

        //$result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            foreach ($row as $r) {
                echo "{$r} ";
            }
            echo "\n";
        }

        echo "dpassword:{$dpassword} <br> uid:{$uid} <br>";
        if (!password_verify($password, $dpassword)) {
            throw new Exception('invalid_username_or_password');
        }

        if (0 != $uid) {
            if ('on' == $remember) {
                $time = time() + 7 * 24 * 3600;
            } else {
                $time = time() + 2 * 3600;
            }
            setcookie('userid', ${$uid}, $time);
        }
        // expire in 1 hour
    } else {
        throw new Exception('mysql_error');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{"error":'.$error.'}';
    //if ('none' != $error) {
    //    header('Location: ../login.html?error='.$error);
    //    exit;
    //}
//
    //header('Location: ../searchresults.html');
    //exit;
}
