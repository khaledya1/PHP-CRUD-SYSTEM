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
if (isset($_POST['search'])) {
    $search_value = $_POST['search_value'];
    $read = "SELECT * FROM products WHERE title LIKE '%$search_value%' OR price LIKE '%$search_value%' ORDER BY  id DESC";
    $data = mysqli_query($connect, $read);
    $numRows = mysqli_num_rows($data);
    if ($numRows == 0) {
        $_SESSION['message'] = "No results found for '$search_value'";
    }

}
if (isset($_POST['search'])) {
    $search_value = $_POST['search_value'];
    header("Location: search.php?search_value=" .$search_value);
    exit();
}

if (isset($_GET['search_value'])) {
    $search_value = $_GET['search_value'];
    $read = "SELECT * FROM products WHERE title LIKE '%$search_value%' OR price LIKE '%$search_value%' ORDER BY  id DESC";
    $data = mysqli_query($connect, $read);
}

if (isset($_SESSION['message'])) {
header("Refresh: 2; URL=/CRUD/products/products_list.php");
}

?>

<h1 class="text-center my-3" >Search Result</h1>
<div class="container col-9 ">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif ?>
    <div class="card">
    <a class="btn btn-info mb-3 float-end " href="./products_list.php">List All Products</a>
        <div class="card-body">
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