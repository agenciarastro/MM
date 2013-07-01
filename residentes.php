<section class="residentes clearfix">
	<h2>Residentes</h2>
	<!--<img src="<?php bloginfo('template_url'); ?>/library/images/residentes.png" alt="Residentes do templo" />-->
    <ul class="honeycomb">
    	<?php query_posts( 'post_type=residentes&posts_per_page=-1&orderby=menu_order&order=ASC' );
    	    if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<li class="item-<?php echo ++$j; ?>">
    		<figure>
    			<?php the_post_thumbnail('fullsize'); ?>
    		</figure>
    		<div class="hex">
    			<div class="middle">
    				<?php the_content(); ?>
    			</div>
    			<div class="bottom"></div>
    		</div>
    	</li>
    	<?php endwhile; endif; ?>
    </ul>	

</section>