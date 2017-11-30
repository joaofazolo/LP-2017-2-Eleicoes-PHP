<?php
//Classe candidato
class Candidato{
    private $numero;
    private $nome;
    private $partido;
    private $eleito;
    public $votos;
    
    //Construtor classe candidato
    public function __construct($numero,$nome,$partido,$eleito,$votos){
        $this->numero = $numero;
        $this->nome = $nome;
        $this->partido = $partido;
        $this->eleito = $eleito;
        $this->votos = $votos;
    }
    
    //Imprime informaçoes sobre o candidato
    public function printCandidato(){
        //Se o candidato nao tem coligacao
        if(strcmp($this->partido->coligacao,"nenhuma")==0)
        echo $this->nome ." (". $this->partido->sigla . ", " . $this->votos . " votos)<br>";
        //Se o candidato tem coligacao
        else
        echo $this->nome ." (". $this->partido->sigla . 
        ", " . $this->votos . " votos) - Coligação:" . $this->partido->coligacao ."<br>";
    }
    
    public function getEleito(){
        return $this->eleito;
    }
    
    //Ordena por votos
    public static function sortByVotos($first,$second){
        return $second->votos > $first->votos;
    }
}

?>