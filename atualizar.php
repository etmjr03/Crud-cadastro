<?php 
require "conexao.php";
require "tela.php";

$CRM = (int)$_GET['update'];
$sql = $pdo->query("SELECT * FROM medico WHERE CRM=$CRM");
$fetchMedico = $sql->fetch(PDO::FETCH_ASSOC);

?>
<form method="POST" action="atualizado.php">
    <b>Cadastrar Médicos</b>
    <input type="hidden" name="CRM" value="<?php echo $fetchMedico['CRM'] ?>">
    <p>Digite o nome</p><input type="text" name="nome" value="<?php echo $fetchMedico['nome'] ?>">
    <p>Digite a idade<br><input type="text" name="idade" value="<?php echo $fetchMedico['idade'] ?>">
    <p>Digite o Gênero<br><input type="text" name="genero" value="<?php echo $fetchMedico['genero'] ?>">
    <p>Digite a especialidade<br><input type="text" name="especialidade" value="<?php echo $fetchMedico['especialidade'] ?>"><br>
    <input type="submit" value="Enviar">
</form>