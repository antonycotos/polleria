function doaccion() {
	$("#wok").hide();
	$("#werror").hide();
    document.getElementById('norz').style.display = 'none';
    document.getElementById('aoruc').style.display = 'none';
    document.getElementById('lnorz').style.display = 'none';
    document.getElementById('laoruc').style.display = 'none';

	$("#frmreg").submit(
		function(){
			$.ajax({
				url: ruta+'proveedor/doreg',
				type: 'POST',
				dataType: 'json',
				data: $('#frmreg').serialize(),
				success:function (e) {
					if(e.error==""){
						$("#wok").show();
						$("#werror").hide();
						$("#mok").html(e.ok);
						$("#frmreg")[0].reset();
						$("#wok").hide(3000);

					}else{
						$("#wok").hide();
						$("#werror").show();
						$("#merror").html(e.error);
							alert(e.error);

					}

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
			
			return false;

	}
	);
$("#brMostrar").click(function() {
	$.ajax({
		url: 'trabajador/dolist',
		type: 'POST',
		dataType: 'json',
		data: {},
		success:function(e){
			$(function(){
						$("#tablel").bootstrapTable('destroy');
						$("#tablel").show();
						$('#tablel').bootstrapTable({
							data: e.datos
						});						
						if($(window).width() < 765){
							$("#tablel").bootstrapTable('toggleView');
						}
					}
					);
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
	
}); 
	$("#idtipoproveedorp").change(function() {
		cambiar();
	});
	function cambiar(){
		$tipo = $("#idtipoproveedorp").val();
		console.log($tipo);
        if($tipo=='1'){	
        	document.getElementById('norz').style.display = 'block';
    		document.getElementById('aoruc').style.display = 'block';
    		document.getElementById('lnorz').style.display = 'block';
    		document.getElementById('laoruc').style.display = 'block';

        	document.getElementById('lnorz').innerText ="Razon Social";
			document.getElementById('laoruc').innerText= "RUC";
			$('#aoruc').attr('placeholder','Ingrese Ruc');
			$('#norz').attr('placeholder','Ingrese Razon Social');
			
    		/*document.getElementById('apellidoprov').style.display = 'none';
    		document.getElementById('ruc').style.display = 'block';
    		document.getElementById('razonsocial').style.display = 'block';	*/
		}
		if($tipo=='2'){	
			document.getElementById('norz').style.display = 'block';
    		document.getElementById('aoruc').style.display = 'block';
    		document.getElementById('lnorz').style.display = 'block';
    		document.getElementById('laoruc').style.display = 'block';
    		$('#aoruc').attr('placeholder','Ingrese Apellidos');
    		document.getElementById('lnorz').innerText ="Nombre del Proveedor";
			document.getElementById('laoruc').innerText= "Apellido del Proveedor";
			$('#norz').attr('placeholder','Ingrese Nombres');
			
		}

		else if($tipo!='2' & $tipo!='1' ){
			document.getElementById('norz').style.display = 'none';
		    document.getElementById('aoruc').style.display = 'none';
		    document.getElementById('lnorz').style.display = 'none';
		    document.getElementById('laoruc').style.display = 'none';

		}
};

	
}