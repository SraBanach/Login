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

    </form>
</body>
</html>