<?php
// in this file we just need to write only php code
// the delete file will receive the request using the get method

// so here we need to check if the get arrived contains the id or not

if(isset($_GET['id'])){
    //then we can read the id

    $id=$_GET['id'];
    //then we need to connect to the database to delete the student
    //establish the connection to the database
    include("../connect.php");

    $sql="DELETE FROM student WHERE id=$id";
    $result = $conn->query($sql); // this statement allows us to execute the sql query
    
}
//then we need to redirect the user to the indexed page

header("Location:/phpcrud/index.php");
exit;



?>