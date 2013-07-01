<?php get_header(); ?>
		
		<div class="content" id="content">
			<h1 class="single-title title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<!-- sidebar mais infos do curso -->
			 <aside class="course-infos">
		    	<ul>
		    		<li><span class="label">status:</span>
		    			<span class="info">
		    				<?php if(get_field('status')):
		    				the_field('status');
		    				endif;?>
		    			</span>
		    		</li>
	    			<?php if(get_field('status') == 'confirmado'): ?>
	    			<li><span class="label">data:</span>
	    				<span class="info">
                            <?php the_field('course_date'); ?>
	    				</span>
	    			</li>
	    			<?php endif; ?>
		    		<li><span class="label">faltam:</span>
		    			<span class="info">
		    				<?php if(get_field('inscritos')):
							the_field('inscritos');
							endif;?>
		    			</span>
		    			<span class="info small">amigos</span>
		    		</li>
		    		<li><span class="label">valor:</span>
		    			<span class="info small">R$</span>
		    			<span class="info">
		    				<?php if(get_field('price')):
							the_field('price');
							endif;?>
		    			</span>
		    		</li>

		    		<a class="subscribe-button" href="<?php the_field('inscrever_curso'); ?>">inscreva-se</a>
		    	</ul>
		    	<div id="sharrre">
				  <div id="twitter" data-url="<?php the_permalink(); ?>" data-text="<?php the_title() ?> - <?php the_field('tutor_name'); ?>"></div>
				  <div id="facebook" data-url="<?php the_permalink(); ?>" data-text="<?php the_title() ?> - <?php the_field('tutor_name'); ?>"></div>
				  <div id="googleplus" data-url="<?php the_permalink(); ?>" data-text="<?php the_title() ?> - <?php the_field('tutor_name'); ?>"></div>
				</div>
		    </aside>

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    <article class="post" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
			    <!--Titulo do post-->
				
				<section class="main">
				    <div class="feature">
					<?php if(get_field('feature')):
							the_field('feature');
						endif;?>
					</div>
			    	<?php the_content(); ?>

				    	<h3><?php if(get_field('tutor_name')):
							the_field('tutor_name');
						endif;?></h3>

						<?php if(get_field('tutor_description')):
							the_field('tutor_description');
						endif;?>

						<h3><?php if(get_field('what_you_got_title')):
							the_field('what_you_got_title');
						endif;?></h3>

						<?php if(get_field('what_you_got')):
							the_field('what_you_got');
						endif;?>

						<h3><?php if(get_field('requisites_title')):
							the_field('requisites_title');
						endif;?></h3>

						<?php if(get_field('requisites')):
							the_field('requisites');
						endif;?>
			    </section>
			    <section class="navigation_single">
			    		<span class="nav_link prev">&larr;<?php $prev_post = get_previous_post();
							if (!empty( $prev_post )): ?>
							  <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a>
							<?php endif; ?></span>

						<span class="nav_link next"><?php $next_post = get_next_post();
							if (!empty( $next_post )): ?>
							  <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
							<?php endif; ?>&rarr;</span>
		  		</section>
		  		<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="2" mobile="false"></div>
				<style>.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width: 100% !important;}
				.fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] {width: 100% !important; background: none;}
				</style>
		    </article>

		    
		
		    <?php endwhile; ?>			
		
		    <?php else : ?>
				<!--Post não encontrado-->
		    <?php endif; ?>


		</div> <!-- end #content -->
		<script src="<?php bloginfo('template_url'); ?>/library/js/jquery.sharrre-1.3.4.min.js" type="text/javascript"></script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=338483329613081";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
<?php get_footer(); ?>