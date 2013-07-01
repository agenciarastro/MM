// scroll parallax
function parallax() {
    var pos = $('.jspPane').length ? $('.jspPane').position() : $('.blocks').position(),
        dynPos = Math.abs(pos.left)*0.09;

        if (dynPos >= 155) { dynPos = 155; }
//        $('.single figure').css({backgroundPosition: dynPos+'px 0'});
        $('.single figure img').css({left: dynPos+'px'});
}



// as the page loads, call these scripts
$(document).ready(function() {
    // scripts for home
    if ($('body').hasClass('home')){
         $('.scroll-pane').on('scroll', parallax);

         // Mouse over casinha
         $('area').on('mouseenter', function(){
             $('.icone-casa').attr('src', $(this).attr('data-src'));
             $('#casa-content').text($(this).attr('data-content'));
             $('#casa-title').text($(this).attr('alt'));
         });

        // horizontal scroll
        $("#content").mousewheel(function(event, delta) {
            if ($(window).width() > 480) {
                this.scrollLeft -= (delta * 40);
                event.preventDefault();
            }
        });

    } // O Templo
     else if ($('body').hasClass('page-template-otemplo-php')) {
         $("#slides").slides(); // slider depoimentos

        $('.vantagens').find('a').on({
            mouseenter: function(){
                var title = $(this).text();
                $(this).parent().prepend('<div class="tooltip">'+title+'</div>');
                $('.tooltip').animate({top: '-20px', opacity: '1'});
            },
            mouseleave: function(){
                $('.tooltip').fadeOut(500, function(){ $(this).remove(); });
            }
        });

     } // A casa
     else if ($('body').hasClass('page-template-acasa-php')) {
         // trocar de andar da planta
         $('.andares').find('a').on('click', function(){
             var href = $(this).attr('data-href'),
                 elclass = $(this).attr('class');
             $('.andares').removeClass('andar1').removeClass('andar2').addClass(elclass);
             $('.planta, .areas').hide();
            $('.planta').attr('src', 'http://templocoworking.com/wp-content/themes/templo/library/images/'+href+'.png').css({top: '0', left: '0' });
            $('.areas.'+elclass).stop().fadeIn();
         });

         // troca fotos / highlight planta
         $('.areas').find('a').on({
             click: function(){
                 var href = $(this).attr('data-href');
                 if (href !== undefined) {
                     $('.areas').find('a').removeClass('active');
                     $(this).addClass('active');
                     $('.fotos').fadeOut(function(){
                         $('.fotos').attr('src', 'http://templocoworking.com/wp-content/themes/templo/library/images/casa/'+href+'.jpg').stop().fadeIn();
                     });
                 }
             },
             mouseenter: function(){
                 var idx = $(this).parents('li').index();
                 if (idx <= 4){
                     $('.planta').css({top: '0', left: '-'+(idx)*306+'px', display: 'block', opacity: '1'});
                 } else {
                     $('.planta').css({top: '-266px', left: '-'+(idx-5)*306+'px', display: 'block', opacity: '1'});
                 }
             },
             mouseleave: function(){
                 $('.planta').css({display: 'none'});
             }
         });

        // tipos de assinatura
         $('.tipos').find('a').on('click', function(){
             var href = $(this).attr('data-href');
             $('.tipos').find('li').removeClass('active');
             $(this).parent().addClass('active');
             $('.description').find('div').slideUp();
            $('#'+href).stop().slideDown();
         });

        // tour virtual
        $('#tour').click(function() {
            var href = $(this).attr('data-href');
            $('body').prepend('<div class="modalbox"><a class="close">x | Fechar</a><iframe src="'+href+'"></iframe></div>').fadeIn();

            $('.close').click(function() { $('.modalbox').fadeOut(function(){ $('.modalbox').remove(); }); });
        });
     }
});

var container = $('#content').find('ul');

function organize(container) {
    container.imagesLoaded(function(){
      container.masonry({
        itemSelector : '.post',
        isFitWidth: true,
        isResizable: true
      });
    });
}

