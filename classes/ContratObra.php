<?php

require_once 'Conexao.php';

class ContratObra {

    private $id_contratobra;
    private $id_concurso;
    private $consorcio;
    private $empresa;
    private $datai;
    private $dataf;
    private $datass;
    private $val;
    private $ass;

    public function __construct($id_contratobra=0, $id_concurso="",$consorcio="", $empresa="", $datai="", $dataf="", $datass="",$val="", $ass="") {
        $this->setId_contratobra($id_contratobra);
        $this->setId_concurso($id_concurso);
        $this->setConsorcio($consorcio);
        $this->setEmpresa($empresa);     
        $this->setDatai($datai);
        $this->setDataf($dataf);
        $this->setDatass($datass);
        $this->setVal($val);
        $this->setAss($ass);
    }
    public function getAss() {
        return $this->ass;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }

        public function getId_contratobra() {
        return $this->id_contratobra;
    }

    public function getId_concurso() {
        return $this->id_concurso;
    }

    public function getConsorcio() {
        return $this->consorcio;
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

    public function setId_contratobra($id_contratobra) {
        $this->id_contratobra = $id_contratobra;
    }

    public function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    public function setConsorcio($consorcio) {
        $this->consorcio = $consorcio;
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


}
