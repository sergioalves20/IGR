<?php

require_once 'Conexao.php';

class Ilha {
    private $id_ilha;
    private $ilha;
    
    public function __construct($id_ilha, $ilha) {
        $this->setId_ilha($id_ilha);
        $this->setIlha($ilha);
    }
    
    public function getId_ilha() {
        return $this->id_ilha;
    }

    public function getIlha() {
        return $this->ilha;
    }

    public function setId_ilha($id_ilha) {
        $this->id_ilha = $id_ilha;
    }

    public function setIlha($ilha) {
        $this->ilha = $ilha;
    }


}
