<?php
//Classe candidato
        class Candidato{
            private $numero;
            private $nome;
            private $partido;
            private $eleito;
            private $votos;

            public function __construct($numero,$nome,$partido,$eleito,$votos){
                $this->numero = $numero;
                $this->nome = $nome;
                $this->partido = $partido;
                $this->eleito = $eleito;
                $this->votos = $votos;
            }

            public function printCandidato(){
                echo $this->numero . " " . $this->nome ." ". $this->partido->sigla . 
                " " . $this->partido->coligacao . " " . $this->eleito . "<br/>";
            }
            
            public function getEleito(){
                return $this->eleito;
            }
        }
    
?>