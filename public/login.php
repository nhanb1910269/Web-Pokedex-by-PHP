<?php include '../partials/connect.php';
?>
<?php
session_start();
$message = '';

try {
    if (isset($_POST['login'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {

            $message = '<label>All fields are required</label>';

        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sqllogin = 'SELECT username,password,id from user WHERE username= ? AND password= ?';
        $login = $pdo->prepare($sqllogin);
        $login->execute([
            $username,
            $password,
        ]);
        $count = $login->rowCount();
        $row = $login->fetch();
        //$_SESSION[ 'id_khachhang' ] = $row[ 'id' ];
        if ($count > 0) {
            $_SESSION['id_khachhang'] = $row['id'];
            $_SESSION['dangky'] = $username;

            header('location:index.php');
        } else {
        }
    }
} catch (PDOException $error) {

    $message = $error->getMessage();

}

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
</head>

<body>
    <div class='row'>
        <div class='col-sm-8 offset-sm-2'>

            <div class='mt-2'>
                <div class='alert alert-info' role='alert'>
                </div>
            </div>

            <div class='card'>
                <div class='card-header'>
                    <h3>Đăng nhập thành viên</h3>
                    <?php if (isset($mess)) {
                        echo '<label class="text-danger">' . $message . '</label>';
                    }
                    ?>
                </div>

                <div class='card-body'>
                    <form id='signupForm' method='POST' class='form-horizontal' action='#'>
                        <div class='form-group row'>
                            <label class='col-sm-4 col-form-label' for='username'>Tên đăng nhập</label>
                            <div class='col-sm-5'>
                                <input type='text' class='form-control' id='username' name='username'
                                    placeholder='Tên đăng nhập' />
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label class='col-sm-4 col-form-label' for='password'>Mật khẩu</label>
                            <div class='col-sm-5'>
                                <input type='password' class='form-control' id='password' name='password'
                                    placeholder='Mật khẩu' />
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 offset-sm-4'>
                                <input type='submit' value='Đăng nhập' name='login'>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 offset-sm-4'>
                                <a class='btn btn-light' href='adduser.php'>Đăng ký</a>
                            </div>
                        </div>

                    </form>

</body>

</html>
</body>

</html>