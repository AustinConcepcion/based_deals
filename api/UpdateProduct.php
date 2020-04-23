<?php

include './includes/db.inc.php';
$error = 'none';
$jsonres = '';

try {
    // get json data
    $data = json_decode(file_get_contents('php://input'));
    $pid = $data->pid;
    $productname = htmlspecialchars($data->productname, ENT_QUOTES);
    $price = $data->price;
    $productPic = htmlspecialchars($data->productPic, ENT_QUOTES);
    $description = htmlspecialchars($data->description, ENT_QUOTES);
    $category = htmlspecialchars($data->category, ENT_QUOTES);

    //verify data
    if (empty($productname) || empty($price) || empty($productPic) || empty($description) || empty($category)) {
        throw new Exception('Empty field.');
    }
    if (!filter_var(($productPic), FILTER_VALIDATE_URL)) {
        throw new Exception('Invalid product pic.');
    }
    if (!filter_var($price, FILTER_VALIDATE_FLOAT)) {
        throw new Exception('Invalid price');
    }
    if (!filter_var($pid, FILTER_VALIDATE_INT)) {
        throw new Exception('Invalid product id');
    }

    // create sql querie
    $sql = 'UPDATE product SET productname = ?,  price = ?, productPic = ?, description = ?, category = ? WHERE pid = ?';
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sdsssi', $productname, $price, $productPic, $description, $category, $pid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            throw new Exception('Product already exists.');
        }

        $jsonres = ', "pid": '.$pid.'';
    } else {
        throw new Exception('MySQL error.');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
} finally {
    echo '{ "error": "'.$error.'"'.$jsonres.'}';
}
