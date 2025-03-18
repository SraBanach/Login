


<h1> Bem vindo! 
    <!-- tela usuario;  -->

<!-- // (update) esqueci senha vai ser para pedir o usuario e cpf = se ele for valido ai pode editar a senha;   -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<!-- ter acesso ao Bootstrap, com todos os estilos prontos -->

<?php
//tag para inserir o codigo php


//Parametros
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
//Parametros de conexao, pego esses valores da documentacao;
//127.0.0.1 = local 
////as vezes precisa de parametro para funcionar a extensao php debug mostra o que falta se passar mouse em cima; 
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

//no php tem uma biblioteca no padrao de uma classe; semore que tiver a palavra new é pq estou fazendo uma conexao; 
//quando tivet type null não é obrigatorio ; 
//variavel banco recebe conexao com o banco ( as informacoes estao la; )
$banco = new PDO($dsn, $user, $password);

//variavel sempre tem $ 
//variavel select, o que eu quero que liste  
$select = 'SELECT * FROM tb_pessoa';

//comando para executar, para rodar; 
//varivel resultado com a junção de banco com select; 
//fetchAll para buscar todas as informaçoes; 
$resultado = $banco->query($select)->fetchAll();

//para organizar o arquivo abaixo, sempre colocar antes do var_dump;
//somente para eu ver, nao no projeto; 
//echo '<pre>';

//comando echo apenas exibe o resultado de tudo; 
//var_dump ele faz um debug da variavel, lembrar de colocar (), mostra tipo de elemento; mas aparece tudo sem organizar, tudo confuso; 
//var_dump($resultado);
// fechando a tag php 
?>

<!-- my-5 para dar um espaço margin -->
<!-- Aplica uma margem vertical (superior e inferior)  -->
<main class="container my-5"> 

</style>
        
    <table class="table table-striped">
        <!-- tabela estilizada pelo bootstrap -->
        <div class="my-3 d-flex justify-content-end">
            <!-- my-3 espacamento superior e inferior
            d-flex: A classe d-flex aplica o estilo de flexbox ao contêiner, permitindo alinhar seus itens de forma flexível.
            justify-content-end: Alinha os itens dentro do contêiner para o final da linha (à direita no caso de layout horizontal). -->

            <a href="cadastro.php" class="btn btn-sucess"> Cadastrar </a>
            <!-- link da pagina cadastrar aluno -->
        </div>
        <tr> 
            <!-- cria linha do cabeçalho -->
            <td>
                <!-- linha da tabela -->
                id
            </td>
                <!-- fechando a tag linha -->
            <td>
                nome
            </td>
            <td class="text-center">
                <!-- centralizando o conteudo dentro de cada cedula -->
                Ações
            </td>
        </tr>
        <!-- 
    //foreach = para laço(de procura) de repetição automatico em array; 
    as - para atribuir; só usa a seta dentro do foreach-->
        <?php foreach ($resultado as $linha) { ?>
            <tr>
                <td> <?php echo $linha['id'] ?> </td>
                <td> <?= $linha['nome'] ?> </td>
                <td class="text-center"> 
                <!-- como colocar um link diferente para cada aluno depois da interrogacao passamos os parametros. -->
                <!-- metodo get colocar url do arquivo depois coloco a interrogacao para separar... 
                lado esquerdo  arquivo, lado direiro variavel -->

                <!-- link estilizado como botao do bootstrap 
                href="./ficha.php?id_aluno=<//?= $linha['id'] ?>": Define o destino do link, passando o ID do aluno dinamicamente via URL. -->
                <a class="btn btn-primary" href="./ficha.php?id_pessoa=<?= $linha['id'] ?>" role="button">Abrir</a>
                <a class="btn btn-warning" href="./formulario-editar.php?id_pessoa_alterar=<?= $linha['id'] ?>" role="button">Editar</a>
                <a class="btn btn-danger" href="./pessoa-deletar.php?id=<?= $linha['id'] ?>" role="button">Excluir</a>
                </td>
            </tr>
        <?php } ?>
        <!-- fim do foreach -->
    </table>
</main>