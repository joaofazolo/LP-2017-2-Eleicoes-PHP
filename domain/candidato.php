<?php
//Classe candidato
        class Candidato{
            public function __construct($numero,$nome,$partido,$eleito,$votos){
                $this->numero = $numero;
                $this->nome = $nome;
                $this->partido = $partido;
                $this->eleito = $eleito;
                $this->votos = $votos;
            }
            public $numero;
            public $nome;
            public $partido;
            public $eleito;
            public $votos;
        }
    
?>