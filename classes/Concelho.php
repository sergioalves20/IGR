<?php

require_once 'Conexao.php';

class Concelho {

    private $id_concelho;
    private $concelho;

    public function __construct($id_concelho, $concelho) {
        $this->setId_concelho($id_concelho);
        $this->setConcelho($concelho);
    }

    public function getId_concelho() {
        return $this->id_concelho;
    }

    public function getConcelho() {
        return $this->concelho;
    }

    public function setId_concelho($id_concelho) {
        $this->id_concelho = $id_concelho;
    }

    public function setConcelho($concelho) {
        $this->concelho = $concelho;
    }

}
