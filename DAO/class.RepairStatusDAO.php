<?php
    namespace DAO;

    use PDOException;
    use Models\RepairStatus;

    class RepairStatusDAO{

        private $tableName = "repairstatus";
        private $connection;

        public function GetAll(){

            try{
                $repairStatusList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $repairStatusResult = $this->connection->Execute($query);

                foreach($repairStatusResult as $row){

                    $repairStatus = new RepairStatus($row['repairStatusId'], $row['description']);
                    array_push($repairStatusList, $repairStatus);
                }
                return $repairStatusList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }
    }
?>