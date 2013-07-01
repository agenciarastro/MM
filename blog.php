<?php
/*
Template Name: blog
*/
?>

<?php get_header(); ?>
		<h1 class="page-title">Papo de Monge</h1>
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
				<ul>
				    <?php 
					    query_posts( 'post_type=blog' );
					    if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <li id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
							<figure>
								<a href="<?php the_permalink(); ?>">
									<?php if (has_post_thumbnail()){
										the_post_thumbnail(array(700,150));
									} else { ?>
										<img src="<?php  bloginfo('template_directory');  ?>/library/images/destaque-default.png" alt="templo" />
									<?php } ?>
								</a>
								<figcaption>
										<span class="blog_cat">
											<?php $categorias = get_the_terms( $post->ID , 'blog_cat' ); 
											if ($categorias){ foreach ( $categorias as $categoria ) { echo $categoria->name; }} ?>
										</span>
								</figcaption>
							</figure>
						    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						    
						    <div class="meta">
							    <!--Comments-->
							    <?php if ( comments_open() ) : ?>
						    		<?php comments_popup_link( '<span class="leave-reply">' . __( 'Comentar', 'bones' ) . '</span>', __( 'Comentar (1)', 'bones' ), __( 'Comentar (%)', 'bones' ) ); ?>
							    <?php endif; // End if comments_open() ?><br />
							    <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" title="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time>
						    </div>
					
					    </li> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					    <?php else : ?>
					    
					    	<!--Posts not found-->
					
					    <?php endif; ?>
			</ul>
		</div> <!-- end #content -->

<?php get_footer(); ?>