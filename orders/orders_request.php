<?php
include_once '../shared/config.php';
include_once '../shared/navbar.php';

if (isset($_POST['send'])) {
    $amount = $_POST['amount'];
    $create_date = $_POST['create_date'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];


    $insert = "INSERT INTO orders (amount, create_date, customer_id, product_id) 
               VALUES ('$amount', '$create_date', '$customer_id', '$product_id')";
    if (mysqli_query($connect, $insert)) {
        header("Location: ./orders_list.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
