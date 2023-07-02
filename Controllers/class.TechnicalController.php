<?php 
    namespace Controllers;

    use Controllers\RepairController;
    use DAO\TechnicalDAO;
    use Models\Technical;

    class TechnicalController{

        private $technicalDAO;

        public function __construct(){
            $this->technicalDAO = new TechnicalDAO();
        }

        public function Login($email, $password) {
            $technical = $this->technicalDAO->GetTechnicalByEmail($email);
            if(isset($technical) && $technical->getEmail() == $email & $technical->getPassword() == $password){
                $_SESSION['technical'] = $technical;
                $repairController = new RepairController();
                $repairController->ShowListAllOrderView(); 
            }
            else{
                $message = "No se pudo iniciar sesión";
                header('location: '.FRONT_ROOT.'/Home/Index');
            }
        }

        public function RegisterClient(){
            if($_SESSION['technical']){
                $clientController = new ClientController();
                $clientController->ShowAddView();
            }
            else{
                header('location: '.FRONT_ROOT. '/Home/Index');
            } 
        }

        public function Logout(){
            session_destroy();
            $_SESSION['technical'] = null;
            unset($_SESSION);
            //var_dump($_SESSION);            
            header('location: '. FRONT_ROOT.'/Home/Index');
        }
    }
?>