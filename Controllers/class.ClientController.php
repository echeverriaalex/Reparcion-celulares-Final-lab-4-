<?php 
    namespace Controllers;

    use DAO\ClientDAO;
    use Models\User;

    class ClientController{

        private $clientDAO;

        public function __construct(){            
            $this->clientDAO = new ClientDAO();
        }

        public function ShowAddView(){
            if($_SESSION['technical']) {
                require_once(VIEWS_PATH."client-add.php");
            }
            else{
                header('location: '.FRONT_ROOT. '/Home/Index');
            } 
        }

        public function ShowListView(){
            if($_SESSION['technical']) {
                $clientList = $this->clientDAO->GetAll();
                require_once(VIEWS_PATH."client-list.php");
            }
            else{
                header('location: '.FRONT_ROOT. '/Home/Index');
            } 
        }

        public function Add($nombre, $telefono){
            $this->clientDAO->Add($nombre, $telefono);
            $this->ShowListView();
        }

        public function Delete($id_client){
            $this->clientDAO->Delete($id_client);
            $this->ShowListView();
        }

        public function Logout(){
            $_SESSION['user'] = null;
            unset($_SESSION);
            var_dump($_SESSION);
            session_destroy();
            header('location: ../Home/Index');
        }
    }
?>