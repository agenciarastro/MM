<?php get_header(); ?>
<script src="<?php bloginfo('template_url'); ?>/library/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/library/js/jquery.jscrollpane.min.js" type="text/javascript"></script>
<div id="content" class="scroll-pane horizontal-only">
	<ul class="blocks">
		
		<!--Video sobre coworking-->
		<li class="single video">
			<iframe src="http://www.youtube.com/embed/lpBKX5z-WN4" frameborder="0" allowfullscreen></iframe>
		    <section>
		        <hgroup>
		    		<h2><a href="http://youtu.be/lpBKX5z-WN4" target="_blank"><span class="small">Vídeo</span><span class="big">Somos Templo</span></a></h2>
		        </hgroup>
		        
		        <article>
		        	<p>Templo Coworking é mais do que um espaço ou uma comunidade - é a manifestação de uma filosofia e conjunto de ideais. Esse é o nosso compromisso. Tudo é claro, junto e com muito sorriso. #happymonks #workingalonesucks</p>
		        	
		        	<!--<p>Gostou do vídeo? Foi presente da galera do Estúdio Pira com o Felipe Vianna, só um gostinho da nossa rede de talentos. Se quiser um, só dar um pulinho em <a href="//www.estudiopira.com" target="_blank">www.estudiopira.com</a>
		        	</p>-->
		        	<a  href="http://youtu.be/lpBKX5z-WN4" target="_blank" class="mais">Ver no youtube <span>&raquo;</span></a>
		        </article>
		    </section>
		</li>
		
		<!--O que é coworking-->
	    <li class="single coworking">
	    	<?php query_posts( 'page_id=71' ); // O que é coworking
	    	if (have_posts()) : while (have_posts()) : the_post(); ?>
		    <figure>
		    	<?php the_post_thumbnail('fullsize'); ?>
		    </figure>
		    <section>
			    <hgroup>
					<h2><a href="o-templo/"><span class="small">O que é</span><span class="big">coworking?</span></a></h2>
			    </hgroup>
			    
			    <article>
			    	<p><?php the_excerpt(); ?></p>
			    	<a href="o-templo/ " class="mais">Saiba mais <span>&raquo;</span></a>
			    </article>
			    <?php endwhile; endif; wp_reset_query(); ?>
		    </section>
	    </li> 
	    
	    <!--Vantagens do templo-->
	    <li class="single vantagens">
            <figure>
                <img src="<?php bloginfo('template_url'); ?>/library/images/layout/vantagens.jpg" alt="Vantagens do Templo" />
	        </figure>
	        <section>
		        <hgroup>
		    		<h2><a href="o-templo/"><span class="small">Vantagens</span><span class="big">do Templo</span></a></h2>
		        </hgroup>
		        
		        <article>
		        	<ul>
		        		<li><i class="icon wifi"></i> <span>Wifi 100mb</span></li>
		    			<li><i class="icon cafe"></i> <span>Café</span></li>
		    			<li><i class="icon reuniao"></i> <span>Sala de reunião</span></li>
		    			<li><i class="icon yoga"></i> <span>Yoga</span></li>
		    			<li><i class="icon cerveja"></i> <span>Happy hour</span></li>
		    			<li><i class="icon cozinha"></i> <span>Cozinha</span></li>
		        	</ul>
		        </article>
	        </section>
	    </li> 
	    
	    <!--A casa-->
	    <li class="single casa">
	        <figure><img src="<?php bloginfo('template_url'); ?>/library/images/layout/casa.jpg" alt="" />
	        </figure>
	        <section>
		        <hgroup>
		    		<h2><a href="a-casa/"><span class="small">Areas</span><span class="big">da casa</span></a></h2>
		        </hgroup>
		        
		        <article>
		        	<img src="<?php bloginfo('template_url'); ?>/library/images/layout/casa-lounge.png" alt="Casa Templo" class="col col-left icone-casa" usemap="#map-casa" />
		        	<map name="map-casa">
		        	    <!--Atelier-->
		        	  <area shape="rect" coords="53,51,109,104" href="a-casa/" alt="atelier" data-src="<?php bloginfo('template_url'); ?>/library/images/layout/casa-atelier.png" data-title="" data-content="Espaço especial para os nossos artistas brincarem.">
		        	  <!--Lounge-->
		        	  <area shape="rect" coords="0,51,53,104" href="a-casa/" alt="lounge" data-src="<?php bloginfo('template_url'); ?>/library/images/layout/casa-lounge.png" data-content="Salão que os coworkers dividem para trabalhar em conjunto.">
		        	  <!--Salas-->
		        	  <area shape="rect" coords="0,23,111,51" href="a-casa/" alt="salas" data-src="<?php bloginfo('template_url'); ?>/library/images/layout/casa-salas.png" data-content="Empresas que precisam de mais privacidade ocupam-nas.">
		        	  <!--Sotao-->
		        	  <area shape="poly" coords="0,23,106,23,54,0" href="a-casa/" alt="sótão" data-src="<?php bloginfo('template_url'); ?>/library/images/layout/casa-sotao.png" data-content="Aqui fica o nosso happy monk mestre. ">
		        	  <!--Jardim-->
		        	  <area shape="rect" coords="0,103,115,126" href="a-casa/" alt="jardim" data-src="<?php bloginfo('template_url'); ?>/library/images/layout/casa-jardim.png" data-content="Almoços, reuniões, happy hours... Muita coisa acontece por aqui.">
		        	</map>
		        	<div class="col col-right">
			        	<h3 id="casa-title">Lounge</h3>
			        	<p id="casa-content">Salão que os coworkers dividem para trabalhar em conjunto.
			        	</p>
			        	<a href="a-casa/" class="mais">Saiba mais <span>&raquo;</span></a>
			        </div>
		        </article>
	        </section>
	    </li> 
	    
	    <!--Manifesto do templo-->
	    <li class="single manifesto">
	        <section>
		        <hgroup>
		    		<h2><a><span class="small">Manifesto</span><span class="big">do templo</span></a></h2>
		        </hgroup>
		        <article>
		        	<p>O TEMPLO é um espaço, uma comunidade, um celeiro de ideias e parcerias.
		        	Respeito, honestidade e criatividade
		        	são nossos pilares.</p>
		        	<p>
		        	Temos a interação entre indivíduos e organizações como valor primordial. Entendemos que cada indivíduo e organização é um fractal do todo,
		        	que influencia e é influenciado por ele de forma contínua e orgânica.
		        	</p><p>
		        	Vemos na quebra do paradigma moderno-industrial uma oportunidade para a construção de novas formas de trabalho, educação e consumo.
		        	O coworking, a educação não-formal e o empreendedorismo criativo são nossas maiores armas pra construir uma nova sociedade.</p>
		        	<p>
		        	Uma nova forma de trabalho é possível.<br /> Uma nova educação é possível.<br />
		        	Uma nova sociedade é possível.<br />
		        	Um novo mundo é possível.
		        	</p>
		        </article>
	        </section>
	    </li> 
	    
	    <!--Blog do templo-->
	    <!--<li class="single blog">
	        <figure>
	        	<img src="<?php bloginfo('template_url'); ?>/library/images/layout/blog.jpg" alt="" />
	        </figure>
	        <section>
		        <hgroup>
		    		<h2><a href="blog/"><span class="small">Blog</span><span class="big">papo de monge</span></a></h2>
		        </hgroup>
		        
		        <article>
	        		<?php get_template_part('blog_cat_posts'); ?>
		        </article>
		    </section>
	    </li> -->
	    
	    
	    <!--Agenda de eventos-->
	    <li class="single agenda">
	        <figure><img src="<?php bloginfo('template_url'); ?>/library/images/layout/agenda.jpg" alt="Agenda" />
	        </figure>
	        <section>
	            <hgroup>
	        		<h2><a href="agenda/"><span class="small">Agenda</span><span class="big">de Eventos</span></a></h2>
	            </hgroup>
	            
	            <article>
	            	<ul>
	            	<?php 
	            		query_posts( 'posts_per_page=3&post_type=tribe_events' ); //&tribe_events_cat=cursos
	            		// The Loop
	            		while ( have_posts() ) : the_post(); ?>
	            			<li>
	            				<h4><a href="<?php the_permalink(); ?>"><span class="data"><!--<?php the_time('d') ?><span class="mes">/ <?php the_time('M') ?></span></span>--><span class="mes"><?php echo tribe_get_start_date(); ?></span></span> <span class="subtitulo"><?php echo $term->name; ?></span> <?php the_title() ?></a></h4>
	            			</li>
	            		<?php endwhile;
	            		
	            		// Reset Query
	            		wp_reset_query(); ?>
	            	</ul>
	            	<a href="agenda/" class="mais">Ver todos <span>&raquo;</span></a>
	            </article>
	       </section>
	    </li> 
	    
	</ul>
</div> <!-- end #content -->

<?php get_footer(); ?>
