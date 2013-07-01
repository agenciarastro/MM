<?php
/*
Template Name: O Templo
*/
?>

<?php get_header(); ?>
	<div id="content">
	
		<!--Intro: Imagem full width e descrição coworking + Templo-->
		<figure class="intro">
			<figcaption>
				<div class="inner-wrap">
					<?php $page_id = 71; get_page( $page_id ); $page_data = get_page( $page_id );
					echo apply_filters('the_content', $page_data->post_content); ?>
				</div>
			</figcaption>
		</figure>
		
		<div class="wrap">
		
			<!--Vantagens-->
			<section class="vantagens">
				<h2>Vantagens</h2>
				<ul>
					<li class="cursos"><a>Cursos</a></li>
					<li class="sala-reuniao"><a>Sala de reunião</a></li>
					<li class="cozinha"><a>Cozinha</a></li>
					<li class="yoga"><a>Aula de yoga</a></li>
					<li class="happy-hour"><a>Happy Hour</a></li>
					<li class="wifi"><a>Wifi</a></li>
					<li class="cafe"><a>Café</a></li>
					<li class="luz"><a>Luz</a></li>
					<li class="suporte"><a>Suporte</a></li>
				</ul>
			</section>
			
			<!--Depoimentos-->
			<section class="depoimentos clearfix">
				<h2>Depoimentos</h2>
				<script src="<?php bloginfo('template_url'); ?>/library/js/slides.min.jquery.js" type="text/javascript"></script>
				<div id="slides">
					<div class="slides_container">
						<?php query_posts( 'post_type=depoimentos' );
						    if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div><img src="<?php bloginfo('template_url') ?>/library/images/aspasl.png" class="aspas aspasl" alt="&quot;" /> <?php the_content(); ?> <img src="<?php bloginfo('template_url') ?>/library/images/aspasr.png" class="aspas aspasr" alt="&quot;" /><span class="author"><?php the_title(); ?></span></div>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</section>
			
			<!--A equipe-->
			<?php get_template_part('equipe'); ?>
			
			<!--Residentes-->
			<?php get_template_part('residentes'); ?>
			
			<!--Rede Templo-->
			<?php get_template_part('parceiros'); ?>
			
		</div>
	</div> <!-- end #content -->
<?php get_footer(); ?>