<?php include '../../partials/connect.php'; ?>
<?php 
session_start();

if(isset($_POST['dangky'])){
$username=$_POST['username'];
  $query = 'INSERT INTO user(username,password,email) VALUES (?,?,?)';
  $query2='SELECT username from user WHERE username=?';
  $ktlogin=$pdo->prepare($query2);
  $ktlogin->execute([
	$username,
  ]);
  $count=$ktlogin->rowCount();
  if($count>0){
	echo $mess="Tài khoản đã tồn tại";
  }
else{
try{
  $username=$_POST['username'];
  $sth =$pdo->prepare($query);
  $sth->execute([
    $_POST['username'],
    $_POST['password'],
    $_POST['email'],
  ]);
  $_SESSION['dangky']=$username;
	$_SESSION['id_khachhang']=$pdo->lastInsertId();
} catch(PDOException $e){
  $pdo_error =$e->getMessage();
}}

$_SESSION['dangky']=$username;
echo $_SESSION['id_khachhang'];
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="row">
			<div class="col-sm-8 offset-sm-2">

				<div class="mt-2">
					<div class="alert alert-info" role="alert">
						<?php
							if(isset($mess)){
								echo $mess;
							}
						?>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h3>Đăng ký thành viên</h3>
					</div>
					
					<div class="card-body">
						<form id="signupForm" method="POST" class="form-horizontal" action="#" >
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
								</div>
							</div>

							

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="email">Hộp thư điện tử</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5 offset-sm-4">
								<input type="submit" value="Đăng ký" name="dangky">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5 offset-sm-4">
								<a class="btn btn-light" href="login.php">Đăng Nhập</a>
								</div>
							</div>

						</form>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script type="text/javascript" src="app.js"></script>

	<!---<script type="text/javascript">
		$.validator.setDefaults({
			submitHandler: function () {alert("submitted!");}
	});
	$(document).ready(function() {
		$("#signupForm").validate({
			rules: {
				username: {required: true, minlength : 2},
				password: {required: true, minlength : 5},

				email:{required:true,email:true },
			},
			messages:{
	
				username: {
					required: "ban chua nhap ten dang nhap",
					minlength:"ten dang nhap co it nhat 2 ki tu"
				},
				password:{
					required:"ban chua nhap mat khau",
					minlength: "mat khua co ut nhat 5 ky tu"
				},
				
				email:"khong hop le",

			},
			
			
		});
	});
	</script>
-->
</body>
</html>