<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'connect.php';




//$id = intval($_GET['id']);
$id=$_GET["id"];
//echo("GOT ID $id");
$sql = $pdo->prepare("SELECT id,header FROM dishes WHERE id=:id");
$sql->execute(array('id'=> $id));
$array=$sql->fetch(PDO::FETCH_ASSOC);
echo($array['header']);



?>