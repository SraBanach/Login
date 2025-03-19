<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    body{
        background-color: #0e0e0e;
        color: #f2f2f2;
    }
    .formulario{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;;
    }   
    form{
        width: 500px;
    }
    .btn-primary{
        width: 500px;
    }
</style>
<section class="linha-formulario">
    <div class="formulario" class="text-center">
        <h1>Esqueci a senha</h1>

        <form action="./usuario-esquecer.php" method="POST" >
            <input type="text" placeholder="Insira o usuario" name="usuario" class="form-control"><br>

            <input type="text" placeholder="Insira o cpf" name="cpf" class="form-control"><br>

            <input type="text" placeholder="Insira sua nova senha" name="senha" class="form-control"><br>

            <input type="submit" class="btn btn-primary" class="text-center">
        </form>
    </div>
</section>