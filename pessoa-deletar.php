<?php
 
echo'<h1>Aluno deletar</h1>';
// o titulo aluno deletar aparece na pagina.
 
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
// dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1
 
$user = 'root';
// a variavel $user diz que o usuario é o root
 
$password = '';
// senha para acessar o banco de dados, no qual esta vazio.
 
$banco = new PDO($dsn, $user, $password);
// a variavel $banco contém as variavel da conexão com o banco.
 
// variavel global começa $_
// var_dump($_GET);
 
$idFormulario = $_GET['id'];
 
// apagando a tabela tb_alunos
$delete = 'DELETE FROM tb_pessoa WHERE id = :id';
// script para excluir o registro da tabela tb_alunos onde o id do aluno selecionado
 
$box = $banco->prepare($delete);
// variavel box que contém o $banco que prepara o script da variavel delete
$box->execute([
    // variavel box executa o
    ':id' => $idFormulario
]);
 
// apagando a tabela tb_info_alunos
$delete = 'DELETE FROM tb_usuario WHERE id_pessoa = :id';
// variavel box, contem o a variavel banco para preparar o script $delete
$box = $banco->prepare($delete);
// variavel box que contém o $banco que prepara o script da variavel delete
 
$box->execute([
    // variavel box executa o
    ':id' => $idFormulario
]);
 
echo
'<script>
    alert("Aluno apagado com sucesso!!!")
    // aparecer uma mensagem de aluno apagado com sucesso
    window.location.replace("index.php")
 
</script>';
 
// header('location:index.php');
 