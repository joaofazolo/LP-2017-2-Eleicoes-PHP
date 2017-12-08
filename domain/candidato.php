<?php
//Classe candidato
class Candidato{
    //Numero do candidato
    private $numero;
    //Nome do cadidato
    private $nome; 
    //Partido do candidato
    private $partido;
    //Se o candidato foi eleito ou nao
    private $eleito;
    //Quantidade de votos do candidato
    public $votos;
    
    //Construtor de candidato
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
    
    //Retorna atributo eleito
    public function getEleito(){
        return $this->eleito;
    }
    
    //Ordena por votos
    public static function sortByVotos($first,$second){
        return $second->votos > $first->votos;
    }
}

?>