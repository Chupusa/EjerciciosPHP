<!DOCTYPE html>
<html>
<head>
	<title>Calcular edad</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1.custom/jquery-ui.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
</head>
<body>
	<div class="container">
		<h3>Calcular edad automaticamente a partir de la fecha de nacimiento</h3>
		<div class="row">
			<div class="col-sm-3">
				<label>Escribe tu fecha de nacimiento</label>
				<input type="text" id="calendario" name="calendario" class="form-control input-sm" readonly="">

				<span class="label label-success">
					<span id="edadCalculada"></span>
				</span>

			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$("#calendario").datepicker({
			changeMonth: true,
      		changeYear: true,
      		yearRange: '1900:' + 2018,
			dateFormat: "yy-mm-dd"
		});

		$('#calendario').change(function(){
			$.ajax({
				type:"POST",
				data:"fecha=" + $('#calendario').val(),
				url:"php/calcularEdad.php",
				success:function(r){
					$('#edadCalculada').text(r + " años");
				}
			});
		});
	});
</script>