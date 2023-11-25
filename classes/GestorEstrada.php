<?php

require_once 'Conexao.php';

class GestorEstrada {

    private $id_gestrada;
    private $id_gestor;
    private $data;
    private $id_estrada;
    private $nomeado;
    private $substituto;
    private $interino;
    private $datai;
    private $dataf;
    private $just;
    private $ass;
    private $ativo;

    public function __construct($id_gestrada=0,$id_gestor="",$data="", $id_estrada="",$nomeado="", $substituto="", $interino="", $datai="", $dataf="", $just="",$ass="",$ativo="") {
        $this->setId_gestrada($id_gestrada);
        $this->setId_gestor($id_gestor);
        $this->setData($data); 
        $this->setId_estrada($id_estrada);    
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

    public function getId_gestrada() {
        return $this->id_gestrada;
    }

    public function getId_gestor() {
        return $this->id_gestor;
    }

    public function getData() {
        return $this->data;
    }

    public function getId_estrada() {
        return $this->id_estrada;
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

    public function setId_gestrada($id_gestrada) {
        $this->id_gestrada = $id_gestrada;
    }

    public function setId_gestor($id_gestor) {
        $this->id_gestor = $id_gestor;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setId_estrada($id_estrada) {
        $this->id_estrada = $id_estrada;
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
