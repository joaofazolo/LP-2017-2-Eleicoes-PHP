<?php
//Classe partido
class Partido{
    //Sigla do partido
    public $sigla;
    //Coligacao do partido
    public $coligacao;

    //Construtor de partido
    public function __construct($sigla,$coligacao){
        $this->sigla = $sigla;
        $this->coligacao = $coligacao;
    }
}
?>