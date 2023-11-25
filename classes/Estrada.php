<?php
require_once 'EstradaFicha.php';
class Estrada extends EstradaFicha {
            function __construct($id_estrada=0,$codigo="",$tutela="",$classe="",$ilha="",
                                 $nseq="",$estatuto="",$extensao="",
                                 $toponimo="",$pontosext="",$altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="",
                                 $altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="",$orient=""){         
        $this->setId_estrada($id_estrada);
        $this->setCodigo($codigo);
        $this->setTutela($tutela);
        $this->setClasse($classe);
        $this->setIlha($ilha);
        $this->setNseq($nseq);
        $this->setEstatuto($estatuto);     
        $this->setExtensao($extensao);
        $this->setToponimo($toponimo);
        $this->setPontosext($pontosext);
        $this->setAltitd_pki($altitd_pki);
        $this->setLat_ci($lat_ci);
        $this->setLat_ni($lat_ni);
        $this->setLong_ci($long_ci);
        $this->setLong_ni($long_ni);
        $this->setAltitd_pkf($altitd_pkf);
        $this->setLat_cf($lat_cf);
        $this->setLat_nf($lat_nf);
        $this->setLong_cf($long_cf);
        $this->setLong_nf($long_nf);
        $this->setOrient($orient);
        }                
}
