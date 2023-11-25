<?php
require_once 'Conexao.php';

class PatologiasItens {
    
    private $id_item;
    private $id_grupo;
    private $nivel;
    private $patologia;
    private $descr;
    
    function __construct($id_item=0, $id_grupo="", $nivel="", $patologia="", $descr="") {
        $this->setId_item($id_item);
        $this->setId_grupo($id_grupo);
        $this->setNivel($nivel);
        $this->setPatologia($patologia);
        $this->setDescr($descr);
    }

    function getId_item() {
        return $this->id_item;
    }

    function getId_grupo() {
        return $this->id_grupo;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getPatologia() {
        return $this->patologia;
    }

    function getDescr() {
        return $this->descr;
    }

    function setId_item($id_item) {
        $this->id_item = $id_item;
    }

    function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setPatologia($patologia) {
        $this->patologia = $patologia;
    }

    function setDescr($descr) {
        $this->descr = $descr;
    }



}
