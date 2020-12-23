<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap" rel="stylesheet">

<style>
.corpo {width: 720px; height:680px; padding: 0px; font-family: 'Merriweather Sans', sans-serif;}
.corpo img {width:200px; margin-left: 35%;  }
.corpo .h1 {margin: 30px 0 0 0; font-size: 26px; text-align:center;}
</style>

<div class="corpo">
<img  style="width:250px; margin-left: 30%;" src="assets/images/logo.png"/><br/><br/>
<div class="h1" >DADOS DA SUA CONTA</div><br/><br/><br/>

    <p>
        Usuário: <?php echo base64_decode($dados['User'])?><br/>
        Senha: <?php echo base64_decode($dados['Pass'])?><br/><br/>

        Essência Azul: <?php echo $dados['essencia']?><br/><br/>

        Email de criação: <?php echo base64_decode($dados['Email'])?><br/>
        Data de nascimento: <?php echo base64_decode($dados['dt_nasc'])?><br/>
        Data de criação: <?php echo base64_decode($dados['dt_criacao'])?><br/>
    </p>

<p>
    *Primeiro campeão: "a ser adquirido"(anote quando comprar)<br/>
    *Campeões reembolsados: "a ser utilizado"(anote quando usar)<br><br><br><br>
</p>

<p>
    <div style="text-align:center; font-size:1.6em;">Obrigado pela compra e bom jogo!</div><br><br/><br/><br/><br/>
    <img src="assets/images/bg.png"/><br/><br/><br/><br/>
    <hr/>
    Para entrar em contato comigo para suporte ou encomendas mande um whats para (88)994034530!<br>
    Nosso site: www.paturismurfs.com
</p>
</div>
