<?php /* Template Name: Form-teste */ ?>

<?php get_header(); ?>
	<div id="content">
		<div class="col-left col">
			<h1 class="page-title">Login</h1>
			<form method="post" action="<?php bloginfo('template_url') ?>/api-connect.php">
			    
			    <select id="act" name="act">
                    <option value="user-b2c-login">Login</option>
                    <option value="user-b2c-isConnected">is logged</option>
                    <option value="user-b2c-load">Load infos</option>
                    <option value="user-b2c-new">Cadastrar</option>
                    <option value="user-b2c-pwd-reset">Esqueci minha senha</option>
                    <option value="user-b2c-pwd-edit">Editar senha</option>
			    </select>
			    
			    <input type="hidden" name="r[signature]" value="" id="signature" />
			    <input type="hidden" name="r[code]" value="" id="code" />
			    
			    <label for="nome" class="cadastrar">Nome</label>
			    <input type="text" id="nome" name="r[nome]" value="" class="cadastrar" />
			    
			    <label for="email">Email</label>
			    <input type="email" id="email" name="r[email]" value="erik@agenciarastro.com.br" />
			    
			    <label for="pwd">Senha</label>
			    <input type="password" name="r[pwd]" value="123456" id="pwd" />
			    <label for="show-pwd"><input type="checkbox" name="show-pwd" class="show-pwd" id="show-pwd" /> mostrar senha</label>
			    
			    <label for="tel" class="cadastrar">Telefone</label>
			    <input type="tel" name="r[tel]" value="" id="tel" class="cadastrar" />
			    
			    <label for="mailing" class="cadastrar"><input type="checkbox" name="mailing" id="mailing" /> receber newsletter</label>
			    
			    <input type="submit" value="Enviar" />
                <!--<a>esqueci minha senha</a>-->
			</form>
			<div id="response"></div>
		</div>
		
		<script type="text/javascript">
		
		    // show / hide password
		    function showPwd() {
		        if ($('input[name="r[pwd]"]').attr('type') === 'password') {
    	            $('input[name="r[pwd]"]').attr('type', 'text');
    		    } else {    		        
    		        $('input[name="r[pwd]"]').attr('type', 'password');
    		    }
		    }
		    
		    // detecta a bandeira do cartão
		    function creditCardTypeFromNumber(num) {
		      // first, sanitize the number by removing all non-digit characters.
		      num = num.replace(/[^\d]/g,'');
		      // now test the number against some regexes to figure out the card type.
		      if (num.match(/^5[1-5]\d{14}$/)) {
		        return 'MasterCard';
		      } else if (num.match(/^4\d{15}/) || num.match(/^4\d{12}/)) {
		        return 'Visa';
		      } else if (num.match(/^3[47]\d{13}/)) {
		        return 'AmEx';
		      } else if (num.match(/^6011\d{12}/)) {
		        return 'Discover';
		      }
		      return 'UNKNOWN';
		    }
		    
		    
		    // envia form por ajax
		    function sendAjax(form) {
    		    $.ajax({
    		    	url: form.attr('action'),
    		    	data: form.serialize(),
    		    	type: 'post',
    		    	cache: false,
    		    	dataType: 'html',
    		    	success: function(data){
    		    	    var retorno = $.parseJSON(data),
    		    	        assinatura = retorno.qString.split('&')[1],
    		    	        code = retorno.qString.split('&')[1];
                        
    		            // store signature
    		            if ($('#act').val() === 'user-b2c-login') { $('#signature').val(assinatura.slice(10)); }
    		            if ($('#act').val() === 'user-b2c-pwd-reset') { $('#code').val(code.slice(5)); }

    		    		$("#response").html('qString: '+retorno.qString+"<br /><br /> data: "+data);
    		    	},
    		    	error: function (data) {
    		    		$("#response").addClass('error').html(data);
    		    	}
    		    });
		    }
		    
		    function changeForm() {
		        if ($('#act').val() === 'user-b2c-new') {
		            $('.cadastrar').slideDown();
		        } else if ($('#act').val() === 'user-b2c-load') {
		            $('.cadastrar').slideDown();
		            sendAjax($('form'))
	            } else {
	                $('.cadastrar').slideUp();
		        }
		    }
		    changeForm()
		    
		    // Eventos / triggers
		    // show/hide pwd
	        $('.show-pwd').on('change', showPwd);
	        
		    // submit form
	    	$("form").on('submit', function() {
	    		sendAjax($(this));
	    		return false;
	    	});
	    	
	    	// Cadastrar
	    	$('#act').on('change', changeForm);
		</script>
		
	</div> <!-- end #content -->
<?php get_footer(); ?>