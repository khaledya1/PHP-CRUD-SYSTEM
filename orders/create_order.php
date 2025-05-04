<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

$customers_query = "SELECT * FROM customers";
$customers_data = mysqli_query($connect, $customers_query);

$products_query = "SELECT * FROM products";
$products_data = mysqli_query($connect, $products_query);
?>

<h1 class="text-center my-3">Create Order</h1>
<div class="container col-9 ">
    <div class="card">
        <a class="btn mb-3 btn-info float-end" href="./orders_list.php">List All Orders</a>
        <div class="card-body">
            <form action="./orders_request.php" method="POST">
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>
                <div class="form-group">
                    <label>Create Date</label>
                    <input type="date" class="form-control" name="create_date" required>
                </div>
                <div class="form-group">
                    <label>Customer</label>
                    <select class="form-control" name="customer_id" required>
                        <option value="" disabled selected>Select Customer</option>
                        <?php foreach ($customers_data as $customer): ?>
                            <option value="<?= $customer['id'] ?>"><?= $customer['full_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product</label>
                    <select class="form-control" name="product_id" required>
                        <option value="" disabled selected>Select Product</option>
                        <?php foreach ($products_data as $product): ?>
                            <option value="<?= $product['id'] ?>"><?= $product['title'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button class="btn btn-info my-3" name="send" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../shared/script.php' ?>
