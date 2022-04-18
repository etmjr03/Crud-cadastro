<?php
require "conexao.php";
require "tela.php";

$CRM = filter_input(INPUT_POST, 'CRM');
$nome = filter_input(INPUT_POST, 'nome');
$idade = filter_input(INPUT_POST, 'idade');
$genero = filter_input(INPUT_POST, 'genero');
$especialidade = filter_input(INPUT_POST, 'especialidade');
var_dump($CRM,$nome,$idade,$genero,$especialidade);
if($CRM && $nome && $idade && $genero && $especialidade){
    $sql = $pdo->prepare("UPDATE `medico` SET `nome` = '$nome', `idade` = '$idade', `genero` = '$genero', `especialidade` = '$especialidade' WHERE `medico`.`CRM` = $CRM");
    $sql->execute();

    header("Location: index.php");
    exit;
} else {
    echo "falhou!";
}

?>