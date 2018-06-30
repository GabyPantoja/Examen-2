<?php
Echo "Iniciando proceso de transferencia de archivo</br>";

//conexion a bd
$servername="localhost";
$username = "root";
$password = "";
$database = "examen_2";

$conexion=mysqli_connect($servername,$username,$password,$database);

//iniciar con la transferencia de archivo
//1.validar si se presioni un submit con un metodo post en el formulario

if(isset($_POST["submit"])){
    echo "</br> Se presiono con un boton submit con metodo POST </br>";
//$_FILES REQUIERE el nombre en el campo del formulario y requiere de un nombre temporal mientras el archivo esta en 
    //transito
    $archivoOrigen= $_FILES["fileToUpload"]["tmp_name"];
    $archivoDestino="gif/".$_FILES["fileToUpload"]["name"];
    echo "El archivo a enviar es : ".$archivoDestino."<br>";
    
    //parte 2
    $imagecreateFileType= pathinfo($archivoDestino, PATHINFO_EXTENSION);
    
     $check = getimagesize($archivoOrigen);
    
    echo "extension del archivo: ".$imagecreateFileType."</br>";
    
    if($imagecreateFileType=="gif"){
        echo "El archivo es un gif <br>";
        
        move_uploaded_file($archivoOrigen,$archivoDestino);
		
        $query= "INSERT INTO viajeros (id_viajero,nombre_viajero, fecha_viajero, url_boletoavion)
			VALUES(NULL, 'Gabriela',  '14_05_2018','".$archivoDestino."');";
        echo "query a ejecutar: ".$query."<br>";
        
        if($query_a_ejecutar=mysqli_query($conexion,$query)){
            echo "query ejecutando correctamente</br>";
            header("refresh:5; url=consulta.php");
        }else {
            echo "query no ejecutado </br>";
        }
    }else{
            echo "el archivo no es un gif </br>";
        }
}
?>