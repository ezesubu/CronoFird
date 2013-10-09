<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Ingresar una nueva carrera</title>
	<script type="text/javascript" src="assets/js/jquery.js"></script>  	
	<script type="text/javascript" src="assets/js/common.js"></script>
</head>
<body>

<div id="container">
<form enctype="multipart/form-data" action="guardar_carrera" method="POST" >
	<h1>Agregar nueva carrera<h1>
	<span>nombre</span>
	<input  type="text" id="nombre" name="nombre"><br>
	<span>fecha</span>
	<input  type="date" id="fecha" name="fecha"><br>
	<span>Twitter</span>
	<input  type="text" id="twitter" name="twitter"><br>
	<span>Facebok</span>
	<input  type="text" id="facebook" name="facebook"><br>
	<span>Distancia</span>
	<input  type="text" id="distancia" name="distancia"><br>
	<span>Imagen Carrera</span>
	 <input type="hidden" name="imagen_carrera" />
    <!-- Name of input element determines name in $_FILES array -->	 
     <input name="imagen_carrera" type="file" /><br>
     <span>Archivo excel</span>
	 <input type="hidden" name="excel_datos" />
    <!-- Name of input element determines name in $_FILES array -->
    <input name="excel_tados" type="file" /><br><br>
    <input type="submit" id="guardar" value="Guardar carrera">
</form>
</div>
<?php echo base_url() ?>"
<?php echo site_url() ?>
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
	if ( URL==undefined ) {
		URL = Front_URL + "articulos/Buscar";
	}	
	$("#ingresar").on('click', function(){
		console.log('<?php echo site_url() ?>');
		var arrData = Form2Array("form_ingresar");		
		$.post("index.php/app/test", function(data) {
			alert(data);
		});
	})
});
</script>
