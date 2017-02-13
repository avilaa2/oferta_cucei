<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<head>
	<style>
		table, th, td {border: 1px solid black;}
		/* Colores por carrera */
		.COM {background-color:  lightseagreen;}
		.INCO {background-color:  dodgerblue;}
		.INF {}
		.INNI {}
		.BIM {}
		.INBI {}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/materias.js"></script>
	
	<title></title>
</head>
<body>
	<?php echo $_SESSION['user'] . ' (' . $_SESSION['rol'] . ')'; ?>
	<h1>Oferta CUCEI</h1>
	<h2>Ver detalle de materias</h2>
	<select name = "cal">
		<option value='2017a' selected>2017A</option>
	</select>

	<select name = "materias"></select>
	<button id="actualizar">Actualizar</button>

	<pre id = "detalle"></pre>
	<pre id = "nrc"></pre>
	<a href="index.php">Regresar</a><br>
	<a href="login.php">Salir</a>
</body>
</html>