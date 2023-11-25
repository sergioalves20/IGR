<?php

require_once 'Conexao.php';

class TipObra {

    private $id_tipobra;
    private $tipobra;

    public function __construct($id_tipobra, $tipobra) {
        $this->setId_tipobra($id_tipobra);
        $this->setTipobra($tipobra);
    }

    public function getId_tipobra() {
        return $this->id_tipobra;
    }

    public function getTipobra() {
        return $this->tipobra;
    }

    public function setId_tipobra($id_tipobra) {
        $this->id_tipobra = $id_tipobra;
    }

    public function setTipobra($tipobra) {
        $this->tipobra = $tipobra;
    }

}
