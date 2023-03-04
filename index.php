<html>
	<head>
		<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="../../assets/img/Favicon-img.png">
		<title>Alejandro Villegas</title>
	</head>
<body>
<div class="cajafuera">
<br>
	<h1 align="center"> Subir imágenes </h1>
	<br>
<form action='' method="post" enctype="multipart/form-data">
		
	<input type="file" name="vai_archivo" >
	<br>
	<br>
	<input type="submit" name="submit" class="botonenviar" value="Guardar archivo">
	<br>
</form>
<?php
$rutacompleta="img/";
if (isset($_FILES['vai_archivo']) && $_FILES['vai_archivo']['size'] > 0) 
	{
		$archivo 		= $_FILES['vai_archivo']['tmp_name'];
		$nombrearchivo 	= $_FILES['vai_archivo']['name'];
		$sizearchivo 	= $_FILES['vai_archivo']['size'];
		$tipoarchivo 	= GetImageSize($archivo);
		// 1=>'GIF'
		// 2=>'JPEG'
		// 3=>'PNG'
 if ($tipoarchivo[2] == 3 || $tipoarchivo[2] == 2) 
	{
 if (move_uploaded_file($archivo, $rutacompleta.$nombrearchivo)) 
	{
		echo "<script> alert(' El archivo se ha cargado con exito.\\n Tamaño de archivo: $sizearchivo bytes.\\n Nombre de imagen: $nombrearchivo.');window.location= 'index.php'</script>";
	} 
 else 
	{
		echo "<script> alert('Error.\\nNo se ha podido cargar el archivo.');window.location='index.php'</script>"; 
	}
 } 
 else 
 {
	 echo "<script> alert('Error.\\nNo es un archivo JPEG o PNG valido.');window.location='index.php'</script>"; 
 }
}
$fileimg = opendir($rutacompleta);
?>
<table>
	<tr>
		<th colspan="5">
			<h1>Lista de imágenes</h1>
		</th>
	</tr>
	<tr>
		<th>Nro</th>
		<th>Imagen</th>
		<th>KB</th>
		<th>Nombre</th>
		<th>Ancho y Altura</th>
	</tr>
<?php
$numerofila = 0;
while ($nombre_imagen=readdir($fileimg)) {
	
if ($nombre_imagen != "." && $nombre_imagen != "..") {
 $sizeimg 		= GetImageSize($rutacompleta.$nombre_imagen);
 $archivokb 	= round((filesize($rutacompleta.$nombre_imagen)/1024),1);
	// [0] => width="290"
    // [1] => height="69"
    // [3] => width="290" height="69"
$numerofila++;
 ?><tr>
		<td width="5%"><?php echo "$numerofila" ?></td>
		<td><?php echo "<img width='150' height='150' src='$rutacompleta$nombre_imagen'"?> </td>
		<td><?php echo "$archivokb"?></td>
		<td width="40%"><?php echo "$nombre_imagen"?></td>
		<td><?php echo "Ancho: $sizeimg[0] y altura: $sizeimg[1] "?></td>
	</tr>
<?php
}
}
closedir($fileimg);
?>
</div>
</body>
</html> 