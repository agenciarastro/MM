<?php get_header(); ?>
		<h1 class="page-title"><a href="/cursos/">Cursos do Templo</a></h1>
			<nav class="blognav">
				<ul class="categories">
					<?php $terms = get_terms('cursos_cat');
					echo '<ul>';
					foreach ($terms as $term) {
					    echo '<li><a href="'.get_term_link($term->slug, 'cursos_cat').'">'.$term->name.'</a></li>';
					}
					echo '</ul>'; ?>
				</ul>
				
				<?php get_search_form(); ?>
			</nav>
			<div id="content">
				<ul>
				    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <li id="post-<?php the_ID(); ?>" class="post <?php echo (++$j % 4 == 0) ? 'fourth' : ''; ?>">
							<figure>
								<!--<a href="<?php the_permalink(); ?>">-->
									<?php if (has_post_thumbnail()){
										the_post_thumbnail(array(200,150));
									} else { ?>
										<img src="<?php  bloginfo('template_directory');  ?>/library/images/destaque-default.png" alt="templo" />
									<?php } ?>
								<!--</a>-->
								<figcaption>
									<span class="blog_cat">
										<?php $categorias = get_the_terms( $post->ID , 'cursos_cat' ); 
										if ($categorias){ foreach ( $categorias as $categoria ) { echo $categoria->name; }} ?>
									</span>
								</figcaption>
							</figure>
						    <h2 class="post-title"><?php the_title(); ?></h2>
						    
						    <article>
						        <?php the_content(); ?>
						    </article>
					
					    </li> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					    <?php else : ?>
					    
					    	<!--Posts not found-->
					
					    <?php endif; ?>
			</ul>
		</div> <!-- end #content -->

<?php get_footer(); ?>