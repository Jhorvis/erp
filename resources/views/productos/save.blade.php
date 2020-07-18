<!DOCTYPE html>
<html>
<head>
	<title>Edición</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style type="text/css">
	body {
		background-color: #EDEDED;
	}
	.area-general {
		background-color: #FFFFFF;
		width: 90%;
		height: 300px;
		margin-left: 5%;
		margin-top: 1%;
	}
	.area{
		width: 80%;
		margin-left: 10%;
		margin-top: 20%;
	}
	label {
		color: red;
	}

	.area-button {
		width: 40%;
		margin-left: 30%;
	}
</style>

<body>
<div class="area-general">
<div class="form-group area">
<?php echo $message ?>

<button class="btn btn-danger" onclick = "cerrar()">¡Cerrar!</button>
</div>
</div>

</body>

<script type="text/javascript">

	setTimeout("window.opener.document.location='http://localhost:8000/products';", 1);

	function cerrar () 
	{
	window.close();
	}


</script>
</html>
