$(document).ready(function(){
	//descomentar cualquiera de las siguientes dos lineas, para que el
	//carrusel se desplace automaticamente cada 3000 milisegundos (3 segundos)
	//setInterval("$('#divIzquierda').click()",3000);
	//setInterval("$('#divDerecha').click()",3000);
	
	//evento clic de la flecha izquierda
	$('#divIzquierda').click(function(){
		//tomamos el ultimo elemento de la lista y lo colocamos en la ultima posicion
		$('#divCentro ul').prepend($('#divCentro ul li:last'));
	});
	
	//evento clic de la flecha derecha
	$('#divDerecha').click(function(){
		//tomamos el primer elemento de la lista y lo trasladamos a la primera posicion
		$('#divCentro ul').append($('#divCentro ul li:first'));
	});

//nav 
  var navigation = responsiveNav(".nav-collapse", {
    animate: true,                    // Boolean: Use CSS3 transitions, true or false
    transition: 284,                  // Integer: Speed of the transition, in milliseconds
    label: "Menu",                    // String: Label for the navigation toggle
    insert: "after",                  // String: Insert the toggle before or after the navigation
    customToggle: "",                 // Selector: Specify the ID of a custom toggle
    closeOnNavClick: true,           // Boolean: Close the navigation when one of the links are clicked
    openPos: "relative",              // String: Position of the opened nav, relative or static
    navClass: "nav-collapse",         // String: Default CSS class. If changed, you need to edit the CSS too!
    navActiveClass: "js-nav-active",  // String: Class that is added to <html> element when nav is active
    jsClass: "js",                    // String: 'JS enabled' class which is added to <html> element
    init: function(){},               // Function: Init callback
    open: function(){},               // Function: Open callback
    close: function(){}               // Function: Close callback
  });




  	/*parallajax*/
	$('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
			&& location.hostname == this.hostname) {
			var $target = $(this.hash);
		$target = $target.length && $target
		|| $('[name=' + this.hash.slice(1) +']');
		if ($target.length) {
			var targetOffset = $target.offset().top;
			$('html,body').animate({scrollTop: targetOffset}, 1000);
			return false;
			}
		}
	});
});
