<?php
    require_once 'conexion.php';

    $edif = $_POST['edificio'];
    $calendario = $_POST['calendario'];

    $sql = "select distinct aula from oferta_u." . $calendario . " where edif = '" . $edif . "' order by aula";

    $result = mysqli_query($con,$sql);

    if($result == false || $result->num_rows == 0)
        $resultados = (object)[];
    else
        $resultados = mysqli_fetch_all($result);

    foreach ($resultados as $key => $value) {
        foreach ($value as $aula) {
           echo '<option value = "' . $aula . '">' . $aula . ' </option>'; 
        }
    }
   
    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>