$(window).load(function() {
    if ($('body').hasClass('post-type-archive-cursos')) {
/*        organize(container);
        var cat = 'todas', dif = 'todas';
        $('.categorias li').find('a').click(function() {
           cat = $(this).attr('data-href');
           if (cat === 'todas') {
               $('#content .block').each(function(){
                    if ($(this).attr('alt')===dif+' ' || dif==='todas' ){
                        $(this).show().addClass('post');
                    }
                });
           } else {
               $('#content .block').each(function(){
                    if($(this).attr('alt')===dif+' ' && $(this).hasClass(cat) || dif==='todas' && $(this).hasClass(cat)){
                        $(this).show().addClass('post');
                    } else {
                        $(this).hide().removeClass('post');
                    }
                });
           }
           container.masonry('reload');
        });

        $('.dificuldade').find('a').click(function() {
           dif = $(this).attr('data-href');
           if (dif === 'todas') {
               $('.block.'+cat).show().addClass('post');
           } else {
               $('.block').each(function(){
                    if($(this).attr('alt')===dif+' ' && $(this).hasClass(cat)){
                        $(this).addClass('post').show();
                    } else {
                        $(this).hide().removeClass('post');
                    }
                });
           }
           container.masonry('reload');
        });
*/
    //scroll to base
        $('.how-works').click(function(){
            $("html, body").animate({scrollTop:$("#explanation").offset().top});
            $("#content ul").css({opacity:0.5});

            $(document).click(function(event){
                if(!$(event.target).is("#explanation, .how-works")){
                    $("#content ul").css({opacity:1});
                }
                // return false;
            });    

        });

    //customized selectboxes
        // $('.categories').click(function(){
        //     $(this).find('li').not('.li-active').show();
        // });

        // $('.categories li').click(function(){
        //     $(this).parent().find('.li-active').removeClass('li-active');
        //     $(this).prependTo($(this).parent()).addClass('li-active');
        //     $('.categories li').not('.li-active').hide();
        // });

        // $('.active-handler').mouseenter(function(){ $(this).parent().find(".categories").show(); });
        // $('.categories').mouseleave(function(){ $(this).parent().find(".categories").hide(); });

//        $('.categories').find('li').click(function(){
//            var selectTitle = $(this).text();
//            $(this).parent().parent().find('.active-handler').text(selectTitle);
//            $(this).parent().hide();
//
//        });
    }
});

/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
    // This fix addresses an iOS bug, so return early if the UA claims it's something else.
    if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
        x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
        aig = e.accelerationIncludingGravity;
        x = Math.abs( aig.x );
        y = Math.abs( aig.y );
        z = Math.abs( aig.z );
        // If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
            if( enabled ){ disableZoom(); } }
        else if( !enabled ){ restoreZoom(); } }
    w.addEventListener( "orientationchange", restoreZoom, false );
    w.addEventListener( "devicemotion", checkTilt, false );
})( this );

if ($('#twitter, #facebook, #googleplus').length) {
    // sharrre
    $('#twitter').sharrre({
      share: {
        twitter: true
      },
      template: '<a class="box"><div class="count" href="#">{total}</div><div class="share"><span></span></div></a>',
      enableHover: false,
      enableTracking: true,
      buttons: { twitter: {via: 'templocoworking'}},
      click: function(api, options){
        api.simulateClick();
        api.openPopup('twitter');
      }
    });
    $('#facebook').sharrre({
      share: {
        facebook: true
      },
      template: '<a class="box"><div class="count" href="#">{total}</div><div class="share"><span></span></div></a>',
      enableHover: false,
      enableTracking: true,
      click: function(api, options){
        api.simulateClick();
        api.openPopup('facebook');
      }
    });
    $('#googleplus').sharrre({
      share: {
        googlePlus: true
      },
      template: '<a class="box"><div class="count" href="#">{total}</div><div class="share"><span></span></div></a>',
      enableHover: false,
      enableTracking: true,
      click: function(api, options){
        api.simulateClick();
        api.openPopup('googlePlus');
      }
    });
}



