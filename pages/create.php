<?php

include("../connect.php");

$firstname = "";
$lastname="";
$username= "";
$email = "";
$password ="";
$errorMessage = "";
$successMessage = "";

// check if the data have been transimitted using the POST method

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $firstname = $_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username= $_POST['username'];
    $email = $_POST['email'];
    $password =$_POST['password'];

    do{

if(empty($firstname) || empty($lastname) || empty($username) || empty($username) || empty($email) || empty($password)){
    $errorMessage = "All fields are required";
    break;
}
//so if we don't have empty , new student is going to be added into the database

$sql = "INSERT INTO STUDENT (first_name,last_name,username,email,password) VALUES ('$firstname','$lastname','$username','$email','$password')";
$result = $conn->query($sql);

if(!$result){
    $errorMessage = "invalid query".$conn->error;
    break;
}


$firstname = "";
$lastname="";
$username= "";
$email = "";
$password ="";

$successMessage = "Student added successfully!";


header("location:/phpcrud/index.php");
exit;
    }while(false);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Insert New Student</h2>
        <?php
        if(!empty($errorMessage)){
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
                ";
        }
        ?>
        <form  method="POST" class="w-80">
            <input class="form-control" type="text" name="firstname" id="" placeholder="Enter the firstname" value="<?php echo $firstname;?>">
            <input class="form-control" type="text" name="lastname" id="" placeholder="Enter the lastname" value="<?php echo $lastname;?>">
            <input class="form-control" type="text" name="username" id="" placeholder="Enter the username" value="<?php echo $username;?>">
            <input class="form-control" type="email" name="email" id="" placeholder="Enter an email" value="<?php echo $email;?>">
            <input class="form-control" type="password" name="password" id="" placeholder="Enter the password" value="<?php echo $password;?>">
            <?php
            if(!empty($successMessage)){
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Holy $successMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
                ";
            }
            ?>
            <button type="submit" name="save" class="btn btn-primary mt-5"> Save </button>
        </form>
    </div>
    
</body>
</html>