<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<script type="text/javascript" src="assets/js/jquery.js"></script>  	
	<script type="text/javascript" src="assets/js/common.js"></script>  	
	
	
</head>
<body>

<div id="container">
<form id="form_ingresar">
	<h1>Ingresar<h1>
	<span>usuario</span>
	<input  type="text" id="usuario" name="usuario">
	<span>password</span>
	<input  type="text" id="password" name="password">
	<input type="button" id="ingresar" value="ingresar">
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