<?php get_header(); ?>
    <script src="<?php bloginfo('template_url'); ?>/library/js/jquery.masonry.min.js" type="text/javascript"></script>
		<h1 class="page-title">Cursos do Templo
		<a class="how-works">como funciona? &darr;</a>
		</h1>
			<!-- fiters navigation -->
			<nav class="blognav">
			    <div class="categorias">
    		        <h3>Categorias</h3>
    		        <a data-href="todas" class="active-handler">Todas</a>
    		        <ul class="categories">
    		        	<?php $cats = get_terms('cursos_cat');
    		        	echo '<li class="li-active"><a data-href="todas">Todas</a></li>';
    		        	foreach ($cats as $cat) {
    		        	    echo '<li><a data-href="'.$cat->slug.'">'.$cat->name.'</a></li>';
    		        	}; ?>
    		        </ul>
    		    </div>
    		    <div class="dificuldade">
        		    <h3>Dificuldade</h3>
        		    <a data-href="todas" class="active-handler">Todas</a>
    		        <ul class="categories">
    		        	<?php $terms = get_terms('cursos_dificuldade');
    		        	echo '<li ><a data-href="todas">Todas</a></li>';
    		        	foreach ($terms as $term) {
    		        	    echo '<li><a data-href="'.$term->slug.'">'.$term->name.'</a></li>';
    		        	}; ?>
    		        </ul>
    		    </div>
				
				<?php get_search_form(); ?>
				<input type="hidden" name="post_type" value="post type name" />
			</nav>
			<!-- display of the courses -->
			<div id="content">
				<ul>
				    <?php query_posts( 'posts_per_page=-1&post_type=cursos&orderby=menu_order&order=ASC' ); if (have_posts()) : while (have_posts()) : the_post(); ?>
					    <li id="post-<?php the_ID(); ?>" class="post block todas <?php $cats = get_the_terms( $post->ID, 'cursos_cat'); foreach ($cats as $cat) { echo $cat->slug.' '; }?>" alt="<?php $terms = get_the_terms( $post->ID, 'cursos_dificuldade'); foreach ($terms as $term) { echo $term->slug.' '; }?>">
					    
							<figure>
        					    <?php if( get_field( "status" ) === 'confirmado' ): ?><img src="<?php bloginfo('template_url') ?>/library/images/label-confirmado.png" alt="confirmado" class="label-confirmado" /><?php endif; ?>
								<?php if (has_post_thumbnail()){
									the_post_thumbnail(array(250,300));
									} else { ?>
									<img src="<?php  bloginfo('template_directory');  ?>/library/images/destaque-default.png" alt="templo" />
								<?php } ?>
								<figcaption>
    								<a href="<?php the_permalink(); ?>" class="detalhes">
								    <div class="favorite-post"><?php wpfp_link(); ?><span class="number"><?php wpfp_get_current_count(); ?></span></div>
									<span class="blog_cat <?php  echo $cat->slug.' '; ?>">
									</span>
									</a>
								</figcaption>
							</figure>
						    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						    <!--
					        <a href="<?php the_permalink(); ?>" class="inscreva-se" target="_blank">Inscreva-se aqui</a>-->
					    </li> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					    <?php else : ?>
					    
				    	<!--Posts not found-->
					
					    <?php endif; ?>
				</ul>
				<div id="explanation">
					<div class="wrapper">
						<?php echo apply_filters('the_content', get_page(554)->post_content); ?>
					</div>
				</div>
			</div> <!-- end #content -->
<?php get_footer(); ?>