<?php
    namespace DAO;
    use PDOException;
    use Models\Technical;

    class TechnicalDAO{

        private $tableName = "technicals";
        private $connection;

        public function GetAll(){
            try{
                $technicalsList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $technicalsResult = $this->connection->Execute($query);

                foreach($technicalsResult as $row){
                    $technical = new Technical($row['id_technical'], $row['userName'], $row['email'], $row['password']);
                    array_push($technicalsList, $technical);
                }
                return $technicalsList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetTechnicalByEmail($email){
            try{
                $query = "select * from $this->tableName where(email = :email);";
                $parameter['email'] = $email;
                $this->connection = Connection::GetInstance();
                $technicalsResult = $this->connection->Execute($query, $parameter);

                //echo "<br><br> en el DAO ".$technicalsResult;
                //var_dump($technicalsResult);

                if(!empty($technicalsResult)){
                    foreach($technicalsResult as $row){
                        $technical = new Technical($row['id_technical'], $row['userName'], $row['email'], $row['password']);                    
                    }
                    //var_dump($technical);
                    return $technical;
                }
                return null;                
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }
    }
?>