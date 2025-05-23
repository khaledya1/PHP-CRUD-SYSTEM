<?php

include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_POST['send'])){
    $full_name = $_POST['full_name'];
    $country = $_POST['country'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $image_name = rand(0,255) . rand(0,255) . time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";


    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 
    'image/jpg', 'image/bmp', 'image/svg+xml'];

    if (in_array($_FILES['image']['type'], $allowed_types)) {
        move_uploaded_file($tmp_name, $location);
    } else {
        if(empty($_FILES['image']['type'])){
            $image_name = "def.jpg" ;
            move_uploaded_file($tmp_name, $location);
        }
        else{
        die("File type not allowed");
    }
    }

    $insert = "INSERT INTO customers VALUES(NULL , '$full_name' 
    , '$country' , $age , '$phone' , '$image_name' , '$gender')";        
    $i = mysqli_query($connect,$insert);

    $_SESSION['message'] = "Customer created successfully!";
    header("Location: /CRUD/customers/create_customers.php");
    exit();
    }
    if (isset($_SESSION['message'])) {
    header("Refresh: 2; URL=/CRUD/customers/create_customers.php");
    }
    ## Check if the form is submitted
?>


<h1 class="text-center my-3">Create Customer</h1>
<div class="container col-9 ">
<div class="card  ">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif ?>
    <a class="btn mb-3 btn-info float-end " href="./customers_list.php">List All Customers</a>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" class="form-control" name="full_name">
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" name="country">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" name="age">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label>Customer Image</label>
                <input type="file" accept="image/*" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        <button class="btn btn-info my-3" name="send" type="submit" >submit</button>
        </form>
    </div>
</div>
</div>
<?php include_once '../shared/script.php' ?>
