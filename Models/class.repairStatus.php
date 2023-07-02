<?php
    namespace Models;

    class RepairStatus{

        private $repairStatusId;
        private $description;

        public function __construct($repairStatusId = null, $description = null){

            $this->setRepairStatusId($repairStatusId);
            $this->setDescription($description);            
        }

        public function getRepairStatusId(){return $this->repairStatusId;}
        public function setRepairStatusId($repairStatusId){$this->repairStatusId = $repairStatusId;}

        public function getDescription(){return $this->description;}
        public function setDescription($description){$this->description = $description;}
    }
?>