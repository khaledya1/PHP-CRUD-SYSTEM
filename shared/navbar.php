<?php
include_once '../shared/config.php';
include_once '../shared/head.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/CRUD/index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/CRUD/customers/customers_list.php">Customers List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CRUD/products/products_list.php">Products List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CRUD/orders/orders_list.php">Orders List</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>
