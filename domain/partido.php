<?php
//Classe partido
class Partido{
    public function __construct($sigla,$coligacao){
        $this->sigla = $sigla;
        $this->coligacao = $coligacao;
    }
    public $sigla;
    public $coligacao;
}
?>