<?php

require_once 'Conexao.php';

class Proposta {

    private $id_proposta;
    private $data;
    private $id_concurso;
    private $empresa;
    private $consorcio;
    private $valorp;
    private $prazo;
    private $classifc;
    private $ass;
   
    public function __construct($id_proposta=0, $data="", $id_concurso="", $empresa="",$consorcio="", $valorp="", $prazo="", $classifc="", $ass="") {
        $this->setId_proposta($id_proposta);
        $this->setData($data);
        $this->setId_concurso($id_concurso);
        $this->setEmpresa($empresa);
        $this->setConsorcio($consorcio);
        $this->setValorp($valorp);
        $this->setPrazo($prazo);
        $this->setClassifc($classifc);
        $this->setAss($ass);
    }

    public function getId_proposta() {
        return $this->id_proposta;
    }

    public function getData() {
        return $this->data;
    }

    public function getId_concurso() {
        return $this->id_concurso;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getConsorcio() {
        return $this->consorcio;
    }

    public function getValorp() {
        return $this->valorp;
    }

    public function getPrazo() {
        return $this->prazo;
    }

    public function getClassifc() {
        return $this->classifc;
    }

    public function getAss() {
        return $this->ass;
    }

    public function setId_proposta($id_proposta) {
        $this->id_proposta = $id_proposta;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function setConsorcio($consorcio) {
        $this->consorcio = $consorcio;
    }

    public function setValorp($valorp) {
        $this->valorp = $valorp;
    }

    public function setPrazo($prazo) {
        $this->prazo = $prazo;
    }

    public function setClassifc($classifc) {
        $this->classifc = $classifc;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }



}
