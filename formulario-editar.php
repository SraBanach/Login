<!-- ter acesso ao Bootstrap, com todos os estilos prontos -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .formulario{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }  
</style>
<section class="linha-formulario">
    <div class="formulario" class="text-center"9>


<?php
// tag php para inserir dados php; 

$id_pessoa_alterar = $_GET['id_pessoa_alterar'];
var_dump($id_pessoa_alterar);
//var_dump para exibir;

//peguei essas informaçoes da ficha que já existe; 

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
$select = 'SELECT tb_pessoa.*, tb_usuario.* FROM tb_pessoa INNER JOIN tb_usuario ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_usuario.id_pessoa=' . $id_pessoa_alterar;

//variavel banco -> consulta a variavel select -> e agora vc vai me retorno;
//e toda  vez que consulta ele vai guardar dentro da minha variavel dados;
$dados= $banco->query($select)->fetch();

?>


        <!-- metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo -->
        <!-- Action: ele é para onde deve enviar os dados -->
        <form action="./pessoa-editar.php" method="POST">

            <h2>Editar Cadastro</h2>
<!-- Dentro de value é o placeholder -->
            <!-- type hidden é para ficar oculto para o usuario, informaçoes auxiliares estao no formulario de forma oculta para facilitar;  -->
            <input type="hidden" placeholder="id" name="id" value="<?= $dados ['id']?>"><br>
            <input type="text" value= "<?= $dados['nome'] ?>" disabled class="form-control"><br>
            <input type="number" value= "<?php echo $dados ['ano_nascimento'] ?>" disabled class="form-control"><br>
            <input type="cpf" value= "<?= $dados ['cpf'] ?>" disabled class="form-control"><br>
            <input type="number" value= "<?= $dados ['telefone_1'] ?>"  class="form-control"><br>
            <input type="number" value= "<?= $dados ['telefone_2'] ?>"  class="form-control"><br>
            <input type="text" value= "<?= $dados ['logradouro'] ?>"  class="form-control"><br>
            <input type="number" value= "<?= $dados ['n_casa'] ?>"  class="form-control"><br>
            <input type="text" value= "<?= $dados ['bairro'] ?>"  class="form-control"><br>
            <input type="text" value= "<?= $dados ['cidade'] ?>"  class="form-control"><br>
            <input type="text" value= "<?= $dados ['usuario'] ?>" disabled class="form-control"><br>
            <input type="text" value= "<?= $dados ['senha'] ?>"  class="form-control"><br>
            <input type="submit">
        </form>
    </div>
</section>