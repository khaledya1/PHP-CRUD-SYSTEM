<?php

include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

?>

<h1 class="text-center my-3">Create Customer</h1>
<div class="container col-9 ">
<div class="card  ">
    <a class="btn mb-3 btn-info float-end " href="./customers_list.php">List All Customers</a>
    <div class="card-body">
        <form action="./customers_request.php" method="POST" enctype="multipart/form-data">
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