<?php 
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

$read = "SELECT orders.*, customers.full_name AS customer_name, products.title AS product_name 
         FROM orders 
         JOIN customers ON orders.customer_id = customers.id 
         JOIN products ON orders.product_id = products.id 
         ORDER BY orders.id DESC";

$data = mysqli_query($connect, $read);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM orders WHERE id = $id ";
    mysqli_query($connect, $delete);
    header("location: /CRUD/orders/orders_list.php");
}
?>

<h1 class="text-center my-3">List Orders Table</h1>
<div class="container col-9">
    <div class="card">
        <a class="btn btn-info float-end mb-3" href="./create_order.php">Create New</a>
        <div class="card-body">
            <table id="myTable" class="table">
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Create Date</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th colspan="3" class="text-center">Action</th>
                </tr>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['amount'] ?></td>
                        <td><?= $item['create_date'] ?></td>
                        <td><?= $item['customer_name'] ?></td>
                        <td><?= $item['product_name'] ?></td>
                        <td>
                            <a href="/CRUD/orders/view_order.php?view=<?= $item['id'] ?>" class="btn btn-info">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are You Sure')" href="/CRUD/orders/orders_list.php?delete=<?= $item['id'] ?>" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/CRUD/orders/update_order.php?edit=<?= $item['id'] ?>" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
<?php include_once '../shared/script.php'; ?>