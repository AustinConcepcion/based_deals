<?php

include './includes/db.inc.php';
$error = 'none';
//echo 'test<br>';

$orderid = 0;

try {
    // get json data
    //echo var_dump($_POST).'<br>';
    $name = $_POST['fname'].' '.$_POST['lname'];
    $address = $_POST['address'].', '.$_POST['address2'].', '.$_POST['city'].', '.$_POST['zipcode'].', '.$_POST['state'];
    $creditinfo = $_POST['ccnumber'].', '.$_POST['expiration'].', '.$_POST['cvv'];
    $uid = $_COOKIE['uid'];
    $pid = $_GET['pid'];
    //$username = htmlspecialchars($_POST['name'], ENT_QUOTES);
    //$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    //$password = password_hash(htmlspecialchars($_POST['password'], ENT_QUOTES), PASSWORD_DEFAULT);
    //$shopkeeper = ('on' == $_POST['shopkeeper']) ? 1 : 0;
//
    //// create sql query
    $sql = 'UPDATE user_account SET address = ?, name = ?, creditinfo = ? WHERE uid = ?';
    $stmt1 = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt1, $sql)) {
        mysqli_stmt_bind_param($stmt1, 'sssi', $address, $name, $creditinfo, $uid);
        mysqli_stmt_execute($stmt1);

        printf('%d Row inserted.<br>', mysqli_stmt_affected_rows($stmt1));

        $sql = 'INSERT product_order (uid, pid) VALUES(?, ?)';
        $stmt2 = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt2, $sql)) {
            mysqli_stmt_bind_param($stmt2, 'ii', $uid, $pid);
            mysqli_stmt_execute($stmt2);

            $sql = 'SELECT LAST_INSERT_ID(orderid) from product_order';
            $stmt3 = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt3, $sql)) {
                mysqli_stmt_execute($stmt3);
                $result = mysqli_stmt_get_result($stmt3);
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    $sql = 'INSERT discount_group SET orderid = ? AND uid = ?';
                    $stmt4 = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt4, $sql)) {
                        $orderid = $row[0];
                        mysqli_stmt_bind_param($stmt4, 'ii', $orderid, $uid);
                        mysqli_stmt_execute($stmt4);
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
        header('Location: ../CCinfo.php.php?error='.$error);
        exit;
    }

    header('Location: ../grouppage.php?orderid='.$orderid);
    exit;
}
