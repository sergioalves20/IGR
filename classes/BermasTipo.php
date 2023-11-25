
<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class BermasTipo extends EstradaFicha {
    private $id_bermatipo;
    private $id_berma;
    private $pavim;
    private $pedra;
    private $revsuperf;
    private $bb;
    private $bclas;

    public function __construct($id_bermatipo=0,$alt="",$reg="", $id_berma="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $sentido="", $pavim="",$pedra="", $revsuperf="", $bb="", $bclas="", $ass="",$data_arq="",$arq="") {
        $this->setId_bermatipo($id_bermatipo);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_berma($id_berma);
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setSentido($sentido);
        $this->setPavim($pavim);
        $this->setPedra($pedra);
        $this->setRevsuperf($revsuperf);
        $this->setBb($bb);
        $this->setBclas($bclas);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }
    public function getId_bermatipo() {
        return $this->id_bermatipo;
    }

    public function setId_bermatipo($valor) {
        $this->id_bermatipo = $valor;
    }
   
    public function getId_berma() {
        return $this->id_berma;
    }

    public function getPavim() {
        return $this->pavim;
    }

    public function getPedra() {
        return $this->pedra;
    }

    public function getRevsuperf() {
        return $this->revsuperf;
    }

    public function getBb() {
        return $this->bb;
    }

    public function getBclas() {
        return $this->bclas;
    }

    public function setId_berma($valor) {
        $this->id_berma = $valor;
    }

    public function setPavim($valor) {
        $this->pavim = $valor;
    }

    public function setPedra($valor) {
        $this->pedra = $valor;
    }

    public function setRevsuperf($valor) {
        $this->revsuperf = $valor;
    }

    public function setBb($valor) {
        $this->bb = $valor;
    }

    public function setBclas($valor) {
        $this->bclas = $valor;
    }

}
