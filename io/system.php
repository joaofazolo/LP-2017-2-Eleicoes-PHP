<?php
include_once(dirname(__DIR__).'\domain\candidato.php');
include_once(dirname(__DIR__).'\domain\partido.php');

//Vetor de candidatos
$vetCandidatos;

//Quantidade de vagas
$vagas;

//Se variavel ArquivoEntrada esta setada le csv
if(isset($_POST['ArquivoEntrada']))
LerCSV("../".$_POST['ArquivoEntrada']);

//Chama funcoes para gerar relatorios
if(isset($vetCandidatos)){
    NumeroDeVagas($vetCandidatos);
    echo "<br>";
    TotalVotosNominais($vetCandidatos);
    VereadoresEleitos($vetCandidatos);
    echo "<br>";
    CandidatosMaisVotados($vetCandidatos);
}

//Funcao para ler csv
function LerCSV($nome){
    //Abre o arquivo csv
    if(($arqEntrada = fopen($nome,"r"))!==false){
        //variavel linha recebe a primeira linha do csv
        $linha = fgetcsv($arqEntrada,1000,";");

        //Contador de candidatos
        $i = 0;

        //Pega o vetor vetCandidatos global
        global $vetCandidatos;

        //Enquanto variavel linha nao for nula pega a proxima linha
        while(($linha = fgetcsv($arqEntrada,1000,";"))!==false){
            //Vetor split recebe partido e coligacao
            $split = explode("-",$linha[3]);

            //Variavel auxEleito e inicializada como false
            $auxEleito = false;

            //Se primeiro character da linha for "*", auxEleito recebe true
            if($linha[0][0]=="*")
            $auxEleito = true;
            
            //Verifica se o candidato tem coligacao
            if(sizeof($split)==2)
            //Cria um candidato com coligacao
            $vetCandidatos[$i] = new Candidato($linha[1],$linha[2],new Partido($split[0],$split[1]),$auxEleito,str_replace('.',"",$linha[4]));
            //Caso nao tenha coligacao, partido recebe "nenhuma"
            else
            $vetCandidatos[$i] = new Candidato($linha[1],$linha[2],new Partido($split[0],"nenhuma"),$auxEleito,str_replace('.',"",$linha[4]));
            
            //Incrementa contador de candidatos
            $i++;        
        }
        //Ordena o vetor e candidator utilizando a funcao "sortByVotos"
        usort($vetCandidatos,array("Candidato","sortByVotos"));
    }
    //Caso o arquivo nao exista
    else
    echo "Arquivo de Entrada nao encontrado";
}

//Gerar relatorio do numero de vagas
function NumeroDeVagas($vetCandidatos){
    //Inicializa o contador em 0
    $count=0;
    
    //Para cada candidato no vetor de candidatos, se possui atributo eleito igual a true incrementa contador
    foreach($vetCandidatos as $candidato){
        if($candidato->getEleito())
        $count++;
    }
    
    //Imprime numero de vagas
    echo "Numero de Vagas: " . $count . "<br>";
}

//Gera relatorio de votos nominais
function TotalVotosNominais($vetCandidatos){
    //Inicializa o contador
    $count = 0;

    //Para cada candidato no vetor de candidatos soma os votos
    foreach($vetCandidatos as $candidato){
        $count += $candidato->votos;
    }

    //Imprime a quantidade de votos nominais
    echo "Quantidade de votos nominais: " . $count . "<br>";
}

//Gera relatorio de vereadores eleitos
function VereadoresEleitos($vetCandidatos){
    echo "<br> Vereadores Eleitos: <br>";
    $i = 1;

    //Para cada candidato no vetor de candidatos, imprime os que foram eleitos
    foreach($vetCandidatos as $candidato){
        if($candidato->getEleito()){
            echo $i . " - ";
            $candidato->printCandidato();
            $i++;
        }
    }

    //Salva a quantidade de vagas na variavel global "vagas"
    $GLOBALS['vagas'] = $i;
}

//Gera relatorio de candidatos mais votados
function CandidatosMaisVotados($vetCandidatos){
    echo "Candidatos mais votados: <br>";
    $i = 1;
    
    //Para cada candidato no vetor de candidatos, imprime ate o numero de vagas
    foreach($vetCandidatos as $candidato){
        if($i>$GLOBALS['vagas']-1)
        return;
        echo $i . " - ";
        $candidato->printCandidato();
        $i++;
    }
}

?>