function doaccion() {
	$("#wok").hide();
	$("#werror").hide();
    document.getElementById('dnombre').style.display = 'none';
    		document.getElementById('dapellidos').style.display = 'none';
    		document.getElementById('druc').style.display = 'block';
    		document.getElementById('drz').style.display = 'block';	
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
	$("#tipro").change(function() {
		cambiar();
	});
	function cambiar(){
		$tipo = $("#tipro").val();
		console.log($tipo);
        if($tipo=='1'){			
			document.getElementById('dnombre').style.display = 'none';
    		document.getElementById('dapellidos').style.display = 'none';
    		document.getElementById('druc').style.display = 'block';
    		document.getElementById('drz').style.display = 'block';	
		}

		if($tipo=='2'){			
			document.getElementById('dnombre').style.display = 'block';
    		document.getElementById('dapellidos').style.display = 'block';
    		document.getElementById('druc').style.display = 'none';
    		document.getElementById('drz').style.display = 'none';
		}
};

	
}