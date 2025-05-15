<?php 
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_GET['view'])){
    $id = $_GET['view'];
    $read = "SELECT * FROM view_orders_details WHERE order_id = $id";
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
            <h5>Full Name: <?=$row['full_name']?></h5><hr>
            <h5>country: <?=$row['country']?></h5><hr>
            <h5>age: <?=$row['age']?></h5><hr>
            <h5>phone: <?=$row['phone']?></h5><hr>
            <h5>gender: <?=$row['gender']?></h5><hr>
            <h5>title: <?=$row['title']?></h5><hr>
            <h5>price: <?=$row['price']?></h5><hr>
        </div>
    </div>
</div>
