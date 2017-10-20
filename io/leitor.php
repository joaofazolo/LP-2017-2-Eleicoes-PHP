<?php
function lerCSV($nome){
    if(($arqEntrada = fopen($nome,"r"))!==false){
        $linha = fgetcsv($arqEntrada,1000,";");
        $i = 0;
        while(($linha = fgetcsv($arqEntrada,1000,";"))!==false){
            $split = explode("-",$linha[3]);
            $auxEleito = false;
            if($linha[0][0]=="*")
                $auxEleito = true;
            if(sizeof($split)==2)
                $vetCandidatos[$i] = new Candidato($linha[1],$linha[2],new Partido($split[0],$split[1]),$auxEleito,$linha[4]);
            else
                $vetCandidatos[$i] = new Candidato($linha[1],$linha[2],new Partido($split[0],"nenhuma"),$auxEleito,$linha[4]);
            echo $vetCandidatos[$i]->numero . " " . $vetCandidatos[$i]->nome ." ". $vetCandidatos[$i]->partido->sigla . " " . $vetCandidatos[$i]->partido->coligacao . " " . $vetCandidatos[$i]->eleito . "<br/>";
            $i++;        
        }
    }
}
?>