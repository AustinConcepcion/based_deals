<?php

include './includes/db.inc.php';
$error = 'none';
//echo 'test<br>';

$orderid = 0;
$pid = $_GET['pid'];

try {
    // get json data
    //echo var_dump($_POST).'<br>';
    $name = $_POST['fname'].' '.$_POST['lname'];
    $address = $_POST['address'].', '.$_POST['address2'].', '.$_POST['city'].', '.$_POST['zipcode'].', '.$_POST['state'];
    $creditinfo = $_POST['ccnumber'].', '.$_POST['expiration'].', '.$_POST['cvv'];
    $uid = $_COOKIE['uid'];

    //$username = htmlspecialchars($_POST['name'], ENT_QUOTES);
    //$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    //$password = password_hash(htmlspecialchars($_POST['password'], ENT_QUOTES), PASSWORD_DEFAULT);
    //$shopkeeper = ('on' == $_POST['shopkeeper']) ? 1 : 0;
//
    //// create sql query
    $sql = 'UPDATE user_account SET address = ?, name = ?, creditinfo = ? WHERE uid = ?';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sssi', $address, $name, $creditinfo, $uid);
        mysqli_stmt_execute($stmt);

        //printf('%d Row inserted.<br>', mysqli_stmt_affected_rows($stmt));

        $sql = 'INSERT product_order (uid, pid) VALUES(?, ?)';
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ii', $uid, $pid);
            mysqli_stmt_execute($stmt);
            echo 'product inserted<br>';

            $sql = 'SELECT LAST_INSERT_ID(orderid) from product_order';
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_execute($stmt);
                echo 'get orderid<br>';
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    $sql = 'INSERT discount_group SET orderid = ? AND uid = ?';
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        echo var_dump($row[0]);
                        $orderid = $row[0];
                        mysqli_stmt_bind_param($stmt, 'ii', $orderid, $uid);
                        mysqli_stmt_execute($stmt);
                        echo 'group inserted<br>';
                    }
                }
            }
        }

        //generate order
    } else {
        throw new Exception('mysql_error');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{"error":'.$error.'}';
    if ('none' != $error) {
        header('Location: ../CCinfo.php.php?pid='.$pid.'&error='.$error);
        exit;
    }

    header('Location: ../grouppage.php?orderid='.$orderid.'&pid='.$pid);
    exit;
}
