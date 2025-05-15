<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select = "SELECT * FROM `orders` WHERE id=$id";
    $data = mysqli_query($connect,$select);
    $row = mysqli_fetch_assoc($data);

    if(isset($_POST['update'])){
        $amount = $_POST['amount'];
        $create_date = date('Y-m-d H:i:s');
        $customer_id = $_POST['customer_id'];
        $product_id = $_POST['product_id'];

        $update = "UPDATE orders SET 
                    amount = '$amount', 
                    create_date = '$create_date', 
                    customer_id = '$customer_id', 
                    product_id = '$product_id' 
                    WHERE id = $id";

        if (mysqli_query($connect, $update)) {
            header("location: ./orders_list.php");
            exit();
        } else {
            die("Error updating record: " . mysqli_error($connect));
        }
    }
}
?>

<h1 class="text-center my-3">Update Order</h1>
<div class="container col-9 ">
<div class="card">
    <a class="btn mb-3 btn-info float-end" href="./orders_list.php">List All Orders</a>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label>Amount</label>
                <input type="number" value="<?= $row['amount'] ?>" class="form-control" name="amount" required>
            </div>

            <div class="form-group">
                <label>Customer</label>
                <select class="form-control" name="customer_id" required>
                    <option value="" disabled>Select Customer</option>
                    <?php
                    $customers_query = "SELECT * FROM customers";
                    $customers_data = mysqli_query($connect, $customers_query);
                    while ($customer = mysqli_fetch_assoc($customers_data)) {
                        echo "<option value=\"{$customer['id']}\" " . ($customer['id'] == $row['customer_id'] ? 'selected' : '') . ">{$customer['full_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Product</label>
                <select class="form-control" name="product_id" required>
                    <option value="" disabled>Select Product</option>
                    <?php
                    $products_query = "SELECT * FROM products";
                    $products_data = mysqli_query($connect, $products_query);
                    while ($product = mysqli_fetch_assoc($products_data)) {
                        echo "<option value=\"{$product['id']}\" " . ($product['id'] == $row['product_id'] ? 'selected' : '') . ">{$product['title']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-warning my-3" name="update" type="submit">Update</button>
        </form>
    </div>
</div>
</div>

<?php include_once '../shared/script.php' ?>