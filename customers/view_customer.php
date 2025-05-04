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

if(isset($_POST['remove_image'])){
    $id = $_POST['id'];
    $old_image = $_POST['old_image'];
    if ($old_image !== "def.jpg") {
        unlink("./upload/$old_image");
    }
    $update = "UPDATE customers SET 
    image = 'def.jpg' 
    WHERE id = $id";
    if (mysqli_query($connect, $update)) {
    header("location: /CRUD/customers/view_customer.php?view=$id");
    exit();
    } else {
    die("Error updating record: " . mysqli_error($connect));
    }
}

?>

<div class=" my-3 container col-md-4 ">
    <div class="card">
    <a class="btn btn-info float-end mb-3 " href="./customers_list.php">List All Customers</a>
        <div class="card-body">
            <h4 class="text-center my-3" > Customer : <?=$row['id'];?> </h4>
            <img  class=" mb-3 img-fluid img-top" src="./upload/<?=$row['image']?>" alt="#">
            <?php if($row['image'] !== "def.jpg"): ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $row['id'] ?>" >
                <input type="hidden" name="old_image" value="<?= $row['image'] ?>" >
                <button class="btn btn-danger my-3" name="remove_image" >Remove Image</button>
            </form>
            <?php endif ?>
            <h5> Full Name : <?=$row['full_name']?></h5><hr>
            <h5>Country : <?=$row['country']?></h5><hr>
            <h5> Age : <?=$row['age']?></h5><hr>
            <h5> Phone : <?=$row['phone']?></h5><hr>
            <h5> Gender : <?=$row['gender']?></h5><hr>
        </div>
    </div>
</div>