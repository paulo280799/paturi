<?php

require_once('assets/PHPMailer/src/PHPMailer.php');
require_once('assets/PHPMailer/src/SMTP.php');
require_once('assets/PHPMailer/src/Exception.php');
require_once('assets/PHPMailer/src/OAuth.php');

require_once('assets/dompdf/autoload.inc.php');

include("assets/conection.php");

set_time_limit(false);

use Dompdf\Dompdf;

	$tipo = "0";
	$email = "paulocasimio@gmail.com";


	// essa query tem que retornar uma conta
	$sql = "SELECT * FROM `paturism` WHERE tipo = '$tipo' and status = '1' LIMIT 1";

	if (!$result = mysqli_query($strcon,$sql)) {
		// TRECHO DE CODIGO QUE ENVIA UM EMAIL PARA CARLOS INFORMANDO SE DEU PROBLEMA NO BANCO DE DADOS
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->isSMTP();

		$mail->Port = "465";
		$mail->Host = "smtp.gmail.com";
		$mail->isHTML(true);
		$mail->SMTPSecure = "ssl";
		$mail->Mailer = "smtp";
		$mail->CharSet =  "UTF-8";

		$mail->SMTPAuth = true;
		$mail->Username = "paulocasimiro357@gmail.com";
		$mail->Password = "murdida360";

		$mail->SingleTo = true;

		$mail->From = "paulocasimiro357@gmail.com";
		$mail->FromName = "paulocasimiro357@gmail.com";
		$mail->addAddress($email);
		$mail->Subject = "ATENวรO";
		$mail->Body = "NรO TEM CONTAS NO BANCO DE DADOS!!!!!!!!!!!";

		exit;
	}else{

		$dados = mysqli_fetch_array($result);

		if(isset($dados)){

			$pdf = 'assets/temp/'.base64_decode($dados['User'])."-".$dados['essencia'].".pdf";

			$file_to_save = 'assets/temp/'; 
			// TRECHO DE CODIGO QUE CRIA O ARQUIVO PDF COM OS DADOS DA CONTA
			if ( get_magic_quotes_gpc() ) $old_limit = ini_set("memory_limit", "16M"); 
			
			$dompdf = new DOMPDF(["enable_remote" => true]);
			ob_start();
			require  "assets/pdf.php";
			$dompdf->loadHtml(ob_get_clean());
			$dompdf->setPaper('a4');
			$dompdf->render();

			file_put_contents($file_to_save.base64_decode($dados['User'])."-".$dados['essencia'].".pdf", $dompdf->output());	

			$sql = "UPDATE `paturism` SET status = '0' WHERE Id  = '$id' ";

			if (mysqli_query($strcon, $sql)) {

				// TRECHO DE CODIGO QUE ENVIA O EMAIL COM O ARQUIVO PARA O CLIENTE
				$mail = new PHPMailer\PHPMailer\PHPMailer();
				$mail->isSMTP();

				$mail->Port = "465";
				$mail->Host = "smtp.gmail.com";
				$mail->isHTML(true);
				$mail->SMTPSecure = "ssl";
				$mail->Mailer = "smtp";
				$mail->CharSet =  "UTF-8";

				$mail->SMTPAuth = true;
				$mail->Username = "paulocasimiro357@gmail.com";
				$mail->Password = "murdida360";

				$mail->SingleTo = true;

				$mail->From = "paulocasimiro357@gmail.com";
				$mail->FromName = "Equipe Paturi Smurfs";
				$mail->addAddress($email);
				$mail->Subject = "Sua Conta Smurf";
				$mail->Body = "Aqui estรก a sua conta Smurf, Obrigado pela confianรงa em nosso serviรงo!";
				$mail-> addAttachment ($pdf);

				if(!$mail->send()){
					echo $mail->ErrorInfo;
				}else{
					//TRECHO DE CODIGO QUE APAGA O ARQUIVO
					$files = glob('assets/temp/*'); 
					foreach($files as $file){
						if(is_file($file))
						unlink($file); 
					}
					echo "deu certo";
				}

			} else {
			echo "Error updating record: " . mysqli_error($conn);
			}
			
		}else{
			// TRECHO DE CODIGO QUE DIZ SE DEU B.O NA HORA DE CRIAR O ARQUIVO E ENVIAR PARA O CLIENTE
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->isSMTP();

			$mail->Port = "465";
			$mail->Host = "smtp.gmail.com";
			$mail->isHTML(true);
			$mail->SMTPSecure = "ssl";
			$mail->Mailer = "smtp";
			$mail->CharSet =  "UTF-8";

			$mail->SMTPAuth = true;
			$mail->Username = "paulocasimiro357@gmail.com";
			$mail->Password = "murdida360";


			$mail->SingleTo = true;

			$mail->From = "paulocasimiro357@gmail.com";
			$mail->FromName = "paulocasimiro357@gmail.com";
			$mail->addAddress($email);
			$mail->Subject = "ATENวรO";
			$mail->Body = "NรO NรO FOI POSSIVEL CRIAR O PDF PARA ENVIAR PARA SEU CLIENTE!!!!!!!!!!!!";

			exit;

		}              
	}
?>