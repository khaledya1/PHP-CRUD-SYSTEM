<?php 
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';


if(isset($_GET['view'])){
    $id = $_GET['view'];
    $read = "SELECT * FROM customers WHERE id = $id ";
    $data = mysqli_query($connect,$read);
    $row = mysqli_fetch_assoc($data);
}

?>

<div class=" my-3 container col-md-4 ">
    <div class="card">
    <a class="btn btn-info float-end mb-3 " href="./customers_list.php">List All Customers</a>
        <div class="card-body">
            <h4 class="text-center my-3" > Customer : <?=$row['id'];?> </h4>
            <img  class=" mb-3 img-fluid img-top" src="./upload/<?=$row['image']?>" alt="#">
            <h5> Full Name : <?=$row['full_name']?></h5><hr>
            <h5>Country : <?=$row['country']?></h5><hr>
            <h5> Age : <?=$row['age']?></h5><hr>
            <h5> Phone : <?=$row['phone']?></h5><hr>
            <h5> Gender : <?=$row['gender']?></h5><hr>
        </div>
    </div>
</div>