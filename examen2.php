<html>
    <head>
    </head>
    <body>
        <form ACTION= 'subir.php' METHOD = "POST"
            ENCTYPE= 'multipart/form-data'>
            
			
			<h1> EXAMEN  2 </h1>
			<form action ="Exam_Insertar.php" method ="GET">
			<label> Nombre_viajero :   </label>
				<!--Campos de texto !-->
			<input type="Text" name ="nombre_viajero" />
			<br>
			<label> Fecha viajero:   </label>
			<input type="Text" name ="fecha_viajerp" />
			<br>
			<label> Url:    </label>
			<input TYPE= 'file' NAME='fileToUpload' ID= 'fileToUpload'/>
			<br>
			
            <input TYPE= 'submit' value='ENVIAR' NAME= 'submit'/>
        </form>
    </body>
</html>