
<?php include '../partials/connect.php'; ?>
<?php   
if(isset($_GET['add'])){
    $idpkm=$_GET['hao'];

    $iduser=$_SESSION['id_khachhang'];
    $sqlteam="SELECT *  WHERE id_pkm=?;";
    $team=$pdo->prepare($sqlteam);
    $team->execute([
        $idpkm,
    ]);
	}
else{
    echo "k";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<header>
	<?php
			session_start();
			if(isset($_SESSION['dangky'])){
			 echo '<h3>Chao,' .$_SESSION['dangky']. '</h3>' ;
			 echo '<a href="index.php">Trang chủ</a>';
			 echo '<a href="myteam.php">MyTeam</a>';
			 echo '<a href="logout.php">Đăng xuất</a>';
			 echo '</br>';

			 //echo $_SESSION['id_khachhang'];
			}else {
				echo '<a href="login.php">Đăng nhập</a> </br>';
				echo '<a href="adduser.php">Đăng ký</a>';
			}
			 ?>
			 </header>
<div class="form">
<h2>Pokemon</h2>
 <div class="table">
   <div class="table-title d-flex pl-2 justify-content-around">
   <div class="">ID</div>
  	<div class="">Tên</div>
      <div class="">Image</div>
    <div class="">Type</div>
    <div class="">Type2</div>
    <div class="">QL</div>



</div>
<hr/>

<form method="GET" action="add.php">  
<div class="d-flex justify-content-around">
	
<div><input class="name" name="hao"value="<?php echo $id_pkm =$row['id_pkm'];?>"></div>
  	<div><?php echo $row['name'];  ?></div>

  <div><img src="<?php echo $row['image'];  ?>" alt=""></div>
  <div><?php echo $row['type'];  ?></div>
  <div><?php echo $row['type2'];  ?></div>
  
  <input class="add"type="submit" value="ADD" name="add">




	</div>
	</form>
	<hr/>

      

    
  

</body>
</html>