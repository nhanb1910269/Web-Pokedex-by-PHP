
<?php include '../partials/connect.php'; ?>
<?php
session_start();

$sqlall="SELECT * from team WHERE id=?; ";
$iduser=$_SESSION['id_khachhang'];
$data=$pdo->prepare($sqlall);
$data->execute(
    [
        $iduser,
    ]
);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
	<header>
	<?php
			if(isset($_SESSION['dangky'])){
			 echo '<h3>Chao,' .$_SESSION['dangky']. '</h3>' ;
             echo '<a href="index.php">Trang chu</a>';
             echo '<a href="myteam.php">MyTeam</a>';
			 echo '<a href="logout.php">Đăng xuất</a>';
			 echo '</br>';

			 //echo $_SESSION['id_khachhang'];
			}else {
				echo '<a href="login.php">login</a> </br>';
				echo '<a href="adduser.php">regiter</a>';
			}
			 ?>
			 </header>
<div class="form">
<h2 class="d-flex justify-content-center">MyTeam</h2>
 <div class="table">
   <div class="table-title d-flex pl-2 justify-content-around">
   <div class="">ID</div>
  	<div class="">Username</div>
      <div class="">PokemonID</div>
	<div class="">QL</div>


</div>
<?php 
$i=0;
    while ($row=$data->fetch()) {
		
        $i++;   
?>
<form method="GET" action="delete.php">  
<div class="d-flex justify-content-around">
	
<div><input class="add2"name="hao"value="<?php echo $idteam =$row['id_team'];?>"></div>


  <div class="id_dangky"><?php echo $_SESSION['dangky'];  ?></div>
  <div><?php echo $row['id_pkm'];  ?></div>
  


  <input class="add"type="submit" value="Delete" name="delete">

	</div>
	</form>
    <hr/>

      

    
  

<?php    } ?>
</body>
</html>