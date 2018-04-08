<?php
    require_once ('layout/Header.php');
?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Número Telefónico</th>
                <th>Tipo</th>
                <th>Corre Electrónico</th>
                <th>Calle</th>
                <th>Número</th>
                <th>Colonia</th>
                <th>Estado</th>
            </tr>
        </thead>
        <?php
            $rutaXML ="xml/agenda/";
            $dir = scandir($rutaXML);
            foreach ($dir as $key => $archivo) 
            {
                if ($archivo != "." && $archivo != ".."){
                    if(file_exists($rutaXML.$archivo)){
                        $xml = simplexml_load_file($rutaXML.$archivo);
                            echo "<tr><td class='table-primary' colspan='8'> Agenda de " . $xml->contacto['creador'] . "</td></tr>";
                            foreach($xml->children() as $contacto){
                                echo "<tr>";
                                echo "<td>".$contacto->nombre . "</td>";
                                echo "<td>".$contacto->numero . "</td>";
                                echo "<td>".$contacto->numero['tipo'] . "</td>";
                                echo "<td>".$contacto->email . "</td>";
                                echo "<td>".$contacto->direccion->calle . "</td>";
                                echo "<td>".$contacto->direccion->numero . "</td>";
                                echo "<td>".$contacto->direccion->colonia . "</td>";
                                echo "<td>".$contacto->direccion->estado . "</td>";
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