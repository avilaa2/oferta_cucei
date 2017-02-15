<?php
    session_start();
    require_once 'conexion.php';

    $calendario = $_POST['calendario'];

    $sql = '';
    $rol = $_SESSION['rol'];
    $carrera_1;
    $carrera_2;

    if($rol == 'administrador')
    {
        echo 'admin';
        $sql = "select distinct materia from oferta_u." . $calendario . " order by materia";
    }
       
    else
    {
       switch($rol)
        {
            case 'coordinador computacion':
                $carrera_1 = 'COM';
                $carrera_2 = 'INCO';
            break;
            case 'coordinador informatica':
                $carrera_1 = 'INNI';
                $carrera_2 = 'INF';
            break;
            case 'coordinador biomedica':
                $carrera_1 = 'BIM';
                $carrera_2 = 'INBI';
            break;
        }

        
        $sql = "select distinct materia from oferta_u." . $calendario . " as o  " .
        " inner join oferta_u.clave_carrera as c " .
        " on c.clave = o.clave " .
        " where carrera = '$carrera_1' or carrera = '$carrera_2' ".
        " order by materia";
    }

    $result = mysqli_query($con,$sql);

    if($result == false || $result->num_rows == 0)
        $resultados = (object)[];
    else
        $resultados = mysqli_fetch_all($result);

    foreach ($resultados as $key => $value) {
        foreach ($value as $materia) {
           echo '<option value = "' . $materia . '">' . $materia . ' </option>'; 
        }
    }
   
    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>