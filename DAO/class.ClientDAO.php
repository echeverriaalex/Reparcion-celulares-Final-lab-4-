<?php
    namespace DAO;

    use PDOException;
    use Models\Client;

    class ClientDAO{

        private $tableName = "clients";
        private $connection;

        public function __construct() {
            $this->tableName = "clients";
            $this->connection = Connection::GetInstance();
        }

        public function Add($nombre = null, $telefono = null){
            try{
                $query = "insert into $this->tableName (nombre, telefono) VALUES (:nombre, :telefono);";
                $this->connection = Connection::GetInstance();

                $parameters['nombre'] = $nombre;
                $parameters['telefono'] = $telefono;

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetAll(){
            try{
                $clientList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $clientResult = $this->connection->Execute($query);

                foreach($clientResult as $row){
                    $client = new Client($row['id_client'], $row['nombre'], $row['telefono']);
                    array_push($clientList, $client);
                }
                return $clientList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetClientById($id_client){
            try{
                $query = "select * from $this->tableName where (id_client = :id_client);";

                $parameter['id_client'] = $id_client;

                $this->connection = Connection::GetInstance();
                $clientResult = $this->connection->Execute($query, $parameter);

                if(isset($clientResult)){                    
                    foreach($clientResult as $row){
                        $client = new Client($row['id_client'], $row['nombre'], $row['telefono']);
                    }
                    return $client;
                }
                return null;                
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Delete($id_client){
            try{
                $query = "delete from $this->tableName where(id_client = :id_client);";
                $this->connection = Connection::GetInstance();
                $parameters['id_client'] = $id_client;
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }
    }
?>