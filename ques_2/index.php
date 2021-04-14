<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Log In</title>
    <style>
     .space{
        margin-top: 23vh;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 10px;
  padding: 10px;
     }
     .cus_text{
        text-shadow: 2px 2px blue;
     }
    </style>
</head>
<body>

<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("location: loged_in.php");
    }


?>
<div class="">
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm space">
        <br>
        <h1 class="text-center cus_text">Log In</h1>
        <br>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <br>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <br>
  
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>
<br>
<a href="registration.php">Registration</a>
<?php

                                if(isset($_POST['submit'])){
                                    $connection = mysqli_connect('localhost','root','','exam') or die("not connected". mysqli_error());
                                    $username = mysqli_real_escape_string($connection,$_POST['username']);
                                    $password = mysqli_real_escape_string($connection,$_POST['password']);
                                $query = "SELECT * FROM users WHERE username='{$username}' AND passwordd = '{$password}'";
                                $result = mysqli_query($connection,$query) or die("Query Faild");
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        session_start();

                                        $_SESSION['username'] = $row['username'];
                                        
                                        header("location: loged_in.php");
                                    }

                                }else{
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo "Username or Password don't match";
                                    echo "</div>";
                                }
                            }

                            ?>
<br>
    </div>
    <div class="col-sm">
      
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
</body>
</html>