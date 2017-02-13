<?php
    require_once 'conexion.php';

    $calendario = $_POST['calendario'];

    $sql = "select ST, NRC, MATERIA, PROFESOR, AULA, EDIF, INI, FIN from oferta_u." . $calendario . " where INI = '' and ST = 'A' ";

    $result = mysqli_query($con,$sql);

    $array = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $array[] = $row;
    }

    if(count($array) > 0)
    {
        echo 'Total: ' . count($array);
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
	          echo '<td>' . htmlspecialchars($field) . '</td>';
	      }
	      
	      echo '</tr>';
	    }
	    echo("</tbody></table>");
    }
    else
    {
    	echo "No hay materias activas sin horario";
    }


    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>
