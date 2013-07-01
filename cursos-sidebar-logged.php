<form method="post" action="<?php bloginfo('template_url') ?>/api-connect.php" id="" class="ajax-form">
    <p>Olá <?php echo $_COOKIE['nome']; ?> | <a class="logout">Sair</a></p>
    
    <input type="hidden" name="act" value="user-b2c-credit-buy" />
    <input type=hidden name='r[signature]' value='<?php echo $_COOKIE['signature'] ?>' size=95 />
    
    <!--<label>URL</label>-->
    <input type=hidden name='r[url]' value='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>' size=95 />
    
    <label>Email</label>
    <input type=text name='r[email]' value='<?php echo $_COOKIE['email'] ?>' size=95 />

    <label>Senha</label>
    <input type=password name='r[pwd]' value='<?php echo $_COOKIE['pwd'] ?>123456' size=95 />

    <label>lancamentoID (pra cancelar)</label>
    <input type=text name='r[lancamentoID]' value='<?php echo $_COOKIE['lancamentoID'] ?>' size=95 />
    
<!--    <label for='mailing' class='small'><input type='checkbox' name='r[getMail]' id='mailing' ";  if (echo $_COOKIE['getMail']==1) { echo "checked" ; } echo " /> receber newsletter</label>-->

    <label for="forma-pagamento">Forma de Pagamento</label>
    <select name="r[produto]" id="forma-pagamento">
        <option value="1">crédito à vista</option>
        <option value="2">crédito parcelado (loja)</option>
        <option value="3">crédito parcelado (administradora)</option>
        <option value="A">débito</option>
    </select>
    
    <select name="r[parcelas]" id="parcelas">
        <option value="2">2x</option>
        <option value="3">3x</option>
        <option value="4">4x</option>
    </select>

    <fieldset>
        <legend>Dados do cartão</legend>
        <label>Numero</label>
        <input type=text name='r[cNum]' value='<?php echo $_COOKIE['numero-cartao'] ?>4012001037141112' class="credit-card" size=20 />
    
    	<label for="bandeira">Bandeira</label>
    	<input type='text' id="bandeira" name='r[bandeira]' value="visa" />
    	<!-- visa, master, elo, amex -->
        
        <label>Validade</label>
        <input type=text name='r[cVal]' value='<?php echo $_COOKIE['validade-cartao'] ?>05/2018' size=20 />
        
        <label>Código de segurança</label>
        <input type=text name='r[cCodSegur]' value='<?php echo $_COOKIE['cCodSegur'] ?>123' size=20 />
    </fieldset>

    <label>Valor</label>
    <input type=text name='r[valor]' <?php if(get_field('price')){ echo 'readonly'; } ?> value='<?php if(get_field('price')){ the_field('price'); } else { echo '1,00'; } ?>' size=20 />
    
	<input type=submit value='Enviar' />
</form>
<div id="response"></div>