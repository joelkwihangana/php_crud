<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php CRUD using bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2>Student Management system</h2>
        <a href = "pages/create.php"class="btn btn-primary">Insert New Student</a>

 
        <?php 

        //fetch all students from student table

        include("connect.php");

        $sql="SELECT * FROM student order by id desc";

        $result=$conn->query($sql);

        if($result->num_rows > 0){
            //output each data by row
  echo"<table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>First Name</th>
      <th scope='col'>Last Name</th>
      <th scope='col'>username</th>
      <th scope='col'>Email</th>
      <th scope='col'></th>
    </tr>
  </thead>
  <tbody>";
            while($row=$result->fetch_assoc()){
               
              echo " <tr>
      <th scope='row'>".$row["id"]."</th>
      <td>".$row["first_name"]."</td>
      <td>".$row["last_name"]."</td>
      <td>".$row["username"]."</td>
      <td>".$row["email"]."</td>
      <td class='d-flex justify-content-between'><a href='pages/edit.php?id=$row[id]' class='btn btn-success btn-sm'>edit</a ><a href='pages/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>delete</a></td>
    </tr>";
            }
            echo "</tbody></table>";
        }else{
            echo "No results found";
        }


        //close connection
        $conn->close();
        ?>
    </div>
</body>
</html>