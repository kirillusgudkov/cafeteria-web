<?php
session_start();

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once './functions/connect.php';

$sql = $pdo->prepare("SELECT * FROM contact");
$sql -> execute();
$res=$sql->fetch(PDO::FETCH_ASSOC);
//print_r($res);
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/888b3d4d6b.js"></script>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  <title><?php echo $res["sitename"] ?></title>
  <script src="js/jquery-3.6.3.min.js"></script>
  <script src="https://kit.fontawesome.com/5e245c1875.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/style.css">

</head>
<body>
<script src="js/main.js"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #f5ebdc;">    
    <div class="container-fluid">
      <a href="#" class="navbar-brand"><img src="admin/contact/images/<?php echo $res["filename"] ?>"></a>
      <span class="burgername"><?php echo $res["sitename"] ?></span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <button type="button" id="showcart" class="showcart" data-bs-toggle="modal" data-bs-target="#crt">Мой заказ</button>
          </li>
          <li class="nav-item">
            <button type="button" class="otminet">Отменить</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    
    