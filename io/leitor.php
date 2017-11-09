<?php
include_once(dirname(__DIR__).'\domain\candidato.php');
include_once(dirname(__DIR__).'\domain\partido.php');


$vetCandidatos;

$vagas;

if(isset($_POST['ArquivoEntrada']))
@LerCSV("../".$_POST['ArquivoEntrada']);
//echo htmlspecialchars($_POST['ArquivoEntrada']);

//var_dump($vetCandidatos);

if(isset($vetCandidatos)){
    NumeroDeVagas($vetCandidatos);
    echo "<br>";
    TotalVotosNominais($vetCandidatos);
    VereadoresEleitos($vetCandidatos);
    echo "<br>";
    CandidatosMaisVotados($vetCandidatos);
}


function LerCSV($nome){
    if(($arqEntrada = fopen($nome,"r"))!==false){
        $linha = fgetcsv($arqEntrada,1000,";");
        $i = 0;
        global $vetCandidatos;
        while(($linha = fgetcsv($arqEntrada,1000,";"))!==false){
            $split = explode("-",$linha[3]);
            $auxEleito = false;
            if($linha[0][0]=="*")
                $auxEleito = true;
            if(sizeof($split)==2)
                $vetCandidatos[$i] = new Candidato($linha[1],$linha[2],new Partido($split[0],$split[1]),$auxEleito,str_replace('.',"",$linha[4]));
            else
                $vetCandidatos[$i] = new Candidato($linha[1],$linha[2],new Partido($split[0],"nenhuma"),$auxEleito,str_replace('.',"",$linha[4]));
            //$vetCandidatos[$i]->printCandidato();
            $i++;        
        }
        //ordena
        usort($vetCandidatos,array("Candidato","sortByVotos"));
    }
    else
        echo "Arquivo de Entrada nao encontrado";
}



function NumeroDeVagas($vetCandidatos){
    $count=0;
    foreach($vetCandidatos as $candidato){
        if($candidato->getEleito())
            $count++;
    }
    echo "Numero de Vagas: " . $count . "<br>";
}

function TotalVotosNominais($vetCandidatos){
    $count = 0;
    foreach($vetCandidatos as $candidato){
        $count += $candidato->votos;
    }
    echo "Quantidade de votos nominais: " . $count . "<br>";
}

function VereadoresEleitos($vetCandidatos){
    echo "<br> Vereadores Eleitos: <br>";
    $i = 1;
    foreach($vetCandidatos as $candidato){
        if($candidato->getEleito()){
            echo $i . " - ";
            $candidato->printCandidato();
            $i++;
        }
    }
    $GLOBALS['vagas'] = $i;
}

function CandidatosMaisVotados($vetCandidatos){
    echo "Candidatos mais votados: <br>";
    $i = 1;
    foreach($vetCandidatos as $candidato){
        if($i>$GLOBALS['vagas']-1)
            return;
        echo $i . " - ";
        $candidato->printCandidato();
        $i++;
    }
}

?>