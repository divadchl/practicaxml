<?php
    require_once ('layout/Header.php');
?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Grupo</th>
                <th>Género</th>
                <th>Nombre del Disco</th>
                <th>Año</th>
                <th>No. Tracks</th>
                <th>Tiempo de Duración</th>
                <th>Sello Discográfico</th>
            </tr>
        </thead>
        <?php
            $rutaXML = "xml/discos/";
            $dir = scandir($rutaXML);
            foreach ($dir as $key => $archivo) 
            {
                if ($archivo != "." && $archivo != "..") {
                    if(file_exists($rutaXML.$archivo)){
                        $xml = simplexml_load_file($rutaXML.$archivo);
                        echo "<tr><td class='table-primary' colspan='8'> Discografía de " . $xml->disco['creador'] . "</td></tr>";
                        foreach($xml->children() as $disco)
                        {
                            echo "<tr>";
                            echo "<td>".$disco->grupo . "</td>";
                            echo "<td>".$disco->genero . "</td>";
                            echo "<td>".$disco->nombredisco . "</td>";
                            echo "<td>".$disco->datos->año . "</td>";
                            echo "<td>".$disco->datos->no_tracks . "</td>";
                            echo "<td>".$disco->datos->tiempoduracion . "</td>";
                            echo "<td>".$disco->datos->sellodiscografico . "</td>";
                            echo"</tr>";
                        }
                    }else{
                        exit('Filed to open file');
                    }
                }
            }
        ?>
    </table>
<?php
    require_once ('layout/Footer.php');
?>