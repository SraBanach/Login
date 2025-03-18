<?php 
// 
//echo '<h1>Cadastro</h1>';
// ordem importa o <pre> precisa estar encima do vardump
echo '<pre>';
// $_post -> variavel global, ela funciona em todo o projeto.
//var_dump($_POST);
// visualizar a variavel global $_POST

$nomeFormulario = $_POST['nome'];
$usuarioFormulario = $_POST['usuario'];
$senhaFormulario = $_POST['senha'];
$NascimentoFormulario = $_POST['ano_nascimento'];
$cpfFormulario = $_POST['cpf'];
$telefone_1Formulario = $_POST['telefone_1'];
$telefone_2Formulario = $_POST['telefone_2'];
$logradouroFormulario = $_POST['logradouro'];
$n_casaFormulario = $_POST['n_casa'];
$bairroFormulario = $_POST['bairro'];
$cidadeFormulario = $_POST['cidade'];

$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
// dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1

$user = 'root';
// a variavel $user diz que o usuario é o root 

$password = '';
// senha para acessar o banco de dados. 

$banco = new PDO($dsn, $user, $password);
// a variavel $banco contém as variavel da conexão com o banco.

$insert = 'INSERT INTO tb_pessoa (nome,ano_nascimento,cpf,telefone_1,telefone_2,logradouro,n_casa,bairro,cidade)  VALUES (:nome,:ano_nascimento,:cpf,:telefone_1,:telefone_2,:logradouro,:n_casa,:bairro,:cidade)';
// script para inserir as informações  da tabela tb_alunos da coluna nome

$bancoprepara = $banco->prepare($insert);
// a variavel $bancoprepara para a variavel $banco preparar o script da variavel insert

$bancoprepara->execute([
    // variavel bancoprepara vai executar
    ':nome' => $nomeFormulario,
    ':ano_nascimento' => $NascimentoFormulario,
    ':cpf' => $cpfFormulario,
    ':telefone_1' => $telefone_1Formulario,
    ':telefone_2' => $telefone_2Formulario,
    ':logradouro' => $logradouroFormulario,
    ':n_casa' => $n_casaFormulario,
    ':bairro' => $bairroFormulario,
    ':cidade' => $cidadeFormulario,

]);
// ---------------------------------------------------------------
$id= $banco -> lastInsertId();

//echo $id;


$insert = 'INSERT INTO tb_usuario (usuario,senha,id_pessoa) VALUES (:usuario, :senha, :id_pessoa)' ;
// script para inserir as informações  da tabela tb_alunos da coluna nome

$box = $banco->prepare($insert);
// o box vai guardar o banco preparado. 

$box->execute([
    // o box vai executar
    ':id_pessoa' => $id,
    ':usuario' => $usuarioFormulario,
    ':senha' => $senhaFormulario,
]);

?>







<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de Usuário</title>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 200vh; background-color: #0e0e0e; color: #f2f2f2;">
    <form action="cadastro.php" method="POST" class="p-4 rounded shadow bg-dark text-light" style="width: 600px;">
        <br>
        <h2 class="text-center">Cadastro</h2>
        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
        
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" placeholder="nome completo" name="nome" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Ano de Nascimento:</label>
            <input type="date" placeholder="xxxx" name="ano_nascimento" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">CPF:</label>
            <input type="number" placeholder="xxx.xxx.xxx-xx" name="cpf" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone 1:</label>
            <input type="number" placeholder="(xx)x-xxxx-xxxx" name="telefone_1" class="form-control"required ><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone 2:</label>
            <input type="number" placeholder="telefone (opcional)" name="telefone_2" class="form-control"><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Logradouro:</label>
            <input type="text" placeholder="logradouro" name="logradouro" class="form-control"required ><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Número da Casa:</label>
            <input type="number" placeholder="N° Casa" name="n_casa" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Bairro:</label>
            <input type="text" placeholder="bairro" name="bairro" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Cidade:</label>
            <input type="text" placeholder="cidade" name="cidade" class="form-control"required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Usuário:</label>
            <input type="text" placeholder="usuario" name="usuario" class="form-control"required><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha:</label>
            <input type="text" id="senha" placeholder="senha" name="senha" class="form-control" maxlength="8"><br>
        </div>
        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
        <a href="index.php" class="btn btn-light w-100 mt-2">Voltar</a>
    </form>
    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            var senha = document.querySelector("input[name='senha']").value;
            if (senha.length < 8) {
                alert("A senha deve conter no mínimo 8 dígitos!");
                event.preventDefault();
            }
        });
    </script>

</body>
</html>
