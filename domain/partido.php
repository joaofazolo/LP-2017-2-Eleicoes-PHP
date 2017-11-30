<?php
//Classe partido
class Partido{
    //Construtor de partido
    public function __construct($sigla,$coligacao){
        $this->sigla = $sigla;
        $this->coligacao = $coligacao;
    }
    public $sigla;
    public $coligacao;
}
?>