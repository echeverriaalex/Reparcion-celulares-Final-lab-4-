<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = null){
            require_once(VIEWS_PATH."index.php");
        }
    }
?>