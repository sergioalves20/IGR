
<?php
require_once 'Conexao.php';
class AdendaContratoFz {

    private $id_adendactfiz; // id Adenda ao contrato de fiscalizaçao
    private $id_contratfiz; //id Contrato de fiscalização
    private $datai; //Data inicial da adenda
    private $dataf; //Data final da adenda
    private $datass; //Data da assinatura
    private $val; //Valor da adenda ao contrato    
    private $just; //Justificação
    private $ass;//Assinatura de registo

    public function __construct($id_adendactfiz=0, $id_contratfiz="", $datai="", $dataf="",$datass="", $val="",  $just="",$ass="") {
        $this->setId_adendactfiz($id_adendactfiz);
        $this->setId_contratfiz($id_contratfiz);
        $this->setDatai($datai);
        $this->setDataf($dataf);
        $this->setDatass($datass);
        $this->setVal($val);       
        $this->setJust($just);
        $this->setAss($ass); 
     }

    public function getId_adendactfiz() {
        return $this->id_adendactfiz;
    }

    public function getId_contratfiz() {
        return $this->id_contratfiz;
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

    public function setId_adendactfiz($id_adendactfiz) {
        $this->id_adendactfiz = $id_adendactfiz;
    }

    public function setId_contratfiz($id_contratfiz) {
        $this->id_contratfiz = $id_contratfiz;
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
