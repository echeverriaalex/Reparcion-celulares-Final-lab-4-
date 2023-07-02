<?php 
    namespace Config;
	
    class Autoload {        
        public static function Start() {
            spl_autoload_register(function($className){

                //echo "<br> La dir --> ". __DIR__ ;
                $newclassName = str_replace("\\", "/class.", $className);
                //echo "<br><br> ripla ---> ".$newclassName;                
                $classPath = ucwords(str_replace("\\", "/", ROOT.$newclassName).".php");
                //var_dump($newclassName);
                //echo "<br> PAth ---> " .$classPath; 
				include_once($classPath);
			});
        }
    }
?>