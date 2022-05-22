/*=============================================
ENLACES PAGINACIÓN
=============================================*/

var url = window.location.href;

var index = url.split("/");

//pasar el 6 a 4 cuando este en un servidor para que funcione el color en la paginacion
var pagCurrent = index[4];

if(isNaN(pagCurrent)){

	$("#item1").addClass("pagination__item--active");

}else{
	
	$("#item"+pagCurrent).addClass("pagination__item--active");	

}