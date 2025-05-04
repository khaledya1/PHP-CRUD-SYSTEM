<?php

    include_once '../shared/config.php';
    include_once '../shared/navbar.php';

    if(isset($_POST['send'])){
        $full_name = $_POST['full_name'];
        $country = $_POST['country'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $image_name = rand(0,255) . rand(0,255) . time() . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./upload/$image_name";

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 
        'image/jpg', 'image/bmp', 'image/svg+xml'];

        if (in_array($_FILES['image']['type'], $allowed_types)) {
            move_uploaded_file($tmp_name, $location);
        } else {
            die("File type not allowed");
        }


        $insert = "INSERT INTO customers VALUES(NULL , '$full_name' 
        , '$country' , $age , '$phone' , '$image_name' , '$gender')";        
        $i = mysqli_query($connect,$insert);
        
        header("location:./customers_list.php");
    

    }else


?>