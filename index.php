<?php
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con){
        die("connection failed due to" . mysqli_connect_error());
    }
    // echo "success connecting to the db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip` ( `name`, `age`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$phone', '$desc', current_timestamp());";
    echo $sql;

    if($con->query($sql) == true){
        echo "inserted successfully";
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
?>