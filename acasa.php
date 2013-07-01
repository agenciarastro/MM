<?php
/*
Template Name: A casa
*/
?>

<?php get_header(); ?>
	<div id="content">
		<section class="acasa clearfix">
			<div class="col col-left">
				<h1 class="page-title">Nosso cantinho</h1>
				<p>Nossa casa de 400m²  <?php // está localizada no bairro da Gávea e ?> possui toda a estrutura para fazer com que empreendedores, artistas, freelancers e empresas se preocupem apenas com os seus negócios - e nada mais. Nossas áreas comuns incluem uma cozinha totalmente equipada, o coworking lounge e uma sala de reuniões além de um belo jardim de inverno. Ficou curioso? Venha tomar um chá, mate, café ou cerva com a gente! </p>
				
				<div class="andares andar1">
					<ul>
						<li><a data-href="salas-2andar" class="andar2">2º andar</a></li>
						<li><a data-href="salas-1andar" class="andar1">1º andar</a></li>
					</ul>
					<figure>
						<img src="<?php bloginfo('template_url'); ?>/library/images/salas-1andar.png" alt="Planta" class="planta planta-andar1" />
					</figure>
				</div>
			</div>
			<div class="col col-right">
				<figure>
					<img src="<?php bloginfo('template_url'); ?>/library/images/casa/jardim.jpg" alt="fotos templo" class="fotos" />
				</figure>
				<ol class="areas andar1">
					<li><a data-href="jardim" class="jardim active">Jardim</a></li>
					<li><a class="deck">Deck</a></li>
					<li><a data-href="lounge" class="lounge">Lounge</a></li>
					<li><a class="area-servico">Area de serviço</a></li>
					<li><a class="cozinha">Cozinha</a></li>
					<li><a class="banheiro">Banheiro</a></li>
					<li><a class="escada">Escada</a></li>
					<li><a class="sala-reuniao">Sala de reunião</a></li>
					<li><a class="atelier">Atelier coletivo</a></li>
					<li><a class="sala1">Sala A</a></li>
				</ol>
				<ol class="areas andar2">
					<li><a class="corredor">Corredor</a></li>
					<li><a class="sala-espera">Sala de espera</a></li>
					<li><a class="suite1">Sala B</a></li>
					<li><a class="suite2">Sala C</a></li>
					<li><a class="sala2">Sala D</a></li>
					<li><a class="suite3">Sala E</a></li>
					<li><a class="sala3">Sala F</a></li>
					<li><a class="escada">Escada</a></li>
					<li><a class="banheiro">Banheiro</a></li>
				</ol>
			</div>
			
		</section>
		
		<!--Tour virtual-->
		<section class="tour clearfix">
			<h2>Tour virtual</h2>
			
			<a data-href="<?php bloginfo('template_url'); ?>/library/tour/index.html" id="tour"><img src="<?php bloginfo('template_url'); ?>/library/images/tour-virtual.jpg" alt="tour virtual 360 do templo" id="tour-placeholder" /></a>
			
		</section>
		
		<!--Assinaturas-->
		<section class="assinaturas clearfix">
			<h2>Tipos de assinaturas</h2>
			<ul class="tipos">
				<li class="active individual">
					<a data-href="individual">Flex Desk</a>
				</li>
				<li class="desk">
					<a data-href="desk">Desk</a>
				</li>
				<li class="salas">
					<a data-href="salas">Salas</a>
				</li>
				<li class="atelier">
					<a data-href="atelier">Atelier<br />Coletivo</a>
				</li>
			</ul>
			<article class="description">
				<div id="individual" class="active">
					<?php // <p>(R$480,00 de aluguel + R$95,00 de condomínio)</p> ?>
					<p>Tem acesso a todas as áreas coletivas da casa, mas não tem nenhum lugar fixo dentro do salão. Um nômade.</p>
				</div>
				<div id="desk">
					<?php // <p> (R$ 650,00 de aluguel + R$95,00 de condomínio)</p> ?>
					<p>Tem seu desk e seu gaveteiro com chave com um lugar carimbado de respeito. Fora isso, também pode utilizar o resto da casa.</p>
				</div>
				<div id="salas">
					<?php // <p>(varia entre R$1100,00 a R$2800,00 de aluguel)</p> ?>
					<p>Cada uma tem um tamanho diferente, mas todas têm a mesma regalia - as empresas residentes podem utilizá-las qualquer dia e horário da semana. E, claro, também podem utilizar todas as áreas coletivas da casa.</p>
				</div>
				<div id="atelier">
					<?php // <p>(R$650,00 de aluguel + R$95,00 de condomínio)</p> ?>
					<p>Dividido em dois espaços (aberto e fechado), é perfeito para os artistas trabalharem, brincarem e brigarem. Nada melhor.</p>
					<p>Precisamos falar que eles também têm acesso a todas as áreas coletivas da casa?</p>
				</div>
			</article>
		</section>
		
		<section class="localizacao">
			<h2>Localização</h2>
			<div class="info">
				<img src="<?php bloginfo('template_url'); ?>/library/images/maps-title.png" alt="Quer conhecer? Chega mais!" />
				<span><?php /*R. Duque Estrada<br />
				N 41 - Gávea - RJ */?></span>
			</div>
			<figure class="map"><img src="<?php bloginfo('template_url'); ?>/library/images/mapa.jpg" alt="mapa" /></figure>
			<?php /*<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=R.+Duque+Estrada+N+41+-+G%C3%A1vea+-+RJ&amp;aq=&amp;sll=35.675147,-95.712891&amp;sspn=61.286496,83.847656&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Duque+Estrada,+41+-+G%C3%A1vea,+Rio+de+Janeiro,+22451-090,+Rep%C3%BAblica+Federativa+do+Brasil&amp;ll=-22.968667,-43.227854&amp;spn=0.027659,0.137329&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe> */ ?>
		</section>
	</div> <!-- end #content -->
<?php get_footer(); ?>