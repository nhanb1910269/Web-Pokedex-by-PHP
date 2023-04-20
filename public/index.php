<?php include '../partials/connect.php'; ?>
<?php
$sqlall = "SELECT id_pkm,name,image,type,type2,height,weight,attack,defense,spattack,spdefense,speed from pokeall";

$data = $pdo->prepare($sqlall);
$data->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <header>
        <?php
        session_start();
        if (isset($_SESSION['dangky'])) {
            echo '<h3>Chào ' . $_SESSION['dangky'] . '</h3>';
            echo '<a href="index.php">Trang chủ</a>';
            echo '<a href="myteam.php">My Team</a>';
            echo '<a href="../public/logout.php">Đăng xuất</a>';
            echo '<a href="doimatkhau.php">Đổi mật khẩu</a>';
            echo '</br>';

            //echo $_SESSION['id_khachhang'];
        } else {
            echo '<a href="login.php">Đăng nhập</a> </br>';
            echo '<a href="adduser.php">Đăng ký</a>';
        }
        ?>
    </header>
    <div class="form">
        
            <table class="table caption-top">
                <h3> Pokedex </h3>
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Type</th>
                        <th scope="col">Type2</th>
                        <th scope="col">Height</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Attack</th>
                        <th scope="col">Defense</th>
                        <th scope="col">Spattack</th>
                        <th scope="col">Spdefense</th>
                        <th scope="col">Speed</th>
                        <th scope="col">QL</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                while ($row = $data->fetch()) {

                    $i++;
                    ?><form method="GET" action="../public/add.php">
                    <tbody>
                        <tr>
                            <th scope="row" class=""><div><input class="name" name="hao"value="<?php echo $id_pkm =$row['id_pkm'];?>"></div>
                            </th>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td><img src="<?php echo $row['image']; ?>" alt=""></td>
                            <td>
                                <?php echo $row['type']; ?>
                            </td>
                            <td>
                                <?php echo $row['type2']; ?>
                            </td>
                            <td>
                                <?php echo $row['height']; ?>
                            </td>
                            <td>
                                <?php echo $row['weight']; ?>
                            </td>
                            <td>
                                <?php echo $row['attack']; ?>
                            </td>
                            <td>
                                <?php echo $row['defense']; ?>
                            </td>
                            <td>
                                <?php echo $row['spattack']; ?>
                            </td>
                            <td class=''>
                                <?php echo $row['spdefense']; ?>
                            </td>
                            <td>
                                <p class='td'>
                                    <?php echo $row['speed']; ?>
                                </p>
                            </td>
                            <td><input class="add" type="submit" value="ADD" name="add"></td>
                        </tr>
                    </tbody>
                    </form>
                <?php } ?>
            </table>



    </div>


</body>

</html>