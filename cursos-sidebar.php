<div id="response"></div>
<nav>
    <a data-href="login" class="tab login active">Login</a>
    <a data-href="cadastro" class="tab cadastro">Cadastro</a>
</nav>
<form method="post" action="<?php bloginfo('template_url') ?>/api-connect.php" id="login" class="ajax-form tab-content">
    <input type="hidden" name="act" value="user-b2c-login" />
    <input type="email" id="email" name="r[email]" value="erik@agenciarastro.com.br" required />
    <input type="password" name="r[pwd]" value="123456" id="pwd" required />
    <a data-href="user-b2c-pwd-reset" class="small">Esqueceu a senha?</a>
    <input type="submit" value="Entrar" />
</form>
<form method="post" action="<?php bloginfo('template_url') ?>/api-connect.php" id="cadastro" class="ajax-form tab-content">
    <input type="hidden" name="act" value="user-b2c-new" />
    <label for="nome">Nome</label>
    <input type="text" id="nome" name="r[nome]" placeholder="Fulano da Silva" required />
    
    <label for="email">Email</label>
    <input type="email" id="email" name="r[email]" placeholder="fulano@silva.com.br" required />
    
    <label for="pwd">Senha</label>
    <input type="password" name="r[pwd]" placeholder="6 caracteres ou +" id="pwd" required />
    <label for="show-pwd" class="small"><input type="checkbox" name="show-pwd" class="show-pwd" id="show-pwd" /> mostrar senha</label>
    
    <label for="tel" class="cadastrar">Telefone</label>
    <input type="tel" name="r[tel]" id="tel" placeholder="21 9999-9999" required />
    
    <label for="mailing" class="small"><input type="checkbox" name="mailing" id="mailing" checked="checked" /> receber newsletter</label>
    
    <input type="submit" value="Cadastrar" />
</form>
