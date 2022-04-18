<?php 
require "conexao.php";
require "tela.php";

if(isset($_POST['Nome'])){
    $sql = $pdo->prepare("INSERT INTO medico VALUES (null,?,?,?,?)");
    $sql->execute(array($_POST['Nome'],$_POST['idade'],$_POST['genero'],$_POST['especialidade']));
}
?>

<form method="POST">
    <b>Cadastrar Médicos</b><br>
    <p>Digite o nome</p><input type="text" name="Nome">
    <p>Digite a idade</p><input type="text" name="idade">
    <p>Digite o genero</p><input type="text" name="genero">
    <p>Digite a especialidade</p><input type="text" name="especialidade"><br><br>
    <input type="submit" value="Enviar">
    <b><br><br>lista de médicos</b><br><hr>

<?php 
$sql = $pdo->prepare("SELECT * FROM medico ORDER BY nome");
$sql->execute();

$fetchMedico = $sql->fetchAll();

foreach($fetchMedico as $key => $valor)
    echo '<a href="index.php?delete='.$valor['CRM'].'">Excluir cadastro<br></a>'.'<a href="atualizar.php?update='.$valor['CRM'].'">Atualizar cadastro<br></a>'."Nome: ".$valor['nome'].",  idade: ".$valor['idade'].",  Gênero: ".$valor['genero'].",  Especialidade: ".$valor['especialidade']."<br><hr>";
?>

<?php
if(isset($_GET['delete'])){
    $CRM = (int)$_GET['delete'];
    $pdo->exec("DELETE FROM medico WHERE CRM=$CRM");
    header("Location: index.php");
}
?>