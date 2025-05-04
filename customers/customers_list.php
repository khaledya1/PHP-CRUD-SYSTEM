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

?>

<h1 class="text-center my-3" >List Customers Table</h1>
<div class="container col-9 ">
    <div class="card">
    <a class="btn btn-info float-end mb-3 " href="./create_customers.php">Create New</a>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th colspan="3" class="text-center" >Action</th>
                </tr>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['full_name'] ?></td>
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