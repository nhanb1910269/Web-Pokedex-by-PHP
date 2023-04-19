<?php
include '../../partials/connect.php';

session_start();
if(isset($_GET['delete'])){
    $idteam=$_GET['hao'];

    $Dsqlteam="DELETE  from team WHERE id_team=?;";
    $Dteam=$pdo->prepare($Dsqlteam);
    $Dteam->execute([
        $idteam,
    ]);
    header("location:../view/myteam.php");
}
else{
    echo "k";
}

?>