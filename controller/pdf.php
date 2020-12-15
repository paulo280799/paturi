
<style>
.corpo {width: 720px; height:680px; padding: 0px;}
.corpo img {width:150px; margin-left: 285px;}
.corpo .h1 {margin: 30px 0 0 0; font-size: 26px; text-align:center;}
</style>

<div class="corpo">
<img src="http://paturismurfs.com/paturi/assets/images/logo1.jpg"/><br/>
<div class="h1" >DADOS DA SUA CONTA</div><br/>

    <p>
        Usuário: <?php echo $dados['user_name']?><br/>
        Senha: <?php echo $dados['user_pass']?><br/><br/>

        Essência Azul: <?php echo $dados['user_ip']?><br/><br/>

        Email de criação: <?php echo $dados['user_mail']?><br/>
        Data de nascimento: <?php echo $dados['user_nasc']?><br/>
        Data de criação: <?php echo $dados['user_date']?><br/>
</p>

<p>
    *Primeiro campeão: "a ser adquirido"(anote quando comprar)<br/>
    *Campeões reembolsados: "a ser utilizado"(anote quando usar)<br><br>
</p>

<p>
    <div style="text-align:center; font-size:1.6em;">Obrigado pela compra e bom jogo!</div><br>
    <img src="http://paturismurfs.com/paturi/assets/images/bg.jpg"/><br/><br/><br/><br/><br/><br/><br/>
    <hr/>
    Para entrar em contato comigo para suporte ou encomendas mande um whats para (88)994034530!<br>
    Nosso site: www.paturismurfs.com
</p>
</div>
