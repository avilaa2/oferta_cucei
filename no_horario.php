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
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>

	$(document).ready(function(){
	    var calendario = $("select[name='cal']").val();

	    $("#actualizar").click(function(){
	        $.ajax({
		    url: 'php/get_no_horario.php',
		    type: 'post',
		    data: {calendario},
		    dataType: 'html',
		    success: function (result) {
		        console.log(result);
		        $("#no_horario").empty().append(result);
		    },
		    error: function (r1,r2,r3)
		    {
		        console.log(r1 + r2 + r3);
		    }
		    });
	    });
	});
		
	</script>
	
	<title></title>
</head>
<body>
	<?php echo $_SESSION['user'] . ' (' . $_SESSION['rol'] . ')'; ?>
	<h1>Oferta CUCEI</h1>
	<h2>Materias sin horario</h2>
	<select name = "cal">
		<option value='2017a' selected>2017A</option>
	</select>

	<button id="actualizar">Actualizar</button>

	<pre id = "no_horario"></pre>
	
	<a href="index.php">Regresar</a><br>
	<a href="login.php">Salir</a>
</body>
</html>