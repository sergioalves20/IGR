<?php
require_once 'Conexao.php';

class Consorcio {
    private $id_consorcio;
    private $id_concurso;
    private $empresa;
    private $lider;
    private $ass;
    
    public function __construct($id_consorcio=0,$id_concurso="", $empresa="", $lider="", $ass="") {
        $this->setId_consorcio($id_consorcio);
        $this->setId_concurso($id_concurso) ;
        $this->setEmpresa($empresa) ;
        $this->setLider($lider);
        $this->setAss($ass);
    }
    
    public function getId_consorcio() {
        return $this->id_consorcio;
    }

    public function getId_concurso() {
        return $this->id_concurso;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getLider() {
        return $this->lider;
    }

    public function getAss() {
        return $this->ass;
    }

    public function setId_consorcio($id_consorcio) {
        $this->id_consorcio = $id_consorcio;
    }

    public function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function setLider($lider) {
        $this->lider = $lider;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }


}

