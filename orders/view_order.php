<?php 
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_GET['view'])){
    $id = $_GET['view'];
    $read = "SELECT * FROM orders WHERE id = $id";
    $data = mysqli_query($connect, $read);
    $row = mysqli_fetch_assoc($data);
}

?>

<div class="my-3 container col-md-4">
    <div class="card">
        <a class="btn btn-info float-end mb-3" href="./orders_list.php">List All Orders</a>
        <div class="card-body">
            <h4 class="text-center my-3">Order ID: <?=$row['id'];?></h4>
            <h5>Amount: <?=$row['amount']?></h5><hr>
            <h5>Create Date: <?=$row['create_date']?></h5><hr>
            <h5>Customer: 
                <?php
                    $customer_query = "SELECT * FROM customers WHERE id = {$row['customer_id']}";
                    $customer_data = mysqli_query($connect, $customer_query);
                    $customer = mysqli_fetch_assoc($customer_data);
                    echo $customer['full_name'];
                ?>
            </h5><hr>
            <h5>Product: 
                <?php
                    $product_query = "SELECT * FROM products WHERE id = {$row['product_id']}";
                    $product_data = mysqli_query($connect, $product_query);
                    $product = mysqli_fetch_assoc($product_data);
                    echo $product['title'];
                ?>
            </h5><hr>
        </div>
    </div>
</div>
