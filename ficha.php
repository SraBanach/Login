<?php

$id_pessoa = $_GET['id_pessoa'];

//Parametros de conexao, pego esses valores da documentacao;
//127.0.0.1 = local 
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

//PDO =  biblioteca no padrao de uma classe; sempre que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
//$banco esta na rua(dsn), numero(user), chave(password)
$banco = new PDO($dsn, $user, $password);

//variavel sempre tem $ 
//variavel select, o que eu quero que liste a tabela de informação;  


$select = 'SELECT tb_pessoa.*, tb_usuario.* FROM tb_pessoa INNER JOIN tb_usuario ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_usuario.id_pessoa=' . $id_pessoa;

//variavel banco -> consulta a variavel select -> e agora vc vai me retorno;
//e toda  vez que consulta ele vai guardar dentro da minha variavel dados;
$dados= $banco->query($select)->fetch();



//fechando a tag php 
?>













<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    main{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    form{
        width: 600px;
    }
    img{
        width: 200px;
        object-fit: cover;
    }
</style>
<main class="container text-center my-5">
    <form action="#">
        <label for="nome">Nome</label>
        <input type="text" value= "<?= $dados['nome'] ?>" disabled class="form-control">
        <div class="row mt-2">
            <div class="col">
                <label for="ano_nascimento">Ano nascimento</label>
                <input type="number" value= "<?php echo $dados ['ano_nascimento'] ?>" disabled class="form-control">
            </div>
            <div class="col">
                <label for="cpf">cpf</label>
                <input type="cpf" value= "<?= $dados ['cpf'] ?>" disabled class="form-control">
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="telefone_1">Telefone</label>
                    <input type="number" value= "<?= $dados ['telefone_1'] ?>" disabled class="form-control">
                </div>
            <div class="col">
                    <label for="telefone_2">Telefone</label>
                    <input type="number" value= "<?= $dados ['telefone_2'] ?>" disabled class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" value= "<?= $dados ['logradouro'] ?>" disabled class="form-control">
                </div>
            </div>
            <div class="col">
                    <label for="numero">N° Casa</label>
                    <input type="number" value= "<?= $dados ['n_casa'] ?>" disabled class="form-control">
            </div>

            <div class="col">
                    <label for="bairro">Bairro</label>
                    <input type="text" value= "<?= $dados ['bairro'] ?>" disabled class="form-control">
            </div>
            <div class="col">
                    <label for="cidade">Cidade</label>
                    <input type="text" value= "<?= $dados ['cidade'] ?>" disabled class="form-control">
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="usuario">Usuario</label>
                    <input type="text" value= "<?= $dados ['usuario'] ?>" disabled class="form-control">
                </div>
                <div class="col">
                    <label for="senha">Senha</label>
                    <input type="text" value= "<?= $dados ['senha'] ?>" disabled class="form-control">
                </div>
            </div>


        </div>
    </form>
</main>