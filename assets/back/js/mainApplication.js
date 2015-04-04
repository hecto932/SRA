$(document).ready(function(){
	$(".button-collapse").sideNav();
	$(".dropdown-button").dropdown();
	$(".button-collapse").sideNav();
	var myVar = setInterval(function(){ myTimer() }, 1000);

	function getNameDay(day)
	{
		var dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
		return dias[day];
	}

	function formatDay(day)
	{
		if(day < 10)
			return '0' + day;
		else 
			return day;
	}

	function formatMonth(month)
	{
		if(month < 10)
			return '0' + month;
		else 
			return month;
	}

	function myTimer() {
    	var d = new Date();
    	var t = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds() + ' ' + getNameDay(d.getDay()) + ', '  + formatDay(d.getDate()) + ' - ' + formatMonth(d.getMonth() + 1 ) + ' - ' + d.getFullYear(); 
   	 	$('#demo').html(t);
	}

	//AJAX
	$('#email').focusout(function(event) {
		var url = 'usuario/ajax_noExisteEmail';
		$.ajax({
            url:        url,
            type:       'POST',
            dataType:   'json',
            data: $('#form_nuevoUsuario').serialize(),
            success: function(json)
            {
            	if(json.email)
            		$('#email').removeClass('invalid').addClass('valid').attr('title', 'Email valido.');
            	else
            		$('#email').removeClass('valid').addClass('invalid').attr('title', 'Email invalido.');
            }
        });
	});

	//AJAX
	$('#cedula_empleado').focusout(function(event) {
		var url = 'empleado/ajax_noExisteCedula';
		$.ajax({
            url:        url,
            type:       'POST',
            dataType:   'json',
            data: $('#form_nuevoEmpleado').serialize(),
            success: function(json)
            {
            	if(json.cedula)
            		$('#cedula_empleado').removeClass('invalid').addClass('valid').attr('title', 'Cedula valida.');
            	else
            		$('#cedula_empleado').removeClass('valid').addClass('invalid').attr('title', 'Cedula invalida.');
            }
        });
	});

});