<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="PT-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
    <style>
        body {
            display: flex;
            justify-content: center;
            background-color: #0e0e0e;
            color: #f2f2f2;
        }

        form {
            width: 500px;
        }
    </style>
<body>

    <form action="auxlogin.php" method="POST" class="mt-5">


    <h1>Login</h1>
        <input type="text" class="form-control" placeholder="Usuário/E-mail" name="user">
        <br>
        <input type="password" class="form-control" name="password">
        <br>
        <input class="btn btn-success" type="submit">
        <br> 
        <!-- como colocar um link diferente para cada aluno depois da interrogacao passamos os parametros. -->
                <!-- metodo get colocar url do arquivo depois coloco a interrogacao para separar... 
                lado esquerdo  arquivo, lado direiro variavel -->

                <!-- link estilizado como botao do bootstrap 
                href="./ficha.php?id_aluno=<//?= $linha['id'] ?>": Define o destino do link, passando o ID do aluno dinamicamente via URL. -->
        <a class="btn btn-primary" href="./telaCadastro.php?= $linha['id'] ?>" role="button">Cadastrar</a>
        


    </form>
</body>
</html>