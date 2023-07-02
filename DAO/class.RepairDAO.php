<?php
    namespace DAO;

    use Models\Repair;
    use Models\RepairStatus;
    use DAO\ClientDAO;
    use Model\Client;
    use PDOException;

    class RepairDAO{

        private $connection;
        private $tableName = "repairs";
        private $clientDAO;

        public function __construct() {
            $this->clientDAO = new ClientDAO;
        }

        public function GetAll(){
            try{
                $repairsList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $repairsResults = $this->connection->Execute($query);

                foreach($repairsResults as $row){
                    $repair = new Repair();
                    $repair->setRepairId($row['repairId']);
                    $repair->setRepairStatusId($row['repairStatusId']);
                    $repair->setDescription($row['description']);
                    $repair->setTechnicalId($row['technicalId']);
                    $repair->setClientId($row['clientId']);
                    $client = $this->clientDAO->GetClientById($row['clientId']);
                    array_push($repairsList, $repair);
                }
                return $repairsList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetAllWithStatus(){
            try{
                $repairsList = array();
                //$query = "select * from $this->tableName r inner join repairstatus rs where r.repairStatusId = rs.repairStatusId and r.repairId = 3;";
                $query = 'select 
                            r.repairId, ç
                            r.description, 
                            
                            rs.description as "estado"
                        from repairs r inner join repairstatus rs 
                        where r.repairStatusId = rs.repairStatusId;';
                $this->connection = Connection::GetInstance();
                $repairsResults = $this->connection->Execute($query);

                foreach($repairsResults as $row){
                    $repair = new Repair($row['repairId'], $row['description'], $row['estado']);
                    array_push($repairsList, $repair);
                }
                return $repairsList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetAllWithStatusClientTechnical(){
            try{
                $repairsList = array();
                $repairsDataList = array();
                //$query = "select * from $this->tableName r inner join repairstatus rs where r.repairStatusId = rs.repairStatusId and r.repairId = 3;";
                $query = 'select 
                            r.repairId as "repairId", 
                            r.repairStatusId as "repairStatusId", 
                            r.description as "repairDescription",                            
                            r.technicalId as "repairTechnicalId",
                            r.clientId as "repairClientId",
                            
                            t.userName as "technicalName",
                            t.id_technical as "technicalId",
                            
                            c.id_client as "clientId",
                            c.nombre as "clientName",
                            c.telefono as "clientPhone",
                            
                            rs.repairStatusId as "statusId", 
                            rs.description as "orderStatusdescription" 

                        from repairs r 
                        inner join repairstatus rs on r.repairStatusId = rs.repairStatusId
                        inner join technicals t on r.technicalId = t.id_technical
                        inner join clients c on c.id_client = r.clientId;';
                $this->connection = Connection::GetInstance();
                $repairsResults = $this->connection->Execute($query);
                
                foreach($repairsResults as $row){
                    // esta es la primera solucion que encontre, creo un objeto modelo y le asigno sola la informacion  
                    // que necesito sin importar si deberia pertenecer a este o no, creo que no es muy bueno
                    // porque no estaria respetando orientacion a objetos al 100%.
                    $client = $this->clientDAO->GetClientById($row['repairClientId']);                    
                    $repair = new Repair($row['repairId'], $row['orderStatusdescription'], $row['repairDescription'], $row['technicalName']);             
                    $repair->setClientId($row['clientName']."/". $row['clientPhone']);
                    array_push($repairsList, $repair);
                }
                return $repairsList;             
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetAllWithStatusClientTechnicalArray(){
            try{
                $repairsList = array();
                $repairsDataList = array();
                //$query = "select * from $this->tableName r inner join repairstatus rs where r.repairStatusId = rs.repairStatusId and r.repairId = 3;";
                $query = 'select 
                            r.repairId as "repairId", 
                            r.repairStatusId as "repairStatusId", 
                            r.description as "repairDescription", 
                            r.technicalId as "repairTechnicalId",
                            r.clientId as "repairClientId",
                            
                            t.userName as "technicalName", 
                            t.id_technical as "technicalId",
                            
                            c.id_client as "clientId", 
                            c.nombre as "clientName",
                            c.telefono as "clientPhone",
                            
                            rs.repairStatusId as "statusId", 
                            rs.description as "orderStatusdescription"
                        from repairs r 
                        inner join repairstatus rs on r.repairStatusId = rs.repairStatusId
                        inner join technicals t on r.technicalId = t.id_technical
                        inner join clients c on c.id_client = r.clientId;';
                $this->connection = Connection::GetInstance();
                $repairsResults = $this->connection->Execute($query);
                
                foreach($repairsResults as $row){
                    // esta es la segunda forma que encontre para almacenar toda la informacion que necesito
                    // creo que es mucho mejor que la anterior, porque no asigno cualquier informacion 
                    // a un objeto, entonces no violo ninguna regla de la orientacion a objetos
                    // y creo que es casi lo mismo en rendimiento porque aca creo un arreglo que supongo
                    // que tiene casi la misma eficiencia que un objeto
                    $data['repairId'] = $row['repairId'];
                    $data['repairStatusId'] = $row['repairStatusId'];
                    $data['repairDescription'] = $row['repairDescription'];
                    $data['repairTechnicalId'] = $row['repairTechnicalId'];
                    $data['repairClientId'] = $row['repairClientId'];
                    
                    $data['technicalName'] = $row['technicalName'];
                    $data['technicalId'] = $row['technicalId'];

                    $data['clientId'] = $row['clientId'];
                    $data['clientName'] = $row['clientName'];
                    $data['clientPhone'] = $row['clientPhone'];
                    
                    $data['statusId'] = $row['statusId'];
                    $data['orderStatusdescription'] = $row['orderStatusdescription'];
                    array_push($repairsDataList, $data);
                }
                return $repairsDataList;                
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetAllWithStatusClientTechnicalLogged(){
            try{
                $repairsList = array();
                //$query = "select * from $this->tableName r inner join repairstatus rs where r.repairStatusId = rs.repairStatusId and r.repairId = 3;";
                $query = 'select 
                            r.repairId as "repair id", 
                            r.repairStatusId as "status repair id", 
                            r.description as "description order",
                            
                            r.technicalId as "technical id",
                            t.userName as "technical name",
                            
                            r.clientId as "client id",
                            c.nombre as "nombre cliente",
                            c.telefono as "telefono",

                            rs.repairStatusId as "status id", 
                            rs.description as "description order status" 
                            from repairs r inner join repairstatus rs on r.repairStatusId = rs.repairStatusId
                            inner join technicals t on r.technicalId = t.id_technical
                            inner join clients c on c.id_client = r.clientId 
                            where (r.technicalId = ' . $_SESSION['technical']->getIdTechnical() . ');';
                $this->connection = Connection::GetInstance();
                $repairsResults = $this->connection->Execute($query);
                
                foreach($repairsResults as $row){
                    $repair = new Repair();
                    $repair->setRepairId($row['repair id']);
                    $repair->setRepairStatusId($row['description order status']);
                    $repair->setDescription($row['description order']);
                    $repair->setTechnicalId($row['technical name']);
                    $repair->setClientId($row['nombre cliente']."/". $row['telefono']);
                    array_push($repairsList, $repair);
                }
                return $repairsList;
                
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Add($repairStatusId,$description, $technicalId, $clientId){    
            try{
                $query = "insert into $this->tableName (repairStatusId,description, technicalId, clientId) 
                                values (:repairStatusId, :description, :technicalId, :clientId);";
                $this->connection = Connection::GetInstance();

                $parameters['repairStatusId'] = $repairStatusId;
                $parameters['description'] = $description;
                $parameters['technicalId'] = $technicalId;
                $parameters['clientId'] = $clientId;

                $this->connection->ExecuteNonQuery($query, $parameters);
                $ok = true;
                
            }catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Edit($repairId, $repairStatusId){
            try{
                $query = "update $this->tableName set repairId = :repairId, repairStatusId = :repairStatusId where(repairId = :repairId);";

                $parameters['repairId'] = $repairId;
                $parameters['repairStatusId'] = $repairStatusId;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Delete($repairId){
            try{
                $query = "delete from $this->tableName where (repairId = :repairId);";
                $parameters['repairId'] = $repairId;
                $this->connection = Connection::GetInstance();                
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOException $ex){
                throw $ex;
            }
        }
    }
?>