<?php
// echo '<h1>Aluno Editar</h1>';
// o titulo aluno editar aparece na pagina.
 
// echo '<pre>';
// echo pre -> organiza as informações na vertical
 
// var_dump($_POST);
// aparece a variavel global
 
 
$editarId = $_POST['id'];
$editarSenha = $_POST['senha'];
$editarTelefone_1 = $_POST['telefone_1'];
$editarTelefone_2 = $_POST['telefone_2'];
$editarLogradouro = $_POST['logradouro'];
 
 
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
// dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1
 
$user = 'root';
// a variavel $user diz que o usuario é o root
 
$password = '';
// senha para acessar o banco de dados.
 
$banco = new PDO($dsn, $user, $password);
// a variavel $banco contém as variavel da conexão com o banco.
 
$update = 'UPDATE tb_usuario set senha = :senha where id_pessoa = :id' ;
// script para fazer uma atualização da tabela tb_alunos no nome onde o id do aluno selecionado
 
 
$banco->prepare($update)->execute([
// a variavel $banco prepara o script update, logo executar
    ':id'=> $editarId,
    ':senha'=>$editarSenha,
]);
 
// --------------------------------------
$update = 'UPDATE tb_pessoa set telefone_1 = :telefone_1, telefone_2 = :telefone_2, logradouro = :logradouro where id = :id' ;
// script para fazer uma atualização da tabela tb_info_alunos nas colunas da tabela que são: telefone,email,nascimento e imagem onde o id do aluno selecionado
 
$banco->prepare($update)->execute([
// a variavel $banco prepara o script update, logo executar
 
    ':id'=> $editarId,
    ':telefone_1' => $editarTelefone_1,
    ':telefone_2' => $editarTelefone_2,
    ':logradouro' => $editarLogradouro,
]);
 
header('location:loginSucesso.php');
 
 
