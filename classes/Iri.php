<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Iri extends EstradaFicha {
    private $id_iri;
    private $id_trecho;
    private $via;
    private $iri;

    public function __construct($id_iri=0,$alt="",$reg="", $id_estrada="", $id_trecho="", $data="", $hora="", $via="", $iri="", $ass="",$arq="",$data_arq="") {
        $this->setId_iri($id_iri);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_estrada($id_estrada);
        $this->setId_trecho($id_trecho);
        $this->setData($data);
        $this->setHora($hora);
        $this->setVia($via);
        $this->setIri($iri);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
        
    }
     public function getId_iri() {
        return $this->id_iri;
    }
    public function getId_trecho() {
        return $this->id_trecho;
    }

    public function getVia() {
        return $this->via;
    }

    public function getIri() {
        return $this->iri;
    }
    public function setId_iri($id_iri) {
        $this->id_iri = $id_iri;
    }
    public function setId_trecho($id_trecho) {
        $this->id_trecho = $id_trecho;
    }

    public function setVia($via) {
        $this->via = $via;
    }

    public function setIri($iri) {
        $this->iri = $iri;
    }

}
