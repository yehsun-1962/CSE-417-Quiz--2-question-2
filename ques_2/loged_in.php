<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>loged in</title>
</head>
<body class="text-center">
<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location: index.php");
}

?>
    <h1>Hi <?php 
        $username = $_SESSION['username'];
        echo "$username";
    ?></h1>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href="logout.php" class="btn btn-danger">Log Out</a>
</body>
</html>