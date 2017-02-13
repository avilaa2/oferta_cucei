<?php
    require_once 'conexion.php';

    $edif = $_POST['edificio'];
    $aula = $_POST['aula'];
    $calendario = $_POST['calendario'];

    /*$sql = "select concat('_',ini, fin) as horario, materia, l, m, i, j, v,s from oferta_u.info where edif = 'dedx' and aula = 'a001' order by ini";*/

    $sql = "select ini, materia, l, m, i, j, v,s from oferta_u." . $calendario . " where edif = '" . $edif . "' and aula = '" . $aula . "' and st = 'A' order by ini";

    $result = mysqli_query($con,$sql);

    $array = array();
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
    }

    $ini = array_unique(array_column($array,'ini'));
    $dias = ['l','m','i','j','v','s'];
    //print_r($array);
    //print_r($ini);

    echo '<table>';
    echo '<tr><thead><th>INI</th><th>L</th><th>M</th><th>I</th><th>J</th><th>V</th><th>S</th></tr></thead><tbody>';

    foreach ($ini as $i) {
        echo '<tr><td>' . $i . '</td>';
        foreach ($dias as $j) {
           
            $materias = array();
            foreach ($array as $reg) 
            {
                if($reg['ini'] == $i && $reg[$j] == ucfirst($j))
                {
                    $materias[] = $reg['materia'];
                }
            }
            $n = count(array_unique($materias));
            if($n == 0)
                 echo '<td></td>';
            else if($n == 1)
                echo '<td wrap>' . $materias[0] . '</td>';
            else if($n > 1)
            {
                //echo '<td class = "dup">' . $materias[0] . '</td>';
                echo '<td class = "dup">';
                foreach ($materias as $value) {
                    echo $value . ' | ';
                }
                echo '</td>';
            }
                
            echo '</td>';
        } 
        echo '</tr>';
    }

    echo '</tbody></table>';

    /*$js_array = json_encode($array);
    echo $js_array;*/

   
    if($result)
        mysqli_free_result($result);
 
    mysqli_close($con);
?>