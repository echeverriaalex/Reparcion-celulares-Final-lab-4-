<?php
    namespace Models;

    class Client{

        private $id_client;
        private $nombre;
        private $telefono;

        public function __construct($id_client = null, $nombre = null, $telefono = null){
            $this->setIdCliente($id_client);
            $this->setNombre($nombre);
            $this->setTelefono($telefono);
        }

        public function setIdCliente($id_client){$this->id_client= $id_client;}
        public function getIdCliente(){return $this->id_client;}

        public function setNombre($nombre){$this->nombre = $nombre;}
        public function getNombre(){return $this->nombre;}

        public function setTelefono($telefono){$this->telefono = $telefono;}
        public function getTelefono(){return $this->telefono;}
    }
?>