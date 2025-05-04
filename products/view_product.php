<?php 
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_GET['view'])){
    $id = $_GET['view'];
    $read = "SELECT * FROM products WHERE id = $id";
    $data = mysqli_query($connect, $read);
    $row = mysqli_fetch_assoc($data);
}

?>

<div class="my-3 container col-md-6">
    <div class="card">
        <a class="btn btn-info float-end mb-3" href="./products_list.php">List All Products</a>
        <div class="card-body">
            <h4 class="text-center my-3">Product ID: <?=$row['id'];?></h4>
            <h5>Title: <?=$row['title']?></h5><hr>
            <h5>Price: <?=$row['price']?></h5><hr>
        </div>
    </div>
</div>
