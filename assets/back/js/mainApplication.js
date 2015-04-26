$(document).ready(function(){
	
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
            	console.log(json);
            	if(json.email)
            		$('#email').removeClass('invalid').addClass('valid').attr('title', 'Email valido.');
            	else
            		$('#email')
            			.removeClass('valid')
            			.addClass('invalid')
            			.attr('title', 'Email invalido.');
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

	var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#usuario" ).autocomplete({
      maxLenght: 2,
      source: function( request, response ) {
      $.ajax({
          url: "usuario/ajax_likeUsers",
          type: 'POST',
          dataType: "json",
          data: $('#form_autocomplete').serialize(),
          success: function( data ) {
            console.log(data);
            console.log($('#usuario').val());
              response( $.map( data, function( item ) {
                  return {
                      label: item.title,
                      value: item.name
                  }
              }));
          }
      });
    }

  });

});