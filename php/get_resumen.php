<?php
    require_once 'conexion.php';

    $sql = "select count(distinct departamento) as DEPARTAMENTOS, count(distinct materia) AS MATERIAS, count(distinct edif) AS EDIFICIOS from oferta_u.2017a";

    $result = mysqli_query($con,$sql);

    if($result == false || $result->num_rows == 0)
        $resultados = (object)[];
    else
        $resultados = mysqli_fetch_assoc($result);

    $js_array = json_encode($resultados);
    echo $js_array;
   
    if($result)
        mysqli_free_result($result);

    mysqli_close($con);
?>

