
<?php
	session_start();
	require_once '../functions/connect.php';
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);
	$sql=$pdo->prepare("SELECT DISTINCT type FROM types");
	$sql->execute();
	$typed=$sql->fetchAll(PDO::FETCH_OBJ);
	//print_r($typed);
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
	<?php if(!empty($_SESSION["login"])) :?>
	<?php //echo "Вы в админке ".$_SESSION['login']; ?>
	<?php require 'contact/contacts.php' ?>
	<main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<div style="text-align:center;">
	<br>
	<h1>Редактирование меню</h1>
	<br>
	<button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#crt"><i class="fa-solid fa-plus">Добавить блюдо</i></button>
	<!-- Modal -->
	<div class="modal fade" id="crt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Добавить блюдо</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form action="/admin/dishes/dishes.php" method="post">
	        	<div class="form-group">
	        		<input type="text" class="form-control" name="header" placeholder="Название блюда">
	    		</div>
	        	<div class="form-group" style="color:grey; text-align: left;">
	        		<span style="font-weight: normal; text-align: left;">Категория блюда</span> <select style="text-display: center; margin:10px;" name="type">
						<?php
							foreach ($typed as $typedi) { ?>
								<option value="<?php echo $typedi->type; ?>"> <?php echo $typedi->type; ?> </option>
						<?php } ?>
				</div>
	    		<div class="form-group">
	        		<span>Описание</span>
	        		<input type="text" class="form-control" name="text" placeholder="Описание">
	    		</div>
	    		<div class="form-group">
	        		<input type="text" class="form-control" name="price" placeholder="Цена">
	    		</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
	        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

<a href="category.php"><button type="button" class="btn btn-success mt-2">Категории</button></a>


	<section class="main-content"> 
		<div class="container">
			<div class="row">
				<?php
				$sql=$pdo->prepare("SELECT * FROM dishes");
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_OBJ);
				foreach ($res as $resu) { ?>
					<div class="col-xl-6 col-md-4">
						<div class="product-card">
							<form  action="/admin/dishes/dishes.php/<?php echo $resu->id ?>" method="post" enctype="multipart/form-data">
								<div class="product-thumb">
									<a href="#"><img src="dishes/images/<?php echo $resu->filename ?>" alt="товар"></a>
								</div>
								<div class="product-details">
									<p><input type="file" name="im"><br><span>Картинка </span></p>
									<p><input type="text" name="header" value="<?php echo $resu->header ?>"><br><span>Название блюда </span></p>
									<select style="text-display: center;" name="type">
										<?php
										foreach ($typed as $typedi) { ?>
											<option value="<?php echo $typedi->type; ?>"> <?php echo $typedi->type; ?> </option>
										<?php } ?>
									</select>
									<p><span style="color:green; font-weight: bold;">Текущий раздел <?php echo $resu->type ?></span></p>
									<p><input class="disc" type="text" name="text" value="<?php echo $resu->text ?>"><br><span>Описание </span></p>
								</div>
								<div class="product-bottom-details d-flex justify-content-between">
									<div class="product-price">  
										<span>Цена:</span><small><input type="text" name="price" value="<?php echo $resu->price ?>">₽</small>
									</div>
									<div class="product-links">
										<input style="margin-bottom:20px" type="submit" name ="save" value="Сохранить">
										<input style="margin-bottom:20px" type="submit" name ="delete" value="Удалить">
								</form>
								</div>
							</div>
						</div>
					</div>
				<?php }?>
		</div>
</main>


			<?php else: 
				echo '<h2>Ты что хакер</h2>';
				echo '<a href="/">Ухади</a>';
				?>
			<?php endif ?>

<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Переключить первый элемент</a>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Переключить второй элемент</button>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Переключить оба элемента</button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        Некоторый заполнитель для первого компонента сворачивания в этом примере множественного сворачивания. Эта панель по умолчанию скрыта, но открывается, когда пользователь активирует соответствующий триггер.
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        Некоторое содержимое заполнителя для второго компонента сворачивания в этом примере множественного сворачивания. Эта панель по умолчанию скрыта, но открывается, когда пользователь активирует соответствующий триггер.
      </div>
    </div>
  </div>
</div>
</body>
</html>
