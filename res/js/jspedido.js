 function ejecutar(){
	$("#wok").hide();
	$("#werror").hide(); 	
	$checkselected=0; 
	document.getElementById('bcat').value ="0"; 
	document.getElementById('categoria').disabled=true;
	bloquear();

	$("#categoria").change(function() {		
		mostrarproductos();
	});


	function mostrarproductos() {		
		$opcion=$("#bcat").val();
		if($opcion==1){
			$categoria = $("#categoria").val();
			$buscar= $("#producto").val();
		}
		if($opcion==0){
			$categoria =0;
			$buscar= $("#producto").val();
		}	
		$.ajax({
			url: ruta+'pedido/listabusquedaproducto',
			type: 'POST',		
			dataType: 'json',
			data: {categoria:$categoria, buscar:$buscar},		
			success: function(e) { 
				$(function(){
						$("#tableproducto").bootstrapTable('destroy');
						$("#tableproducto").show();
						$('#tableproducto').bootstrapTable({
							data: e.datos					
					});
					if($(window).width() < 765){
						$("#tableproducto").bootstrapTable('toggleView');
					}
				});
			}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
	};

	function bloquear(){	
		console.log("g");	
		document.getElementById('btnregpedido').style.display = 'none';		
		document.getElementById('btncantidadnueva').style.display = 'none';	
		//document.getElementById('cantidadnueva').style.display = 'none';
	};

	$("#frmbuscar").submit(
		function(){
			$.ajax({
				url: ruta+'pedido/buscarproducto',
				type: 'POST', 
				dataType: 'json',
				data: $('#frmbuscar').serialize(),
				success:function (e) {					
					console.log(e.ok);
					if(e.error==""){
						$("#wok").show();
						$("#werror").hide();
						$("#mok").html(e.ok);						
						$("#wok").hide(900);						
					}else{
						$("#wok").hide();
						$("#werror").show();
						$("#merror").html(e.error);							
					}
				}
			})
			.done(function() {
				console.log("success");
				mostrarproductos();	
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			return false;
	});

	$("#bcat").on( 'change', function() {
    	if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
	        $checkselected=1;
	        document.getElementById('categoria').disabled=false; 
	        document.getElementById('bcat').value ="1"; 
    	}else{
        // Hacer algo si el checkbox ha sido deseleccionado
	        $checkselected=0;
	        document.getElementById('categoria').disabled=true;
	        document.getElementById('bcat').value ="0"; 
    	}
	});

	$(function () {
	    $('#tableproducto').bootstrapTable().on('check.bs.table', function (e, row) {
	        anadirproductopedido();
	    });
	});

	function existe($id) {
		var datos = $('#tablepedido').bootstrapTable('getRowByUniqueId', $id);
		if(datos == null){
			return 0;
		}
		else{
			return datos.v1;
		}
	}

	function anadirproductopedido(){
		$cantidad = 1;

		var datos = $("#tableproducto").bootstrapTable('getSelections');
		$existe = existe(datos[0].v1);

		var nFilas = $("#tablepedido > tbody").children().length-1;

		if(nFilas>0){
			nFilas=parseInt(nFilas)+parseInt(1);
		}

		if($existe == 0){
			$('#tablepedido').bootstrapTable('insertRow', {
	        index: nFilas,
	        row: {
	            v1: datos[0].v1,
	            v2: datos[0].v2,
	            v3: datos[0].v3,
	            v4: $cantidad,            
	        }
	    	});
		}

		else{
			var datos = $("#tableproducto").bootstrapTable('getSelections');
			
			var rowData = $('#tablepedido').bootstrapTable('getRowByUniqueId', $existe);
			$count=rowData['v4']+1;
			var suma = parseInt(rowData['v4']) + parseInt(1);	
			rowData['v4'] = suma;
			$('#tablepedido').bootstrapTable('updateByUniqueId', { id: $existe, row: rowData})
		}

	}

}