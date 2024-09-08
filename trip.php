<?php
$insert = false;
if (isset($_POST['name'])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $con = mysqli_connect($server, $username, $password);

    // Check connection
    if (!$con) {
        die("Connection failed due to " . mysqli_connect_error());
    }

    // Capture form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    // Insert data into database
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$phone', '$desc', current_timestamp());";

    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "Error: $sql <br> $con->error";
    }
}

// Fetch the records from the database
$con = mysqli_connect("localhost", "root", "", "trip");
$sql = "SELECT * FROM `trip`";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trip form</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <h1>Welcome to Pace Travel Form</h1>
        <p>Enter your details to confirm</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form!</p>";
        }
        ?>

        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name"><br>
            <input type="text" name="age" id="age" placeholder="Enter Your Age"><br>
            <input type="number" name="phone" id="phone" placeholder="Enter Your Phone Number"><br>
            <textarea name="desc" id="desc" placeholder="Any Other Information Here"></textarea><br>
            <button class="btn">Submit</button>
            <button class="btn" type="reset">Reset</button>
        </form>
        </div>

        <!-- Display the fetched data in a table -->
        <h2>Submitted Data</h2>
<div class="container">
<table class="table-primary">
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">Description</th>
                <th scope="col">Submission Time</th>
                
            </tr>
            <?php
            // Check if there are any records to display
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr class='table-primary'>
                            <td>" . $row['sno'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['age'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['desc'] . "</td>
                            <td>" . $row['dt'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </table>
    
</div>

    <script src="index.js"></script>
</body>
</html>
