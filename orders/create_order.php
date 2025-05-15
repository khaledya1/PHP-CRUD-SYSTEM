<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

$customers_query = "SELECT * FROM customers";
$customers_data = mysqli_query($connect, $customers_query);

$products_query = "SELECT * FROM products";
$products_data = mysqli_query($connect, $products_query);

// Handle form submission
if (isset($_POST['send'])) {
    $amount = $_POST['amount'];
    $create_date = date('Y-m-d H:i:s');
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];

    $insert = "INSERT INTO orders (amount, create_date, customer_id, product_id) 
               VALUES ('$amount', '$create_date', '$customer_id', '$product_id')";
    if (mysqli_query($connect, $insert)) {
        $_SESSION['message'] = "Order created successfully!";
        header("Location: /CRUD/orders/create_order.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

if (isset($_SESSION['message'])) {
    header("Refresh: 2; URL=create_order.php");
}
## Check if the form is submitted
?>

<h1 class="text-center my-3">Create Order</h1>
<div class="container col-9">
    <div class="card">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif ?>
        <a class="btn mb-3 btn-info float-end" href="./orders_list.php">List All Orders</a>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" class="form-control" name="amount" required>
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
