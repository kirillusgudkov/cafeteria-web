<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$user = "root";
	$password = "root";
	$host = "localhost";
	$db = "cafe";
	$pdo=new PDO("mysql:host=$host;dbname=$db", $user, $password);

$tovar = $_GET["tovar"];
$kolvo = $_GET["kolvo"];
//echo gettype($tovar), "\n";
//print_r ($tovar);
//print_r ($kolvo);
$numberz = generator();
function generator() {
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; 
	return substr(str_shuffle($permitted_chars), 0, 4);
}

	if (isset($_GET["tovar"])) {
		foreach ($tovar as $k) {
			$key = array_search($k, $tovar);
			$sql = "INSERT INTO zakaz (numberz,dish,kolvo)
            		VALUES('$numberz','$k','$kolvo[$key]')";
        	$q = $pdo->prepare($sql);
        	$q->execute();
		}
	}	
echo $numberz;



    //['numberz'=>$numberz,'tovar'=>$tovar,'kolvo'=>$kolvo]
?>