<?php
//INSERT INTO `trip` (`Sno`, `Name`, `Mobile`, `Email`, `Age`, `Gender`, `Comment`, `Date`) VALUES ('1', 'Mohammedsohil Shaikh', '9999999999', 'thisthis@gmail.com', '20', 'Male', 'This is the first comment', current_timestamp());

$insert = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `mytrip`.`trip` (`Name`, `Mobile`, `Email`, `Age`, `Gender`, `Comment`, `Date`) VALUES ('$name', '$phone', '$email', '$age', '$gender', '$desc', current_timestamp())";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter aother information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    
</body>
</html>