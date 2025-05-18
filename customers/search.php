<?php 
include_once '../shared/config.php';
include_once '../shared/head.php';
include_once '../shared/navbar.php';

$read = "SELECT * FROM customers ORDER BY id DESC ";

$data = mysqli_query($connect,$read);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $select_one = "SELECT * FROM customers WHERE id = $id";
    $data_one = mysqli_query($connect,$select_one);
    $row = mysqli_fetch_assoc($data_one);
    $old_image = $row['image'];
    if ($old_image !== "def.jpg") {
        unlink("./upload/$old_image");
    }
    $delete = "DELETE FROM customers WHERE id = $id ";
    mysqli_query($connect,$delete);
    header("location: /CRUD/customers/customers_list.php");
}

if (isset($_POST['search'])) {
    $search_value = $_POST['search_value'];
    $read = "SELECT * FROM customers WHERE full_name LIKE '%$search_value%' OR phone LIKE '%$search_value%' ORDER BY  id DESC";
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
    $read = "SELECT * FROM customers WHERE full_name LIKE '%$search_value%' OR phone LIKE '%$search_value%'ORDER BY id DESC";
    $data = mysqli_query($connect, $read);
}

if (isset($_SESSION['message'])) {
header("Refresh: 2; URL=/CRUD/customers/customers_list.php");
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
        <a class="btn btn-info float-end mb-3 " href="./customers_list.php">List All Customers</a>
        <div class="card-body">
            <table id="myTable" class="table">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th colspan="3" class="text-center" >Action</th>
                </tr>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['full_name'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td><a href="/CRUD/customers/view_customer.php?view=<?= $item['id'] ?>"
                        class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a onclick="return confirm('Are You Sure')" href="/CRUD/customers/customers_list.php?delete=<?= $item['id'] ?>"
                        class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                        <td><a href="/CRUD/customers/update_customers.php?edit=<?= $item['id'] ?>"
                        class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<?php include_once '../shared/script.php'; ?>   