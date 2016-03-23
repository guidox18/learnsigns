$(document).ready(function(){ 
    $('#usuario-clic').on('click',function(){
      $('.sub-items').slideToggle();
    });

    $('#responsive-clic').on('click',function(){
      $('.responsive_items').slideToggle();
    });

	//fondoblack
	$('.fondoblack').on('click',function(){
		  $('.fondoblack').slideToggle(); 
	});
	/*$('.botonvoz').click(function(){
		$('#popupForm').fadeIn('slow');
		$('.popup-overlay').fadeIn('slow');
		$('.popup-overlay').height($(window).height());
		return false;
	});*/

	$('.clic_cerrar_mensaje').on('click',function(){
		  $('.mensaje_gestion').slideToggle(); 
	});
});
