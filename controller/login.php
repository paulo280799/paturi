<?php

    session_start();

    include ("../assets/conection.php");

    $login = mysqli_escape_string($strcon, $_POST['email']);
    $senha = mysqli_escape_string($strcon, $_POST['senha']);

    $senha = md5($senha);

    $sql = "SELECT * from users WHERE user = '$login' AND pass = '$senha'";
    $resultado = mysqli_query($strcon, $sql);

    print_r($resultado);

    $dados = mysqli_fetch_array($resultado);
    
    if($login == $dados['1'] && $senha == $dados['2']){
        $_SESSION['status'] = 'LOGADO';
        header('Location: ../view/paturi.php');
        
    }else{
        echo ("<script LANGUAGE='JavaScript'>window.alert('dados inválidos');window.location.href='https://paturismurfs.com/paturi/';</script>");
        exit;
    }

    
?>