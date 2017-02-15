<?php
    require_once 'conexion.php';

    $calendario = $_POST['calendario'];

    $sql = "select ST, NRC, MATERIA, PROFESOR, AULA, INI, FIN from oferta_u." . $calendario . " where profesor like '%()%' and ST = 'A' ";

    $result = mysqli_query($con,$sql);

    $array = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $array[] = $row;
    }

    

    if(count($array) > 0)
    {
    	echo 'Total: ' . count($array);
    	echo "<table class='table-bordered'>";
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
    	echo "No hay materias activas sin profesor";
    }


    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>
