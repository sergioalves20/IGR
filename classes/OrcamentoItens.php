<?php
require_once 'Conexao.php';

class OrcamentoItens {
    
    private $id_orc;
    private $cod;
    private $descr;
    private $und;
    
    function __construct($id_orc=0, $cod="", $descr="", $und="") {
        $this->setId_orc($id_orc);
        $this->setCod($cod);
        $this->setDescr($descr);
        $this->setUnd($und);
    }

    function getId_orc() {
        return $this->id_orc;
    }

    function getCod() {
        return $this->cod;
    }

    function getDescr() {
        return $this->descr;
    }

    function getUnd() {
        return $this->und;
    }

    function setId_orc($id_orc) {
        $this->id_orc = $id_orc;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setDescr($descr) {
        $this->descr = $descr;
    }

    function setUnd($und) {
        $this->und = $und;
    }

}
