<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_GET['edit'])){
    $id =  $_GET['edit'];
    $select = "SELECT * FROM `products` WHERE id=$id";
    $data = mysqli_query($connect,$select);
    $row = mysqli_fetch_assoc($data);

    if(isset($_POST['update'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $update = "UPDATE products SET 
                    title = '$title', 
                    price = '$price'
                    WHERE id = $id";

        if (mysqli_query($connect, $update)) {
            header("location: /CRUD/products/products_list.php");
            exit();
        } else {
            die("Error updating record: " . mysqli_error($connect));
        }
    }
}
?>


<h1 class="text-center my-3">Update Product</h1>
<div class="container col-9 ">
<div class="card  ">
    <a class="btn mb-3 btn-info float-end " href="./products_list.php">List All Customers</a>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label>Product Title</label>
                <input type="text" value="<?= $row['title'] ?>" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" value="<?= $row['price'] ?>" class="form-control" name="price">
            </div>
            <button class="btn btn-warning my-3" name="update" type="submit" >Update</button>
        </form>
    </div>
</div>
</div>
<?php include_once '../shared/script.php' ?>