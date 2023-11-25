<?php

require_once 'Conexao.php';

class Motivo {
    private $id_motivo;
    private $motivo;
    private $ass;
    
    public function __construct($id_motivo=0, $motivo="",$ass="") {
        $this->setId_motivo($id_motivo);
        $this->setMotivo($motivo);
        $this->setAss($ass);
    }
    public function getAss() {
        return $this->ass;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }
       
    public function getId_motivo() {
        return $this->id_motivo;
    }

    public function getMotivo() {
        return $this->motivo;
    }

    public function setId_motivo($id_motivo) {
        $this->id_motivo = $id_motivo;
    }

    public function setMotivo($motivo) {
        $this->motivo = $motivo;
    }


}
