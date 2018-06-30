<html>
	<head>
	
		<title> Modulo de consulta </title>
		
	</head>
	<body>
	<h1> Consultas</h1>
	<?php
	//c1.- Conectar a una BD
	//variables de conexion
	
		$servername="localhost"; 
		$username="root";
		$password=""; 
		$database="examen_2"; 
		 
		
	
	//2.- conectarme a la bd
		$bandera_conexion=true;
		$conexion=mysqli_connect($servername, $username, $password,$database);
		
		//validar conexion
		if($conexion){
			echo "Conexion exitosa</br>";
		}
		else {
			echo "Conexion fallida</br>";
			$bandera_conexion=false;
		}
		
	//2.Ejecutando consulta
	
	
		if($bandera_conexion==true){
			echo "Ejecutanndo query </br>";
			//2.1 Estableciendo el query a ejecutar
			$query="SELECT * FROM viajeros" ;
			echo $query."</br>";
			//2.2 Ejecutando consulta
			$bandera_resultados=true;
			$resultados=mysqli_query($conexion,$query);
			if($resultados){ //si hubo resultados
			echo"Consulta ejecutada con exito </br>";
			}
			else {
				echo "Conexion fallida</br>";
				$bandera_resultados=false;
			}
		}
		else{
			echo "Query no ejecutado </br>";
		}
		
		
		if($bandera_resultados==true){
			$res=mysqli_num_rows($resultados);
			echo"Imprimiendo ".$res. " resultados</br>";
			//2.3 Imprimiendo resultados
			
	
			echo "<table border=1>";
			//echo "<th>id_beca</th>";
			echo "<th>id_viajero</th>";
			echo "<th>nombre_viajero</th>";
			echo "<th>fecha_viajero</th>";
			echo "<th>url_boletoavion </th>";
			
			
			for ($i=0; $i<=$row=mysqli_fetch_array($resultados, MYSQLI_ASSOC);$i++){
				$id_viajero=$row['id_viajero'];
				$nombre_viajero =$row["nombre_viajero"];
				$fecha_viajero=$row["fecha_viajero"];
				$url_boletoavion=$row ["url_boletoavion"];
				
					echo "<tr>";
					echo "<td>".$id_viajero."</td>";
					echo "<td>".$nombre_viajero."</td>";
					echo "<td>".$fecha_viajero."</td>";
					echo "<td>".$url_boletoavion."</td>";
				
				echo "</tr>";
			}
			
			
			
			echo "</table>";
		}
		else {
			echo"Falla Imprimiendo resultados</br>";
		}
	
	
	?>
	</body>


</html>