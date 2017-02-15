<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css">
	
	<title>No Maestro</title>
</head>
<body>
	
	<?php include_once 'layouts/navbar.php'; ?>

	<section id="stand">
		<h2 class="text-center">Materias sin maestro</h2>
		<div class="container">
			<div class="row return">
				<a href="index.php"> <i class="fa fa-reply" aria-hidden="true"></i> Regresar</a>
				<a href="login.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
			</div>
			<div class="row">
				<select name = "cal">
					<option value='2017a' selected>2017A</option>
				</select>

				<button id="actualizar">Actualizar</button>

				<pre id = "no_maestro"></pre>
			</div>
		</div>	
	</section>

	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>

	$(document).ready(function(){
	    var calendario = $("select[name='cal']").val();

	    $("#actualizar").click(function(){
	        $.ajax({
		    url: 'php/get_no_maestro.php',
		    type: 'post',
		    data: {calendario},
		    dataType: 'html',
		    success: function (result) {
		        console.log(result);
		        $("#no_maestro").empty().append(result);
		    },
		    error: function (r1,r2,r3)
		    {
		        console.log(r1 + r2 + r3);
		    }
		    });
	    });
	});
		
	</script>
</body>
</html>