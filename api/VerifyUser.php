<?php

include './includes/db.inc.php';
$error = 'none';
$jsonres = '';

try {
    // get json data
    $data = json_decode(file_get_contents('php://input'));
    $email = $data->email;
    $password = $data->password;

    //verify data
    if (empty($pid)) {
        throw new Exception('Empty field.');
    }
    if (!filter_var($pid, FILTER_VALIDATE_INT)) {
        throw new Exception('Invalid product id.');
    }

    // create sql querie
    $sql = 'SELECT * FROM user_account WHERE email = ?';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck <= 0) {
            throw new Exception('Product not in stock.');
        }

        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $jsonres = ', '.
                        '"productname": "'.htmlspecialchars($row['productname'], ENT_QUOTES).'", '.
                        '"price": '.$row['price'].', '.
                        '"productPic": "'.htmlspecialchars($row['productPic'], ENT_QUOTES).'", '.
                        '"description": "'.htmlspecialchars($row['description'], ENT_QUOTES).'", '.
                        '"category": "'.htmlspecialchars($row['category'], ENT_QUOTES).'" ';
        }
    } else {
        throw new Exception('MySQL error.');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{ "error": "'.$error.'"'.$jsonres.'}';
}
