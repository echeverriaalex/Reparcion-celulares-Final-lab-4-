<?php
namespace Models;

    class Repair{

        private $repairId;
        private $repairStatusId;
        private $description;
        private $technicalId;
        private $clientId;

        public function __construct($repairId = null, $repairStatusId = null, $description = null,  $technicalId = null, $clientId = null){
            $this->setRepairId($repairId);
            $this->setRepairStatusId($repairStatusId);
            $this->setDescription($description);
            $this->setTechnicalId($technicalId);
            $this->setClientId($clientId);
        }

        public function getRepairId(){return $this->repairId;}
        public function setRepairId($repairId){$this->repairId = $repairId;}

        public function getRepairStatusId(){return $this->repairStatusId;}
        public function setRepairStatusId($repairStatusId){$this->repairStatusId = $repairStatusId;}

        public function getDescription(){return $this->description;}
        public function setDescription($description){$this->description = $description;}

        public function getTechnicalId(){return $this->technicalId;}
        public function setTechnicalId($technicalId){$this->technicalId = $technicalId;}

        public function getClientId(){return $this->clientId;}
        public function setClientId($clientId){$this->clientId = $clientId;
        }
    }
?>