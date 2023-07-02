<?php
    namespace Models;

    class Technical{
        
        private $id_technical;
        private $userName;
        private $email;
        private $password;

        public function __construct($id_technical = null, $userName = null, $email = null, $password = null){
            $this->setIdTechnical($id_technical);
            $this->setuserName($userName);
            $this->setEmail($email);
            $this->setPassword($password);
        }

        public function getIdTechnical(){return $this->id_technical;}
        public function setIdTechnical($id_technical){$this->id_technical = $id_technical;}

        public function getUserName(){return $this->userName;}
        public function setUserName($userName){$this->userName = $userName;}

        public function getEmail(){return $this->email;}
        public function setEmail($email){$this->email = $email;}

        public function getPassword(){return $this->password;}
        public function setPassword($password){$this->password = $password;}
    }
?>