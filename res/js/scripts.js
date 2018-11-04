/*BOTON DE NAVEGACION*/
$(document).ready(function() {
	$(".color1").hide();
	$(".color2").hide();
	$(".color3").hide();
	$(".color4").hide();
	pie();
	$('.btnnext').click(function() {
		$('body, html').animate({scrollTop: '0px'}, 300)
	});


	$(window).scroll(function() {
		pie();
		if ($(this).scrollTop() > 0) {
			$('.btnnext').slideDown('slow/100/fast');
		}
		else{
			$('.btnnext').slideUp('slow/100/fast')
		}
	});

});

function pie(){
	if($('body').height() < $(window).height()){
		$('footer').css("position","fixed");
	}
	else{
		$('footer').css("position","relative");		
	}
}