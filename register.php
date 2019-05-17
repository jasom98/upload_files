<?php
	include ("database.php");
	$idnumber=$_POST['ide'];
	
	$file_name=$_FILES['photo']['name']; //trae el nombre del archivo
	$file_type=$_FILES['photo']['type']; //trae el tipo de archivo
	$file_size=$_FILES['photo']['size']/1024; //trae el tamaño del archivo
	$file_tmp=$_FILES['photo']['tmp_name']; //trae la ubicacion temporal de la carpeta
	
	//echo $idnumber."<br>".$file_name."<br>".$file_type."<br>".$file_size."<br>".$file_tmp;
	
	move_uploaded_file($_FILES['photo']['tmp_name'],"photos/".$_FILES['photo']['name']);
	//mueve la foto de la carpeta temporal a la carpeta photo
	
	$photo_url_db="photos/".$_FILES['photo']['name'];
	//QUERY
	$sql="INSERT INTO users (id_number,photo) VALUES('$idnumber','$photo_url_db')";
	// EXECUTE QUERY
	$conn->query($sql);
	echo "<script languaje='javascript'>alert('::: El Usuario A Sido Registrado :::')</script>";
	header("Refresh:0;url=index.html");
	
	//como estandarizar 
?>