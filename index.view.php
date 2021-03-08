<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<!--<meta name="viewport" content="width=device=width, initial-scale=1, shrink-tofit=no">-->
	<meta name="description" content="">
	<title>Proyecto tonto</title>
	<script type="text/javascript"src="jquery-3.3.1.js"></script>
	<script type="text/javascript"src="jquery-3.5.1.js"></script>
	<script type="text/javascript"src="jquery.dataTables.min.js"></script>
	<script type="text/javascript"src="jquery.dataTables.min.js"></script>
	<script type="text/javascript"src="bootstrap-datepicker.min.js"></script>
	<script type="text/javascript"src="dataTables.buttons.min.js"></script>
	<script type="text/javascript"src="jszip.min.js"></script>
	<script type="text/javascript"src="pdfmake.min.js"></script>
	<script type="text/javascript"src="vfs_fonts.js"></script>
	<script type="text/javascript"src="buttons.html5.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css"></link>	
	<link rel="stylesheet" type="text/css" href="bootstrap-datepicker.min.css"></link>
	<link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css"></link>
	
</head>
<body style="padding-left: 15px">
	<form>
	<br>
	<h1>Lectura de datos</h1>
	<br>
	<div class="form-group form-row">
		<label class="col-sm-1 col-from-label ">Fecha Inicio</label>
		<div class="col-md-2 mb-1">
			<input id="Fecha_inicial" class="form-control form-control-sm datepicker" data-date-format="yyyy-mm-dd" autocomplete="off" required>
		</div>
		<label class="col-sm-1 col-from-label ">Fecha Final</label>
		<div class="col-md-2 mb-1">
			<input id="Fecha_final" class="form-control form-control-sm datepicker" data-date-format="yyyy-mm-dd" autocomplete="off" required>
		</div>
	</div>
	<div class="form-group form-row">
		<label class="col-sm-1 col-from-label ">Buscar</label>
		<input id="Enviar_fecha" class="btn btn-primary" type="button" value="Validar" >
	</div>
	<div id= 'resultado_datos' style="display:none;"></div>
			
	</form>
		
</body>

<script type="text/javascript">
	$('.datepicker').datepicker();
	$('#Fecha_final').datepicker({
		dateFormat: 'yyyy-mm-dd',
		firsDay: 1     
    });

    $('#Fecha_inicial').datepicker({
    	dateFormat: 'yyyy-mm-dd',
    	firsDay: 1
  
    }).on('changeDate',
        function (selected) {
            $('#Fecha_final').datepicker();
            $('#Fecha_final').datepicker();
        }); 

	$(document).on('click','#Enviar_fecha',function(){
		var Fecha_inicial = $('#Fecha_inicial').val();
		var Fecha_final = $('#Fecha_final').val();
		

		console.log(Fecha_inicial+" "+Fecha_final);

		$.ajax({
			url:"consulta.php",
			type: "POST",
			data: {"Fecha_inicial":Fecha_inicial,"Fecha_final":Fecha_final},
			success: function(recibe){


				$("#resultado_datos").html(recibe);
				$("#resultado_datos").css("display","block");

				$("#tableDatos").DataTable({
        			dom: 'Bfrtip',
       				 buttons: [
            			'copyHtml5',
            			'excelHtml5',
            			'csvHtml5',
            			'pdfHtml5'
       				]
    			} );

				console.log(recibe);
				if(recibe==1){
					alert("Falló el servicio");
				}else{
					alert("Busqueda exitosa");

				}

			}
		});

		return false;

	});
	 	
</script>

</html>
