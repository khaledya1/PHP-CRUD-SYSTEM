<?php 
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

$read = "SELECT * FROM products ORDER BY id DESC ";

$data = mysqli_query($connect,$read);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM products WHERE id = $id ";
    mysqli_query($connect,$delete);
    header("location: /CRUD/products/products_list.php");
}

?>

<h1 class="text-center my-3" >List Products Table</h1>
<div class="container col-9 ">
    <div class="card">
    <a class="btn btn-info mb-3 float-end " href="./create_products.php">Create New</a>
        <div class="card-body">
            <form class="form-group my-3" action="./search.php" method="post">
                <div class="row align-items-center">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" id="myInput" name="search_value" class="form-control" placeholder="Search By Title">
                </div>
                <div class="col-md-3">
                    <button type="submit" name="search" class="btn btn-info w-100">Search</button>
                </div>
                </div>
            </form>
            <table id="myTable" class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th colspan="3" class="text-center" >Action</th>
                </tr>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['title'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><a href="/CRUD/products/view_product.php?view=<?= $item['id'] ?>"
                        class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a onclick="return confirm('Are You Sure')" href="/CRUD/products/products_list.php?delete=<?= $item['id'] ?>"
                        class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                        <td><a href="/CRUD/products/update_products.php?edit=<?= $item['id'] ?>"
                        class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
<?php include_once '../shared/script.php'; ?>