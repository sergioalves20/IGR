<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Iq extends EstradaFicha {
    private $id_iq;
    private $id_trecho;
    private $iq;

    public function __construct($id_iq=0,$alt="",$reg="", $id_estrada="", $id_trecho="", $data="", $hora="", $iq="", $ass="",$arq="", $data_arq="") {
        $this->setId_iq($id_iq);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_estrada($id_estrada);
        $this->setId_trecho($id_trecho);
        $this->setData($data);
        $this->setHora($hora);
        $this->setIq($iq);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }
    public function getId_iq() {
        return $this->id_iq;
    }
    public function getId_trecho() {
        return $this->id_trecho;
    }

    public function getIq() {
        return $this->iq;
    }
     public function setId_iq($id_iq) {
        $this->id_iq = $id_iq;
    }
    public function setId_trecho($id_trecho) {
        $this->id_trecho = $id_trecho;
    }

    public function setIq($iq) {
        $this->iq = $iq;
    }

}
