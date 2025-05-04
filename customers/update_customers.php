<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_GET['edit'])){
    $id =  $_GET['edit'];
    $select = "SELECT * FROM `customers` WHERE id=$id";
    $data = mysqli_query($connect,$select);
    $row = mysqli_fetch_assoc($data);

    if(isset($_POST['update'])){
        $full_name = $_POST['full_name'];
        $country = $_POST['country'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        if(empty($_FILES['image']['name'])){
            $image_name = $row['image'];
        } else {
            $image_name = rand(0,255) . rand(0,255) . time() . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = "./upload/$image_name";

            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 
            'image/jpg', 'image/bmp', 'image/svg+xml'];

            if (in_array($_FILES['image']['type'], $allowed_types)) {
                if (move_uploaded_file($tmp_name, $location)) {
                    $old_image = $row['image'];
                    if (!empty($old_image) && $old_image !== "def.jpg"
                        && file_exists("./upload/$old_image")) {
                        unlink("./upload/$old_image");
                    }
                    
                } else {
                    die("Failed to upload the image.");
                }
            } else {
                die("File type not allowed");
            }
        }

        $update = "UPDATE customers SET 
                    full_name = '$full_name', 
                    country = '$country', 
                    age = '$age', 
                    phone = '$phone', 
                    image = '$image_name', 
                    gender = '$gender' 
                    WHERE id = $id";

        if (mysqli_query($connect, $update)) {
            header("location: /CRUD/customers/customers_list.php");
            exit();
        } else {
            die("Error updating record: " . mysqli_error($connect));
        }
    }
}
?>


<h1 class="text-center my-3">Update Customer</h1>
<div class="container col-9 ">
<div class="card  ">
    <a class="btn mb-3 btn-info float-end " href="./customers_list.php">List All Customers</a>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" value="<?= $row['full_name'] ?>" class="form-control" name="full_name">
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" value="<?= $row['country'] ?>" class="form-control" name="country">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" value="<?= $row['age'] ?>" class="form-control" name="age">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" value="<?= $row['phone'] ?>" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label>Customer Image : <img width="50" src="./upload/<?=$row['image']?>" 
                alt=""> </label>
                <input type="file" accept="image/*" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                <option value="male" <?= strtolower($row['gender']) == 'male' ? 'selected' : '' ?>>Male</option>
                <option value="female" <?= strtolower($row['gender']) == 'female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
        <button class="btn btn-warning my-3" name="update" type="submit" >Update</button>
        </form>
    </div>
</div>
</div>
<?php include_once '../shared/script.php' ?>