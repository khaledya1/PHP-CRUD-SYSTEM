<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';
?>



<h1 class="text-center my-3">Create Product</h1>
<div class="container col-9 ">
    <div class="card">
    <a class="btn btn-info mb-3 float-end " href="./products_list.php">List All Products</a>
        <div class="card-body">
            <form action="./products_request.php" method="POST" enctype="multipart/form-data">
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

