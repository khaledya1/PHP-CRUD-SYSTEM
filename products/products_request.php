<?php
    include_once '../shared/config.php';
    include_once '../shared/navbar.php';

    if(isset($_POST['send'])){
        $title = $_POST['title'];
        $price = $_POST['price'];

        $insert = "INSERT INTO products VALUES(NULL , '$title' , $price)";        
        $i = mysqli_query($connect,$insert);

        header("location:./products_list.php");

    }else

?>