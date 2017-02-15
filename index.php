<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<head>
	<title>Oferta</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<?php include_once 'layouts/navbar.php'; ?>

		<section id="resumen">
			<div class="container">
			  <div class="jumbotron">
			  	<h2 class="text-center">Resumen</h2>

			    	<div class="row panel_main">

	                    <div class="col-lg-4 col-md-6">
	                        <div class="panel panel-primary">
	                            <div class="panel-heading">
	                                <div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-university fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div class="huge" id="departamentos"></div>
	                                        <div>Cantidad de Departmentos</div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-lg-4 col-md-6">
	                        <div class="panel panel-success">
	                            <div class="panel-heading">
	                                <div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-tasks fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div class="huge" id="edificios"></div>
	                                        <div>Cantidad de Edificios</div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="col-lg-4 col-md-6">
	                        <div class="panel panel-info">
	                            <div class="panel-heading">
	                                <div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-book fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div class="huge" id="materias"></div>
	                                        <div>Cantidad de materias</div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
			    	
			    </div>
			  </div>
			</div>
		</section>

		<section id="options">
			<div class="container">
				<div class="jumbotron">
					<div class="row">
	                    <div class="col-lg-3 col-md-6">
	                        <div class="panel panel-primary">
	                            <div class="panel-heading">
	                                <div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-university fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div>Ver oferta por edificio y salon</div>
	                                    </div>
	                                </div>
	                            </div>
	                            <a href="oferta.php">
	                                <div class="panel-footer">
	                                    <span class="pull-left">Ver Detalle</span>
	                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </a>
	                        </div>
	                    </div>

	                    <div class="col-lg-3 col-md-6">
	                        <div class="panel panel-danger">
	                            <div class="panel-heading">
	                                <div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-book fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div>Ver detalle de materias</div>
	                                    </div>
	                                </div>
	                            </div>
	                            <a href="materias.php">
	                                <div class="panel-footer">
	                                    <span class="pull-left">Ver Detalle</span>
	                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </a>
	                        </div>
	                    </div>

	                    <div class="col-lg-3 col-md-6">
	                        <div class="panel panel-warning">
	                            <div class="panel-heading">
	                                <div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-user-times fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div>Materias sin maestro</div>
	                                    </div>
	                                </div>
	                            </div>
	                            <a href="no_maestro.php">
	                                <div class="panel-footer">
	                                    <span class="pull-left">Ver Detalle</span>
	                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </a>
	                        </div>
	                    </div>

	                    <div class="col-lg-3 col-md-6">
	                        <div class="panel panel-red">
	                            <div class="panel-heading">
	                                <div class="row">
	                                    <div class="col-xs-3">
	                                        <i class="fa fa-window-close-o fa-5x"></i>
	                                    </div>
	                                    <div class="col-xs-9 text-right">
	                                        <div>Materias sin horario</div>
	                                    </div>
	                                </div>
	                            </div>
	                            <a href="no_horario.php">
	                                <div class="panel-footer">
	                                    <span class="pull-left">Ver Detalle</span>
	                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                    <div class="clearfix"></div>
	                                </div>
	                            </a>
	                        </div>
	                    </div>
	                </div>
				</div>
			</div>
		</section>

	
	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
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
		}
    </script>
</body>
</html>