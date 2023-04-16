<?php
include '../partials/connect.php';

session_start();
if(isset($_GET['add'])){
	if(isset($_SESSION['id_dangky'])){
    $idpkm=$_GET['hao'];

    $iduser=$_SESSION['id_khachhang'];
    $sqlteam="INSERT INTO team(id,id_pkm) VALUES (?,?);";
    $team=$pdo->prepare($sqlteam);
    $team->execute([
        $iduser,
        $idpkm,
    ]);
    header("location:myteam.php");
	}else{
		header("location:login.php");
	}
}
else{
    echo "k";
}

?>