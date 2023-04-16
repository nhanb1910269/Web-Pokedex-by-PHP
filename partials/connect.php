<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=pokedex', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "loi";
}
?>