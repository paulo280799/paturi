<?php

use Dompdf\Dompdf;

require_once ('../assets/dompdf/autoload.inc.php');

include ("../assets/conection.php");

$pesquisa = $_POST['pesquisa'];

if(empty($pesquisa)){

    echo ("<script LANGUAGE='JavaScript'>window.alert('dados inválidos');window.location.href='https://paturismurfs.com/paturi/';</script>");

}else{

    $array = explode('-', $pesquisa);

    $test = count($array);

    for ($i=0; $i < $test; $i++) {

        $string = explode(':', $array[$i]);

        $count = count($string);

        if($count > 4 OR $count < 4){

            echo ("<script LANGUAGE='JavaScript'>window.alert('string quebrada');window.location.href='https://paturismurfs.com/paturi/';</script>");
            exit;
            
        }else{

            $user = base64_encode($string['1']);
            $senha = base64_encode($string['2']);
            $essencia = $string['3'];

            $sql = "SELECT * FROM paturism WHERE User = '$user' AND  Pass = '$senha'";

            if (!$result = mysqli_query($strcon,$sql)) {
    
                echo ("<script LANGUAGE='JavaScript'>window.alert('dados não encotrados');window.location.href='https://paturismurfs.com/paturi/';</script>");
                exit;

            }else{
                
                $dados = mysqli_fetch_array($result);
                
                $dados['user_ip'] = $essencia;
                $dados['user_name'] =  base64_decode($dados[1]);
                $dados['user_pass'] =  base64_decode($dados[2]);
                $dados['user_mail'] =  base64_decode($dados[3]);
                $dados['user_nasc'] =  base64_decode($dados[4]);
                $dados['user_date'] =  base64_decode($dados[5]);

                if($dados['user_name'] === $string['1'] && $dados['user_pass'] === $string['2']){

                    $file_to_save = '../assets/temp/'; 
                    
                    $dompdf = new DOMPDF(["enable_remote" => true]);
                    ob_start();
                    require __DIR__ . "/pdf.php";
                    $dompdf->loadHtml(ob_get_clean());
                    $dompdf->setPaper('a4');
                    $dompdf->render();
                    
                    file_put_contents($file_to_save.$dados['user_name']."-".$dados['user_ip'].".pdf", $dompdf->output()); 
                
                }else{

                echo ("<script LANGUAGE='JavaScript'>window.alert('dados inválidos');window.location.href='https://paturismurfs.com/paturi/';</script>");
                exit;

                }
            }
        }
         //echo "aloe";      
    }

    $fileName  = 'contas.zip';
    $path      =  '../assets/temp';
    $fullPath  = $path.'/'.$fileName;

   // Leitura no diretório para coletar os nomes dos arquivos.
    $scanDir = scandir($path);

    // Removendo os 02 primeiros indices do array, referente ao (.) e (..).
    array_shift($scanDir);
    array_shift($scanDir);


    $zip = new \ZipArchive();

    // Criamos o arquivo e verificamos se ocorreu tudo certo
    if( $zip->open($fullPath, \ZipArchive::CREATE) ){

        // adiciona ao zip todos os arquivos contidos no diretório.
        foreach($scanDir as $file){
            $zip->addFile($path.'/'.$file, $file);
        }
        // fechar o arquivo zip após a inclusão dos arquivos desejados
        $zip->close();
    }

    // Primeiro nos certificamos de que o arquivo zip foi criado.
    if(file_exists($fullPath)){
        // Forçamos o donwload do arquivo.
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        readfile($fullPath);
        //removemos o arquivo zip após download
        $files = glob('../assets/temp/*'); 
            foreach($files as $file){
                if(is_file($file))
                unlink($file); 
            }
    }
    
}

?>