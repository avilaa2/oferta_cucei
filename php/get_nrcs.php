<?php
    require_once 'conexion.php';

    $calendario = $_POST['calendario'];
    $materia = $_POST['materia'];

    $sql = "select distinct nrc, secc from oferta_u." . $calendario . " where materia = '" . $materia . "' order by nrc";

    $result = mysqli_query($con,$sql);

    $array = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $array[] = $row;
    }

    echo "<table>";
    $first_row = true;
    foreach ($array as $reg)
    {
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
      echo '<tr>';

      foreach($reg as $key => $field)
      {
          echo '<td>' . '<a href=#>' .  htmlspecialchars($field) . '</a></td>';
      }
      
      echo '</tr>';
    }
    echo("</tbody></table>");
   
    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>