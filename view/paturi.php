<?php
session_start();
if ($_SESSION['status'] != 'LOGADO') {
    header("Location: ../index.php"); // Chamar um form de login por exemplo.
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    .form{
        
        width:100%;
        height:200px;
    
    }
    form{
      width:500px; /* Valor da Largura */
      margin-left:30%;
    }
    .form{
     
       
        margin-top:12%; 
        
    }
    h1{
        font-size: 45px;
        text-align: center;
    }
    </style>

    <title>Paturi Smurf</title>
  </head>
  <body>

    <div class="form">
        <form method="post" action="../controller/seach.php" onsubmit="myFunction()">
            <div style="margin-bottom:20px ;">
                <h1 >Gerador de Documento</h1>
                <input class="form-control" type="text" placeholder="cole a string da conta" name="pesquisa" id="campo01">
            </div>
            <button type="submit" class="btn btn-primary" value="submit">baixar PDF</button>
        </form>
        <form method="post" action="../controller/salvar.php" onsubmit="myFunction()">
            <div style="margin-bottom:20px ;">
                <h1 >Salvar dados</h1>
                <input class="form-control" type="text" placeholder="cole a string da conta" name="salvar" id="campo01">
            </div>
            <button type="submit" class="btn btn-primary" value="submit">salvar</button>
        </form>
    </div>
    <script>
      function myFunction() {
        //setTimeout(function () {window.location.reload(1);}, 1000);
      }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>