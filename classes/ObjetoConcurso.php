<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class ObjetoConcurso extends EstradaFicha {

    private $id_objconcurso;
    private $id_concurso;
    private $tipo_obra;
    private $ass;
   

    public function __construct($id_objconcurso=0, $id_concurso="", $id_estrada="", $tipo_obra="", $pkinicio="", $pkfim="",$ass="") {
        $this->setId_objconcurso($id_objconcurso);
        $this->setId_concurso($id_concurso);
        $this->setId_estrada($id_estrada);
        $this->setTipo_obra($tipo_obra);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setAss($ass);
    }

    public function getId_objconcurso() {
        return $this->id_objconcurso;
    }

    public function getId_concurso() {
        return $this->id_concurso;
    }

    public function getTipo_obra() {
        return $this->tipo_obra;
    }

    public function getAss() {
        return $this->ass;
    }

    public function setId_objconcurso($id_objconcurso) {
        $this->id_objconcurso = $id_objconcurso;
    }

    public function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    public function setTipo_obra($tipo_obra) {
        $this->tipo_obra = $tipo_obra;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }



}
