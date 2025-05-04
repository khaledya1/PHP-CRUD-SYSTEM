<?php
 include_once './shared/head.php';
 include_once './shared/navbar.php';
 ?>

<div class="container my-5">
    <h1 class="text-center mb-5">Dashboard</h1>
    <div class="row justify-content-center gap-4">

        <div class="col-md-4">
            <div class="card text-center shadow-lg p-3" style="min-height: 230px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h3 class="card-title mb-3">Customers</h3>
                    <p class="card-text">Manage all customer information.</p>
                    <a href="./customers/customers_list.php" class="btn btn-primary mt-3">Go to Customers</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-lg p-3" style="min-height: 230px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h3 class="card-title mb-3">Products</h3>
                    <p class="card-text">View, add, or update products.</p>
                    <a href="./products/products_list.php" class="btn btn-success mt-3">Go to Products</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-lg p-3" style="min-height: 230px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h3 class="card-title mb-3">Orders</h3>
                    <p class="card-text">Handle all customer orders.</p>
                    <a href="./orders/orders_list.php" class="btn btn-warning mt-3">Go to Orders</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include_once './shared/script.php'; ?>
