<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Orcamento extends EstradaFicha {

    private $id_orc;
    private $tipo_obra;
    
    public function __construct($id_orc=0, $data="", $id_estrada="", $tipo_obra="",$ass="") {
        $this->setId_orc($id_orc);
        $this->setData($data);
        $this->setId_estrada($id_estrada);
        $this->setTipo_obra($tipo_obra);
        $this->setAss($ass);
    }

    public function getId_orc() {
        return $this->id_orc;
    }

    public function getTipo_obra() {
        return $this->tipo_obra;
    }

    public function setId_orc($id_orc) {
        $this->id_orc = $id_orc;
    }

    public function setTipo_obra($tipo_obra) {
        $this->tipo_obra = $tipo_obra;
    }

}
