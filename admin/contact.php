<?php
session_start();
require_once '../functions/connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Админ панель</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://use.fontawesome.com/888b3d4d6b.js"></script>
  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  	<script src="https://kit.fontawesome.com/5e245c1875.js" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<div style="text-align:center;">
	<?php if(!empty($_SESSION["login"])) :?>
	<?php echo "Вы в админке ".$_SESSION['login']; ?>
	<br>
	<h1>Редактирование основной информации</h1>
	<a href="../admin.php">Админка</a>
	<br>
	<?php
		$sql=$pdo->prepare("SELECT * FROM contact");
		$sql->execute();
		$res=$sql->fetch(PDO::FETCH_OBJ);
	?>

		<form action="/admin/contact/contact.php" method="post" enctype="multipart/form-data">	
		<h3>Название</h3>
		<input type="text" name="sitename" value="<?php echo $res->sitename ?>">
		<h3>Лого</h3>
		<p>
		<input type="file" name="im">
		</p>
		<input type="submit" name ="save" value="Сохранить">
		
	</form>

	<img src="contact/images/<?php echo $res->filename ?>">
	<?php else: 
		echo '<h2>Ты что хакер</h2>';
		echo '<a href="/">Ухади</a>';
	?>
	<?php endif ?>
	</div>
</body>
</html>
