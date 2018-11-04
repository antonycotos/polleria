function doaccion() {
	$("#wok").hide();
	$("#werror").hide();

	$("#frmreg").submit(
		function(){
			$.ajax({
				url: ruta+'local/doreg',
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
$("#brMostrar").click(function() {

	$.ajax({
		url: 'local/dolist',
		type: 'POST',
		dataType: 'json',
		data: {},
		success:function(e){
			if(e.datos.length>0){
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