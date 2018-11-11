function doaccion() {
	var control=0;
	$("#wok").hide();
	$("#werror").hide();

	function evaluar(){
		 var x =document.forms["frmreg"].elements[3].value;
		if(x.length==0){
			document.forms["frmreg"].elements[3].value=0;
		}
	}
 
	$("#frmreg").submit(	
		function(){
		//evaluar();
		$.ajax({
				url: ruta+'producto/doreg',
				type: 'POST', 
				dataType: 'json',
				data: $('#frmreg').serialize(),
				success:function (e) {
					alert(e.ok);
					console.log(e.ok);
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
	function registrar() {
			$.ajax({
				url: ruta+'producto/doreg',
				type: 'POST', 
				dataType: 'json',
				data: $('#frmreg').serialize(),
				success:function (e) {
					alert(e.ok);
					console.log(e.ok);
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
$("#brMostrar").click(function() {

	$.ajax({
		url: ruta+'local/dolist',
		type: 'POST',
		dataType: 'json',
		data: {},
		success:function(e){
			if(e.datos.length>0){
				alert(e.datos.length);
				$('#table').bootstrapTable({

					data: e.datos
				});
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
	
});
	
}