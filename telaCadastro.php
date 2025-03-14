<?php


// $_post -> variavel global, ela funciona em todo o projeto.
 //metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo
 //Action: ele é para onde deve enviar os dados 
$nome = $_POST['nome'];
$ano_nascimento = $_POST['ano_nascimento'];
$cpf = $_POST['cpf'];
$telefone_1 = $_POST['telefone_1'];
$telefone_2 = $_POST['telefone_1'];
$logradouro = $_POST['logradouro'];
$n_casa = $_POST['n_casa'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];


// Conectar ao banco de dados
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);
//PDO =  biblioteca no padrao de uma classe; sempre que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
//$banco esta na rua(dsn), numero(user), chave(password)

// Inserir na tabela tb_pessoa
$insert = "INSERT INTO tb_pessoa (nome, ano_nascimento, cpf, telefone_1, telefone_2, logradouro, n_casa, bairro, cidade) VALUES (:nome, :ano_nascimento, :cpf, :telefone_1, :telefone_2, :logradouro, :n_casa, :bairro, :cidade)";
$box = $banco->prepare($insert);
$box->execute(['nome' => $nome, 'ano_nascimento' => $ano_nascimento, 'email' => $email]);

//para inserir o id do aluno automaticamente, mesmo adc diretamente do site; 
$id = $banco->lastInsertId();
//-------------------------------------------------------------------------


// Inserir na tabela tb_usuario
//$queryUsuario = "INSERT INTO tb_usuario (pessoa_id, usuario, senha) VALUES (:pessoa_id, :email, :senha)";
//$stmtUsuario = $banco->prepare($queryUsuario);
//$stmtUsuario->execute(['pessoa_id' => $pessoa_id, 'email' => $email, 'senha' => $senha]);

//echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='index.php';</script>";

//echo "Erro ao cadastrar usuário: " . $e->getMessage();


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de Usuário</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #0e0e0e; color: #f2f2f2;">
    <form action="cadastro.php" method="POST" class="p-4 rounded shadow bg-dark text-light" style="width: 400px;">
        <h2 class="text-center">Cadastro</h2>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" name="cpf" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="senha" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
        <a href="index.php" class="btn btn-light w-100 mt-2">Voltar</a>
    </form>
</body>

</html>