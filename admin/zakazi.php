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
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	
<div style="text-align: center;">
<a href="../admin.php">Админка</a>
<table style="border:solid 2px;text-align: center;">
<tr>
	<td style="border:solid 2px;">Номер заказа</td> 
	<td style="border:solid 2px;">Блюдо</td>
	<td style="border:solid 2px;">Количество</td>
		

</tr>  
<?php
				$sql=$pdo->prepare("SELECT * FROM zakaz");
				$sql->execute();
				$res = $sql->fetchAll(PDO::FETCH_OBJ);
				foreach ($res as $resu) { 
?>


<tr>
	<td style="border:solid 2px;"><?php echo $resu->numberz ?></td> 
	<td style="border:solid 2px;"><?php echo $resu->dish ?>
	<td style="border:solid 2px;"><?php echo $resu->kolvo ?>
	</td>							
</tr>
<?php } ?>
</table>
							
</div>



</body>
</html>