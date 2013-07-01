// show / hide password
function showPwd() {
    if ($('input[name="r[pwd]"]').attr('type') === 'password') {
        $('input[name="r[pwd]"]').attr('type', 'text');
    } else {
        $('input[name="r[pwd]"]').attr('type', 'password');
    }
}
function showParcelas() {
    if ($('[name="r[produto]"]').val() === '2' || $('[name="r[produto]"]').val() === '3' ) {
        $('#parcelas').show();
    } else {
        $('#parcelas').hide();
    }
}


// detecta a bandeira do cartão
function creditCardTypeFromNumber(num) {
  // first, sanitize the number by removing all non-digit characters.
  num = num.replace(/[^\d]/g,'');
  var type = '';
  // now test the number against some regexes to figure out the card type.
  if (num.match(/^5[1-5]\d{14}$/)) {
    type = 'masterCard';
  } else if (num.match(/^4\d{15}/) || num.match(/^4\d{12}/)) {
    type = 'visa';
  } else if (num.match(/^3[47]\d{13}/)) {
    type = 'AmEx';
  } else if (num.match(/^6011\d{12}/)) {
    type = 'Discover';
  }
  $('#bandeira').val(type);
}

// Using tabs is easyyy
function toggleTabs(e, href) {
    e.removeClass('active').find('.tab-content').slideUp(200, function() {
        $('#'+href).delay(200).slideDown();
    });
}
function tabs(e) {
    e.find('.tab').on('click', function() {
        var href = $(this).attr('data-href');
        e.find('.tab').removeClass('active');
        $(this).addClass('active');
        toggleTabs(e, href);
    });
}

// after logs in / out
function isLogged(retorno) {
    // saving some cookies for later... om nom nom :)
    $.cookie('signature', retorno.qString.split('&')[1].split('=')[1], { expires: 1, path: '/' });
    $.cookie('email', retorno.qString.split('&')[0].split('=')[1], { expires: 1, path: '/' });
    $.cookie('tel', retorno.qString.split('&')[3].split('=')[1], { expires: 1, path: '/' });
    $.cookie('nome', retorno.qString.split('&')[2].split('=')[1], { expires: 1, path: '/' });
    $.cookie('token', retorno.token, { expires: 1, path: '/' });
    
    $('#admin-area').slideUp(200, function () {
        $('#content').removeClass('not-logged').addClass('logged');
        window.location.reload();
    });
}
function logout() {
    $.cookie('signature', '', { expires: -1, path: '/' });
    $.cookie('email', '', { expires: -1, path: '/' });
    $.cookie('nome', '', { expires: -1, path: '/' });
    $.cookie('token', '', { expires: -1, path: '/' });
    $('#admin-area').slideUp(200, function () {
        $('#content').removeClass('logged').addClass('not-logged');
        window.location.reload();
    });
}
if ($('.logout').length){ $('.logout').on('click', logout); }

// envia form por ajax
function sendAjax(form) {
    form.validate();
    if (form.valid()){
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'post',
            cache: false,
            dataType: 'html',
            success: function(data){
                var retorno = $.parseJSON(data);
    
                // store signature
                if (retorno.act === 'user-b2c-login' || retorno.act === 'user-b2c-new') {
                    if (retorno.result === 'ok') {
                        isLogged(retorno);
                    } else {
                        $("#response").fadeIn().html(retorno.qString);
                    }
                } else {
                    $("#response").fadeIn().html(data);
                }
//                if (retorno.act === 'user-b2c-pwd-reset') { $.cookie('token', retorno.token, { expires: 1, path: '/' }); }
            }, error: function (data) {
                $("#response").fadeIn().addClass('error').html(data);
            }
        });
    }
}

if ($('#act').length) {	    
    // Cadastrar
    changeForm();
    $('#act').on('change', changeForm);
}

// Eventos / triggers
// show/hide pwd
if ($('.show-pwd').length){
    $('.show-pwd').on('change', showPwd);
}
if ($('#forma-pagamento').length){
    $('#forma-pagamento').on('change', showParcelas);
}

if ($('.tabs').length) {
    $('.tabs').each(function() {
        tabs($(this));
    });
}

if ($('.credit-card').length) {
    $('.credit-card').on('keyup', function() {
        var num = $(this).val();
        creditCardTypeFromNumber(num);
    });
}
// submit form
$(".ajax-form").on('submit', function() {
	sendAjax($(this));
	return false;
});
