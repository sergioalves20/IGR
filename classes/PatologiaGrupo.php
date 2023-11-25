<?php

require_once 'Conexao.php';

class PatologiaGrupo {

    private $id_grupo;
    private $grupo;

    public function __construct($id_grupo, $grupo) {
        $this->setId_grupo($id_grupo);
        $this->setGrupo($grupo);
    }

    public function getId_grupo() {
        return $this->id_grupo;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

}
