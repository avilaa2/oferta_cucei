<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<head>
	<title>Oferta</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script type="text/javascript">
		$.ajax({
	    url: 'php/get_resumen.php',
	    type: 'post',
	    data: {},
	    dataType: 'json',
	    success: function (result) {
	        console.log(result);
	        $("#departamentos").append(result['DEPARTAMENTOS']);
	        $("#edificios").append(result['EDIFICIOS']);
	        $("#materias").append(result['MATERIAS']);
	    },
	    error: function (r1,r2,r3)
	    {
	        console.log(r1 + r2 + r3);
	    }
	    });
    </script>

</head>
<body>
	<?php echo $_SESSION['user'] . ' (' . $_SESSION['rol'] . ')'; ?>
	<h1>Oferta CUCEI</h1>
	<h2>Resumen</h2>
	<div id = "departamentos">Cantidad de departamentos: </div>
	<div id = "edificios">Cantidad de edificios: </div>
	<div id = "materias">Cantidad de materias: </div><br>
	<a href="oferta.php">Ver oferta por edificio y salon</a><br>
	<a href="materias.php">Ver detalle de materias</a><br>
	<a href="no_maestro.php">Materias sin maestro</a><br>
	<a href="no_horario.php">Materias sin horario</a><br>
	<a href="login.php">Salir</a>
</body>
</html>