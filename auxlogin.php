<?php

echo '<h1> AuxLogin.php </h1>';
    // var_ dump para visualizar 
   // var_dump($_POST);

    $userForm = $_POST ['user']; 
    $passwordForm = $_POST ['password'];


    $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
    $user = 'root';
    $password = '';
    // conexao com o banco, minha variavel do banco ;
    $banco = new PDO($dsn, $user, $password);
    // O ponto final é o simbolo de contatenação no php; 
    //
    $queryUsuarioSenha = 'SELECT * FROM tb_usuario WHERE usuario = "' . $userForm. '"AND senha = "' .$passwordForm .'"'; 
    //echo somente para visualizar 
    //echo $queryUsuarioSenha;
    //fetch para uma consulta unica, fetchAll para varios campos; 
    //quase sempre se le de tras pra frente = resultado do meu scrip do meu banco; 
    $resultado = $banco-> query($queryUsuarioSenha)->fetch(); 

    //como deicar vixivel para admin 
    $status = $resultado ['status'];
    ?>
    <!-- abrir e fechar a tag para colocar um html dentro dela, assim ele nao aparece nem no dev tolls -->
    <?php if($status == 'admin') { ?>

    
        <h1>Bem vindo USUARIO ADMIN</h1>
    <?php } ?>


    <h1>bem vindo USUARIO COMUM</h1>
    <!-- ternario é uma condicao abre e fecha na mesma linha 
    é um if simplificado, ultilizado em apenas uma linha;  -->



















    <?php
    //var_dump ($resultado); 

    if (!empty($resultado)&& $resultado != false){ 
        header ('location:loginSucesso.php'); 

    }   else {    
        echo"    
        <script>
            alert('Senha ou CPF inválidos');
        </script>";
        header('location:index.php');
    }