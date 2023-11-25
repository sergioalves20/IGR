<?php
/* 
 canoa.2018
 */
require_once 'Conexao.php';

class Freguesia {
    private $id_freguesia;
    private $freguesia;
    
    public function __construct($id_freguesia, $freguesia) {
        $this->setId_freguesia($id_freguesia);
        $this->setFreguesia($freguesia);
    }
    
    public function getId_freguesia() {
        return $this->id_freguesia;
    }

    public function getFreguesia() {
        return $this->freguesia;
    }

    public function setId_freguesia($ivalor) {
        $this->id_freguesia = $valor;
    }

    public function setFreguesia($valor) {
        $this->freguesia = $valor;
    }


}

