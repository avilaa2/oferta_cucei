<?php  
	session_start();
	session_destroy();
	
	session_start();
	require_once 'php/conexion.php';

	if (isset($_POST['user']) and isset($_POST['pass'])){
	
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$sql = "select * from oferta_u.users where user = '" . $user . "' and pass = sha('" . $pass . "')";

    	$result = mysqli_query($con,$sql);

		$count = mysqli_num_rows($result);
	
		if ($count == 1)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user'] = $user;
			$_SESSION['rol'] = $row['rol'];

		}
		else
		{
			$fmsg = "Nombre de usuario o contraseña incorrectos.";
		}
	}

	
	if (isset($_SESSION['user']))
	{
		header("Location: index.php");
	}
	else
	{
	
	?>
	
	<!DOCTYPE html>
	<head>
	<title>Oferta</title>
	</head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css">
	<body>
		<div class="main_container">
			<div class="wrapper">
				<h1 class="text-center">Oferta CUCEI</h1>
				<h2 class="text-center">Login</h2>
				<form method="POST">
				<?php if(isset($fmsg)){ echo $fmsg . '<br>'; } ?>
				  Usuario:<br>
				  <input type="text" name="user" required><br>
				  Password:<br>
				  <input type="password" name="pass" required><br><br>
				  <input type="submit" value="Enviar" class="btn btn-success">
				</form>
			</div>
		</div>
		
		<script src="js/jquery-3.1.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>

<?php } ?>