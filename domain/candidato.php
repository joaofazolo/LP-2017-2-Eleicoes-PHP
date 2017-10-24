<?php
//Classe candidato
        class Candidato{
            private $numero;
            private $nome;
            private $partido;
            private $eleito;
            public $votos;

            public function __construct($numero,$nome,$partido,$eleito,$votos){
                $this->numero = $numero;
                $this->nome = $nome;
                $this->partido = $partido;
                $this->eleito = $eleito;
                $this->votos = $votos;
            }

            public function printCandidato(){
                echo $this->nome ." (". $this->partido->sigla . 
                ", " . $this->votos . ") - Coligação:" . $this->partido->coligacao ."<br/>";
            }
            
            public function getEleito(){
                return $this->eleito;
            }

            public function sortByVotos($first,$second){
                return strcmp($second->votos,$first->votos);
            }
        }
    
?>