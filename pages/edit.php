<?php
include ("../connect.php");
    $id="";
    $firstname = "";
    $lastname="";
    $username= "";
    $email = "";
    $password ="";

    $errorMessage = "";
    $successMessage = "";

    // then we check if we received the request using get method or using post method
if($_SERVER["REQUEST_METHOD"]=="GET"){
//GET method: then show the data of the student

if(!isset($_GET["id"])){
    header("Location:/phpcrud/index.php");
    exit;
}
$id = $_GET["id"];
//read the row of the selected student from the database table
$sql="SELECT * FROM STUDENT where id = $id";//read the data of the student having this id
$result=$conn->query($sql);//execute the sql query
$row=$result->fetch_assoc();//read the data of the student from the database table

if(!$row){
    header("Location:/phpcrud/index.php");
    exit;
}//otherwise we can read the data from the database


    $firstname = $row['first_name'];
    $lastname=$row['last_name'];
    $username=$row['username'];
    $email = $row['email'];
    $password = $row['password'];



}else{
    // POST method: then update the data of the student
    $id=$_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username= $_POST['username'];
    $email = $_POST['email'];
    $password =$_POST['password'];

    //then let's check if we don't have any empty fields

    do{
        if(empty($id) ||empty($firstname) || empty($lastname) || empty($username) || empty($username) || empty($email) || empty($password)){
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE student SET first_name='$firstname',last_name='$lastname',email='$email',password='$password' WHERE id=$id";
        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "invalid query: ". $conn->error;
            break; //exit the while loop
        }//otherwise we can display the success message
        $successMessage = "Student updated successfully";

        //redirect the user to the index page and exit the execution of this file

        header('Location:/phpcrud/index.php');

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
            <input type="hidden" name="id" value="<?php echo "$id"; ?>">
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
            <button type="submit" name="save" class="btn btn-primary mt-5"> update student </button>
        </form>
    </div>
    
</body>
</html>