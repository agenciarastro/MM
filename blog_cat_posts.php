<ul>
<?php $terms = get_terms('blog_cat');
foreach ($terms as $term) {
	query_posts( 'posts_per_page=1&post_type=blog&blog_cat='.$term->slug );
	// The Loop
	while ( have_posts() ) : the_post(); ?>
		<li>
			<h4><a href="<?php the_permalink(); ?>"><span class="data"><?php the_time('d') ?><span class="mes">/ <?php the_time('M') ?></span></span> <span class="subtitulo"><?php echo $term->name; ?></span> <?php the_title() ?></a></h4>
		</li>
	<?php endwhile;
	
	// Reset Query
	wp_reset_query();
} ?>
</ul>