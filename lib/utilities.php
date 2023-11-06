<?php

function autoloader($class) {
	$file = 'classes/'.$class.'.php';
	//var_dump($file);
	if (file_exists($file)) {
		require_once $file;
	}
}

function securisation($champ)
{
    $champ = trim($champ);
    $champ = strip_tags($champ);
    $champ = htmlspecialchars($champ, ENT_QUOTES);
    return $champ;
}

?>