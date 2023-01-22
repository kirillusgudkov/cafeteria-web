<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$user = "root";
	$password = "root";
	$host = "localhost";
	$db = "cafe";
	$pdo=new PDO("mysql:host=$host;dbname=$db", $user, $password);

 	if (isset($_POST["save"]) and !($_FILES['im']['name']==null)) {

			$list=['.php','.zip','.js','.html'];
			foreach($list as $item) {
				if(preg_match("/$item$/",$_FILES['im']['name']))exit("Расширение не подходит");
			}
			$type=getimagesize($_FILES['im']['tmp_name']);
			if ($type && ($type['mime'] != 'image/png' || $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
				if($_FILES['im']['size']<1024*20000) {
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
	$url=$_SERVER['REQUEST_URI'];
	$url=explode('/', $url);
	print_r($url);

	if (isset($_POST["delete"])) {
		$id=$url[4];
  		$sql = "DELETE FROM dishes
                WHERE id = :task_id";
        $q = $pdo->prepare($sql);
        $q->execute([':task_id' => $id]);
	}
	if (isset($_POST["add"])) {
  		$sql = "INSERT INTO dishes (header,type,text,price,filename)
                VALUES('','','','','')";
        $q = $pdo->prepare($sql);
        $q->execute();
        echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/dishes.php">';
        exit();
	}
	$header=$_POST["header"];
	$type=$_POST["type"];
	$text=$_POST["text"];
	$price=$_POST["price"];

	$sql="UPDATE dishes SET header=:header, type=:type, text=:text, price=:price, filename=:filename WHERE id=$url[4]";
	$query=$pdo->prepare($sql);
	echo $url[4];

	$query->execute(["header"=>$header,"type"=>$type, "text"=>$text, "price"=>$price, "filename"=>$_FILES['im']['name']]);
	echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/dishes.php">';


	
?>