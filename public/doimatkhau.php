<?php include '../partials/connect.php';
?>
<?php
session_start();
if ( isset( $_POST[ 'doimatkhau' ] ) ) {
    $taikhoan = $_POST['ten'];
    $matkhau_cu = $_POST[ 'password_cu'];
    $matkhau_moi = $_POST[ 'password_moi' ] ;
    $sql2 = 'SELECT username,password,id from user WHERE username= ? AND password= ?';
    $dlogin = $pdo->prepare( $sql2 );
    $dlogin->execute( [
        $taikhoan,
        $matkhau_cu,
    ] );
    $count = $dlogin->rowCount();
    if ( $count>0 ) {
        $sql_update = 'UPDATE user SET password =?';
        $login2 = $pdo->prepare( $sql_update );
        $login2->execute( [
            $matkhau_moi
        ] );
        echo '<p style="color:green">Mật khẩu đã được thay đổi."</p> </br><a href="index.php">Trang chủ</a>';

    } else {
        echo '<p style="color:red">Tài khoản hoặc mật khẩu cũ không đúng, vui lòng nhập lại."</p>';
    }
}

?>
<form action = '' autocomplete = 'off' method = 'POST'>
<table border = '1' class = 'table-login' style = 'text-align: center;border-collapse: collapse;'>
<tr>
<td colspan = '2'><h3>Đổi mật khẩu </h3></td>
</tr>
<tr>
<td>Tài khoản</td>
<td><input type = 'text' name = 'ten'></td>
</tr>
<tr>
<td>Mật khẩu cũ</td>
<td><input type = 'text' name = 'password_cu'></td>
</tr>
<tr>
<td>Mật khẩu mới</td>
<td><input type = 'text' name = 'password_moi'></td>
</tr>
<tr>

<td colspan = '2'><input type = 'submit' name = 'doimatkhau' value = 'Đổi mật khẩu'></td>
</tr>
</table>
</form>