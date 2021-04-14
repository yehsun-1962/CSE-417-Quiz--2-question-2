<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Rgistration</title>
</head>
<body class="container">
<br>
<br>
<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: loged_in.php");
}
?>
<h1 class="text-center">Registration</h1>
<br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age</label>
    <input name="age" type="number" class="form-control" id="exampleInputPassword1">
  </div>

  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php          
                if(isset($_POST['submit'])){

                    $connection = mysqli_connect('localhost','root','','exam') or die("not connected". mysqli_error());

                    $username = mysqli_real_escape_string($connection,$_POST['username']);
                    $password = mysqli_real_escape_string($connection,$_POST['password']);  
                    $age = mysqli_real_escape_string($connection,$_POST['age']);  

                    $query = "SELECT username FROM users WHERE username='$username'";
                    $result = mysqli_query($connection,$query) or die("Query Faild");

                    $count = mysqli_num_rows($result);
                    if($count > 0){
                        echo "Username already Exist";
                    }else{
                        $query1 = "INSERT INTO users (username,passwordd,age)
                        VALUES ('$username','$password','$age')";
                        $result2 = mysqli_query($connection,$query1) or die("Query Faild2");
                    }

                    if($result2){
                        header("location: index.php");
                    }


                }

            
            
            ?>
</body>
</html>