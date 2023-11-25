<!--
canoa.2018
-->
<meta charset=utf-8" />
<?php
require_once 'Conexao.php';
class Gestor {
    private $id_gestor;
    private $nome_gestor;
    private $nasc;
    private $grauac;
    private $nif;
    private $endr;
    private $corr;
    private $tel1;
    private $tel2;
    private $data_reg;
    public function __construct($id_gestor=0, $nome_gestor="", $nasc="", $grauac="", $nif="", $endr="", $corr="", $tel1="", $tel2="",$data_reg="") {
        $this->setId_gestor($id_gestor);
        $this->setNome_gestor($nome_gestor);
        $this->setNasc($nasc);
        $this->setGrauac($grauac);
        $this->setNif($nif);
        $this->setEndr($endr);
        $this->setCorr($corr);
        $this->setTel1($tel1);
        $this->setTel2($tel2);
        $this->setData_reg($data_reg);
    }

    public function getId_gestor() {
        return $this->id_gestor;
    }

    public function getNome_gestor() {
        return $this->nome_gestor;
    }

    public function getNasc() {
        return $this->nasc;
    }

    public function getGrauac() {
        return $this->grauac;
    }

    public function getNif() {
        return $this->nif;
    }

    public function getEndr() {
        return $this->endr;
    }

    public function getCorr() {
        return $this->corr;
    }

    public function getTel1() {
        return $this->tel1;
    }

    public function getTel2() {
        return $this->tel2;
    }

    public function setId_gestor($valor) {
        $this->id_gestor = $valor;
    }

    public function setNome_gestor($valor) {
        $this->nome_gestor = $valor;
    }

    public function setNasc($valor) {
        $this->nasc = $valor;
    }

    public function setGrauac($valor) {
        $this->grauac = $valor;
    }

    public function setNif($valor) {
        $this->nif = $valor;
    }

    public function setEndr($valor) {
        $this->endr = $valor;
    }

    public function setCorr($valor) {
        $this->corr = $valor;
    }

    public function setTel1($valor) {
        $this->tel1 = $valor;
    }

    public function setTel2($valor) {
        $this->tel2 = $valor;
    }
     public function getData_reg() {
        return $this->data_reg;
    }

    public function setData_reg($valor) {
        $this->data_reg = $valor;
    }
}
