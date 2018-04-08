<?php
    if(file_exists('xml/agenda.xml')){
        $xml = simplexml_load_file('xml/agenda.xml');
        echo $xml->agenda->contacto->nombre . "<br>";
        echo $xml->agenda->contacto->numero['tipo'] . "<br>";
        echo $xml->agenda->contacto->numero . "<br>";
        echo $xml->agenda->contacto->email . "<br>";
        echo $xml->agenda->contacto->direccion->calle . "<br>";
    }else{
        exit('Filed to open file');
    }
?>