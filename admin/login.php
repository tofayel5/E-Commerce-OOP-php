<?php include '../classes/AdminLogin.php'?>
<?php
$admin_login = new AdminLogin();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $check_login = $admin_login->adminLogin($user_name, $password);
//    var_dump($check_login);
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
            <span style="color: #ff0000;font-size: 18px">
                <?php
                if (isset($check_login)){
                    echo $check_login;
                }
                ?>
            </span>
			<div>
				<input type="text" placeholder="Enter User Name" required name="user_name"/>
			</div>
			<div>
				<input type="password" placeholder="Enter Password" required name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>