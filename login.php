<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Вход в админку</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://use.fontawesome.com/888b3d4d6b.js"></script>
  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  	<script src="https://kit.fontawesome.com/5e245c1875.js" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<h2 style="text-align: center; padding-top:100px;">Вход</h2>
	<form action="admin/admin.php" method="post" style="text-align: center; padding-top:80px;">
		<div class="form-group" style="padding-bottom:15px;">
			<input type="text" placeholder="Введите логин" name="login">
		</div>
		<div class="form-group" style="padding-bottom:20px;">
			<input type="password" placeholder="Введите пароль" name="password">
		</div>
		<button type="submit" class="btn btn-primary">Войти</button>
		</form>
	
	
</body>
</html>