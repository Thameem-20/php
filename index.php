<?php
$insert = false;
if(isset($_POST['name'])){

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
    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "inserted successfully";
        $insert = true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>welcome to Pace travel form</h1>
        <p>enter your details to confirm</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter Your name"><br>
            <input type="text" name="age" id="age" placeholder="enter Your age"><br>
            <input type="number" name="phone" id="phone" placeholder="enter Your phone number"><br>
            <textarea name="desc" id="desc" placeholder="any other information here"></textarea><br>
            <button class="btn">submit</button>
            <button class="btn">reset</button>
        </form>
    </div>
    <script src="index.js"></script>

    
</body>
</html>