<?php
    require_once 'conexion.php';

    $calendario = $_POST['calendario'];
    $materia = $_POST['materia'];

    $sql = "select NRC, ST, DEPARTAMENTO, AREA, MATERIA, O.CLAVE, CARRERA, HRS_TEORIA, HRS_LAB, SECC,
    CUPO, DISP, OCUP, INI, FIN, L, M, I, J, V, S, EDIF, AULA, PROFESOR from oferta_u." . $calendario . " as o
    left join oferta_u.clave_carrera as c
    on o.clave = c.clave 
    where materia = '" . $materia . "' and st = 'A' order by nrc";

    $result = mysqli_query($con,$sql);

    $array = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $array[] = $row;
    }

    echo "<table class='table-bordered'>";
    $first_row = true;
    foreach ($array as $reg)
    {
      $clase = $reg['CARRERA'];

      if ($first_row) 
      {
        $first_row = false;
        echo '<thead><tr>';

        foreach($reg as $key => $field) 
        {
          echo '<th>' . htmlspecialchars($key) . '</th>';
        }
        
        echo '</tr></thead><tbody>';
      }
      echo '<tr class = "' . $clase . '">';

      foreach($reg as $key => $field)
      {
          echo '<td>' . htmlspecialchars($field) . '</td>';
      }
      
      echo '</tr>';
    }
    echo("</tbody></table>");
    

    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>