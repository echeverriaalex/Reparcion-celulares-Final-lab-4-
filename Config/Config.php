<?php 
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
 
    // el original root
    define("FRONT_ROOT", "/Laboratorio 4 PHP/Final reparcion celulares/");
    
    // experimento que estaba probando pero no carga el css
    //echo "replace ---> ". str_replace("\\", "/", dirname(__DIR__));
    //define("FRONT_ROOT", str_replace("\\", "/", dirname(__DIR__)));
   
   
    define("VIEWS_PATH", "Views/");

    define("COMERCE_NAME", "Celulares UTN");
    
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");

    define("DB_HOST", "localhost");
    define("DB_NAME", "reparacion_celulares");
    define("DB_USER", "root");
    define("DB_PASS", "");
?>