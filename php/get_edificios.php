<?php
    require_once 'conexion.php';

    $calendario = $_POST['calendario'];

    $sql = "select distinct edif from oferta_u." . $calendario . " order by edif";

    $result = mysqli_query($con,$sql);

    if($result == false || $result->num_rows == 0)
        $resultados = (object)[];
    else
        $resultados = mysqli_fetch_all($result);

    foreach ($resultados as $key => $value) {
        foreach ($value as $edif) {
           echo '<option value = "' . $edif . '">' . $edif . ' </option>'; 
        }
    }
   
    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>