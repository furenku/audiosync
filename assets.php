<?php

$assets = '';

$dir = get_stylesheet_directory_uri() . '/';


$assets .= '<link rel="stylesheet" href="'.$dir.'css/app.css" />';

$assets .= '<link rel="icon" href="'.$dir.'favicon.ico" type="image/x-icon">';

$assets .= '<link rel="shortcut icon" href="'.$dir.'favicon.ico" type="image/x-icon">';

$assets .= '<script src="'.$dir.'bower_components/modernizr/modernizr.js"></script>';

$assets .= '<script src="'.$dir.'bower_components/jquery/dist/jquery.min.js"></script>';

$assets .= '<script src="'.$dir.'bower_components/foundation/js/foundation.js"></script>';

$assets .= '<script src="'.$dir.'bower_components/jquery-ui/jquery-ui.min.js"></script>';
echo $assets;

?>