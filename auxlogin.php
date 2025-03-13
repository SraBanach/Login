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

    //var_dump ($resultado); 

    if (!empty($resultado)&& $resultado != false){ 
        header ('location:loginSucesso.php'); 

    }   else { 
        header('location:index.php'); 
    }