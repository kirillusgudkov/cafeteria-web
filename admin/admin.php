<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../functions/connect.php';

$login=$_POST["login"];
$password=$_POST["password"];

$sql = $pdo->prepare("SELECT id,login FROM users WHERE login=:login AND password=:password");
$sql->execute(array('login'=> $login, 'password'=> $password));
$array=$sql->fetch(PDO::FETCH_ASSOC);
print_r($array);

if($array["id"]>0) {
	$_SESSION['login']=$array["login"];
	header('Location:../admin.php');
}
else {
	header('Location:../login.php');
}

?>