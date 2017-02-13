<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
?>
<html>
<head>
	<style>
		.dup {color: red}
		table, th, td {border: 1px solid black;}
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/oferta.js"></script>
	<!--<link href='global.css' rel='stylesheet'>-->
	<title></title>
</head>
<body>
	<?php echo $_SESSION['user'] . ' (' . $_SESSION['rol'] . ')'; ?>
	<h1>Oferta CUCEI</h1>
	<h2>Ver oferta por edificio y salon</h2>
	<select name = "cal">
		<option value='2017a' selected>2017A</option>
	</select>

	<select name = "edificios"></select>
	<select name="aulas"></select>
	<button id="actualizar">Actualizar</button>
	<pre id = "oferta"></pre>
	<a href="index.php">Regresar</a><br>
	<a href="login.php">Salir</a>
</body>
</html>