<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$user = "root";
	$password = "root";
	$host = "localhost";
	$db = "cafe";
	$pdo=new PDO("mysql:host=$host;dbname=$db", $user, $password);

	print_r($_FILES);
	print_r($_POST["sitename"]);
	if (isset($_POST["save"]) and !($_FILES['im']['name']==null)) {

			$list=['.php','.zip','.js','.html'];
			foreach($list as $item) {
				if(preg_match("/$item$/",$_FILES['im']['name']))exit("Расширение не подходит");
			}
			$type=getimagesize($_FILES['im']['tmp_name']);
			if ($type && ($type['mime'] != 'image/png' || $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
				if($_FILES['im']['size']<1024*1000) {
					$upload='images/'.$_FILES['im']['name'];

					if (move_uploaded_file($_FILES['im']['tmp_name'], $upload)) echo "Файл загружен";
					else echo "Ошибка при загрузке файла";
				}
				else exit("Размер превышен");
			}
			else exit("Тип файла не подходит");
	
	}
?>

<?php
	$sitename=$_POST["sitename"];
	$sql="UPDATE contact SET sitename=:sitename,filename=:filename";
	$query=$pdo->prepare($sql);
	$query->execute(["sitename"=>$sitename, "filename"=>$_FILES['im']['name']]);
	echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/contact.php">';


	
?>