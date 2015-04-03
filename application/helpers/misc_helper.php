<?php 

function die_pre($data)
{
	die('<pre>'.print_r($data, true).'</pre>');
}

function pre($data)
{
	echo '<pre>'.print_r($data, true).'</pre>';
}

//ESTA FUNCION CONVIERTE UN OBEJTO RESULT SQL EN ARRAY
function objectSQL_to_array($object_sql)
{
	//OBJETO QUE DEVUELVE LA FUNCION (ARRAY)
	$obj_array = array();
	$i = 0;
	//POR CADA ELEMENTO DEL OBJETO DE SQL
	foreach ($object_sql as $key => $value) 
	{
		$aux_array = array();
		foreach ($value as $k => $v) 
		{
			$aux_array[$k] = $v;
		}
		$obj_array[$i++] = $aux_array;
	}

	return $obj_array;
}

function SQL_to_array($object_sql)
{
	$array = array();
	foreach ($object_sql as $key => $value) 
	{
		$array[$key] = $value;
	}

	return $array;
}

//CREA UN NUEVO SLUG
	function createSlug($incoming_string){        
        $tofind = "ÀÁÂÄÅàáâäÒÓÔÖòóôöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,";
        $replac = "AAAAAaaaaOOOOooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn ";
        $string =  utf8_encode(strtr(utf8_decode($incoming_string), 
                                utf8_decode($tofind),
                                $replac));
        $string =  strtolower($string);
        $string = str_replace(' ', '-', $string);

        return $string;
    } 

?>