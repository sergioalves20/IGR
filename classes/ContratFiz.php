<?php

require_once 'Conexao.php';

class ContratFiz {

    private $id_contratfiz;
    private $id_empreitada;
    private $empresa;
    private $datai;
    private $dataf;
    private $datass;
    private $val;
    private $ass;

    public function __construct($id_contratfiz=0, $id_empreitada="", $empresa="", $datai="", $dataf="", $datass="", $val="",$ass="") {
        $this->setId_contratfiz($id_contratfiz);
        $this->setId_empreitada($id_empreitada);
        $this->setEmpresa($empresa);
        $this->setDatai($datai);
        $this->setDataf($dataf);
        $this->setDatass($datass);
        $this->setVal($val);
        $this->setAss($ass);
    }

    public function getId_contratfiz() {
        return $this->id_contratfiz;
    }

    public function getId_empreitada() {
        return $this->id_empreitada;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getDatai() {
        return $this->datai;
    }

    public function getDataf() {
        return $this->dataf;
    }

    public function getDatass() {
        return $this->datass;
    }

    public function getVal() {
        return $this->val;
    }

    public function getAss() {
        return $this->ass;
    }

    public function setId_contratfiz($id_contratfiz) {
        $this->id_contratfiz = $id_contratfiz;
    }

    public function setId_empreitada($id_empreitada) {
        $this->id_empreitada = $id_empreitada;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function setDatai($datai) {
        $this->datai = $datai;
    }

    public function setDataf($dataf) {
        $this->dataf = $dataf;
    }

    public function setDatass($datass) {
        $this->datass = $datass;
    }

    public function setVal($val) {
        $this->val = $val;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }

}
