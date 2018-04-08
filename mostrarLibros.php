<?php
    require_once ('layout/Header.php');
?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Autor</th>
                <th>Título</th>
                <th>Lenguaje</th>
                <th>Editorial</th>
                <th>Año</th>
                <th>Edición</th>
                <th>País</th>
            </tr>
        </thead>
        <?php
            $rutaXML = "xml/libros/";
            $dir = scandir($rutaXML);
            foreach ($dir as $key => $archivo) 
            {
                if ($archivo != "." && $archivo != "..") {
                    if(file_exists($rutaXML.$archivo)){
                        $xml = simplexml_load_file($rutaXML.$archivo);
                        echo "<tr><td class='table-primary' colspan='8'> Libros de " . $xml->libro['creador'] . "</td></tr>";
                        foreach($xml->children() as $libro)
                        {
                            echo "<tr>";
                            echo "<td>".$libro->autor . "</td>";
                            echo "<td>".$libro->titulo . "</td>";
                            echo "<td>".$libro->lenguaje . "</td>";
                            echo "<td>".$libro->informacion->editorial . "</td>";
                            echo "<td>".$libro->informacion->año . "</td>";
                            echo "<td>".$libro->informacion->edicion . "</td>";
                            echo "<td>".$libro->informacion->pais . "</td>";
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