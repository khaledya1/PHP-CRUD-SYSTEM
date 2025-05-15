<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_POST['send'])){
    $title = $_POST['title'];
    $price = $_POST['price'];

    $insert = "INSERT INTO products VALUES(NULL , '$title' , $price)";        
    $i = mysqli_query($connect,$insert);
        $_SESSION['message'] = "product created successfully!";
        header("Location: /CRUD/products/create_products.php");
        exit();
}
if (isset($_SESSION['message'])) {
header("Refresh: 2; URL=create_products.php");
}
## Check if the form is submitted
?>

<h1 class="text-center my-3">Create Product</h1>
<div class="container col-9 ">
    <div class="card">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif ?>
    <a class="btn btn-info mb-3 float-end " href="./products_list.php">List All Products</a>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price">
                </div>
            <button class="btn btn-info my-3" name="send" type="submit" >submit</button>
            </form>
        </div>
    </div>
</div>
<?php include_once '../shared/script.php' ?>