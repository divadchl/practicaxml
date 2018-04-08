<?php
    if(file_exists('xml/agenda.xml')){
        echo("el archivo existe");
        $xml = simplexml_load_file('xml/agenda.xml');
        echo $xml->asXML();
    }else{
        echo ("Failed to open file");
    }
?>