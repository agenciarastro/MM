<?php get_header(); ?>

		<h1 class="page-title"><a href="/blog/">Papo de Monge</a></h1>
		
		<nav class="blognav">
			<ul class="categories">
				<?php $terms = get_terms('blog_cat');
				echo '<ul>';
				foreach ($terms as $term) {
				    echo '<li><a href="'.get_term_link($term->slug, 'blog_cat').'">'.$term->name.'</a></li>';
				}
				echo '</ul>'; ?>
			</ul>
			
			<?php get_search_form(); ?>
		</nav>
		
		
		<div id="content">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				
				
				<!--Featured image-->
			    <figure class="article-header">
					<?php if (has_post_thumbnail()){
						the_post_thumbnail( '650' );
					} else { ?>
						<img src="<?php  bloginfo('template_directory');  ?>/library/images/destaque-default.png" alt="templo" />
					<?php } ?>
			    </figure>
			    
			    <!--data-->
			    <date>
			    	<span class="dia"><?php the_time('j') ?></span>
		    		<span class="mes"><?php the_time('M') ?></span>
			    </date>
			    
			    <!--Titulo do post-->
				<h2 class="single-title title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<!--Meta informações do post-->
				<div class="meta">
				
					<!--Categoria-->
					<span class="category">
						<strong>Categoria:</strong> 
						<?php global $post; $terms = wp_get_post_terms($post->ID, 'blog_cat');
						foreach ($terms as $term) {
						    echo '<span>'.$term->name.'</span>';
						} ?> | 
					</span>
					
					<!--Autor-->
					<span class="author"><strong>Autor:</strong> <?php $author = get_the_author(); echo $author; ?> | </span>
					
					<!--Comentários-->
					<span class="comments"><?php comments_number( '0 comentários', '1 comentário', '% comentários' ); ?></span>
				</div>
			
				<section>
				    <?php the_content(); ?>
		
			    </section>

		
		    </article>
		    
		
		    <?php endwhile; ?>			
		
		    <?php else : ?>
				<!--Post não encontrado-->
		    <?php endif; ?>

	
		    <aside>
		    	<h3>Posts relacionados</h3>
		    	<?php bones_related_posts(); ?>
		    </aside>

		</div> <!-- end #content -->

<?php get_footer(); ?>