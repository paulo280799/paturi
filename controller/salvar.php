<?php

set_time_limit(false);

include ("../assets/conection.php");

$salvar = $_POST['salvar'];


if(empty($salvar)){

    echo ("<script LANGUAGE='JavaScript'>window.alert('dados inválidos');window.location.href='https://paturismurfs.com/paturi/';</script>");

}else{

    $array = explode('-', $salvar);


    $test = count($array);

    for ($i=0; $i < $test; $i++) {
        
        $string = explode(';', $array[$i]);


        $count = count($string);
        $campo = implode(';', $string);

        if($count > 6 OR $count < 6){
           
            echo ("<script LANGUAGE='JavaScript'>window.alert('linha incorreta - $campo');window.location.href='https://paturismurfs.com/paturi/view/paturi.php';</script>");
            exit;
            
        }else{

            $user = base64_encode($string['1']);
            $pass = base64_encode($string['2']);
            $email = base64_encode($string['3']);
            $dt_nasc = base64_encode($string['4']);
            $dt_criacao = base64_encode($string['5']);
    
            $sql = "INSERT INTO paturism (Id,User, Pass, Email, dt_nasc, dt_criacao) VALUES ('','$user', '$pass','$email','$dt_nasc', '$dt_criacao')";
            //echo $sql."<br>";
            
            if (mysqli_query($strcon, $sql)) {
                
            } else {
                echo mysqli_error($strcon)."<br><br>";
            }
        }
    }echo ("<script LANGUAGE='JavaScript'>window.alert('$test - contas salvas.');window.location.href='https://paturismurfs.com/paturi/view/paturi.php';</script>");
}
    ?>