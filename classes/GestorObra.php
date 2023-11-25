<?php

require_once 'Conexao.php';

class GestorObra {

    private $id_gestorobra;
    private $id_gestor;
    private $data;
    private $id_objconcurso;
    private $nomeado;
    private $substituto;
    private $interino;
    private $datai;
    private $dataf;
    private $just;
    private $ass;
    private $ativo;

    public function __construct($id_gestorobra=0,$id_gestor="",$data="", $id_objconcurso="",   $nomeado="", $substituto="", $interino="", $datai="", $dataf="", $just="",$ass="",$ativo="") {
        $this->setId_gestorobra($id_gestorobra);
        $this->setId_gestor($id_gestor);
        $this->setData($data); 
        $this->setId_objconcurso($id_objconcurso);    
        $this->setNomeado($nomeado);
        $this->setSubstituto($substituto);
        $this->setInterino($interino);
        $this->setDatai($datai);
        $this->setDataf($dataf);
        $this->setJust($just);
        $this->setAss($ass);
        $this->setAtivo($ativo);
    }
    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function getId_gestorobra() {
        return $this->id_gestorobra;
    }

    public function getId_objconcurso() {
        return $this->id_objconcurso;
    }

    public function getData() {
        return $this->data;
    }

    public function getId_gestor() {
        return $this->id_gestor;
    }

    public function getNomeado() {
        return $this->nomeado;
    }

    public function getSubstituto() {
        return $this->substituto;
    }

    public function getInterino() {
        return $this->interino;
    }

    public function getDatai() {
        return $this->datai;
    }

    public function getDataf() {
        return $this->dataf;
    }

    public function getJust() {
        return $this->just;
    }

    public function getAss() {
        return $this->ass;
    }

    public function setId_gestorobra($id_gestorobra) {
        $this->id_gestorobra = $id_gestorobra;
    }

    public function setId_objconcurso($id_objconcurso) {
        $this->id_objconcurso = $id_objconcurso;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setId_gestor($id_gestor) {
        $this->id_gestor = $id_gestor;
    }

    public function setNomeado($nomeado) {
        $this->nomeado = $nomeado;
    }

    public function setSubstituto($substituto) {
        $this->substituto = $substituto;
    }

    public function setInterino($interino) {
        $this->interino = $interino;
    }

    public function setDatai($datai) {
        $this->datai = $datai;
    }

    public function setDataf($dataf) {
        $this->dataf = $dataf;
    }

    public function setJust($just) {
        $this->just = $just;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }

}
