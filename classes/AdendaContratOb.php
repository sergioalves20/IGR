<?php

require_once 'Conexao.php';

class AdendaContratOb {

    private $id_adendactob; //id Adenda ao Contrato de Obra
    private $id_contratobra; //id Contrato de Obra
    private $datai; //Data inicial da adenda
    private $dataf; //Data final da adenda
    private $val; //Valor da Adenda ao contrato de obra
    private $datass; //Data da assinatura da Adenda
    private $just; //Justificação
    private $ass;//Registo
    
    public function __construct($id_adendactob=0, $id_contratobra="", $datai="", $dataf="", $datass="",$val="",  $just="",$ass="") {
        $this->setId_adendactob($id_adendactob);
        $this->setId_contratobra($id_contratobra);
        $this->setDatai($datai);
        $this->setDataf($dataf);
        $this->setDatass($datass);
        $this->setVal($val);      
        $this->setJust($just);
        $this->setAss($ass);
    }

    public function getId_adendactob() {
        return $this->id_adendactob;
    }

    public function getId_contratobra() {
        return $this->id_contratobra;
    }

    public function getDatai() {
        return $this->datai;
    }

    public function getDataf() {
        return $this->dataf;
    }

    public function getVal() {
        return $this->val;
    }

    public function getDatass() {
        return $this->datass;
    }

    public function getJust() {
        return $this->just;
    }

    public function getAss() {
        return $this->ass;
    }

    public function setId_adendactob($id_adendactob) {
        $this->id_adendactob = $id_adendactob;
    }

    public function setId_contratobra($id_contratobra) {
        $this->id_contratobra = $id_contratobra;
    }

    public function setDatai($datai) {
        $this->datai = $datai;
    }

    public function setDataf($dataf) {
        $this->dataf = $dataf;
    }

    public function setVal($val) {
        $this->val = $val;
    }

    public function setDatass($datass) {
        $this->datass = $datass;
    }

    public function setJust($just) {
        $this->just = $just;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }



}
