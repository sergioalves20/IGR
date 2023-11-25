<?php

require_once 'Conexao.php';

class Empresa {

    private $id_empresa;
    private $nome;
    private $alvara;
    private $nif;
    private $nac;  
    private $endereco;
    private $email;
    private $tel1;
    private $cont1;
    private $tel2;
    private $cont2;
    private $tel3;
    private $cont3;
    private $ass;
   
    public function __construct($id_empresa=0, $nome="", $alvara="",$nif="",$nac="",$endereco="",  $email="", $tel1="", $cont1="", $tel2="", $cont2="", $tel3="", $cont3="",$ass="") {
        $this->setId_empresa($id_empresa);
        $this->setNome($nome);
        $this->setAlvara($alvara);
        $this->setNif($nif);
        $this->setNac($nac);
        $this->setEndereco($endereco);
        $this->setEmail($email);
        $this->setTel1($tel1);
        $this->setCont1($cont1);
        $this->setTel2($tel2);
        $this->setCont2($cont2);
        $this->setTel3($tel3);
        $this->setCont3($cont3); 
        $this->setAss($ass);
    }
    public function getAss() {
        return $this->ass;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }

        public function getId_empresa() {
        return $this->id_empresa;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getAlvara() {
        return $this->alvara;
    }

    public function getNif() {
        return $this->nif;
    }

    public function getNac() {
        return $this->nac;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTel1() {
        return $this->tel1;
    }

    public function getCont1() {
        return $this->cont1;
    }

    public function getTel2() {
        return $this->tel2;
    }

    public function getCont2() {
        return $this->cont2;
    }

    public function getTel3() {
        return $this->tel3;
    }

    public function getCont3() {
        return $this->cont3;
    }

    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setAlvara($alvara) {
        $this->alvara = $alvara;
    }

    public function setNif($nif) {
        $this->nif = $nif;
    }

    public function setNac($nac) {
        $this->nac = $nac;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTel1($tel1) {
        $this->tel1 = $tel1;
    }

    public function setCont1($cont1) {
        $this->cont1 = $cont1;
    }

    public function setTel2($tel2) {
        $this->tel2 = $tel2;
    }

    public function setCont2($cont2) {
        $this->cont2 = $cont2;
    }

    public function setTel3($tel3) {
        $this->tel3 = $tel3;
    }

    public function setCont3($cont3) {
        $this->cont3 = $cont3;
    }
   
}
