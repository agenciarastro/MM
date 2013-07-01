<section class="parceiros clearfix">
	<h2>Rede Templo</h2>
	<ul class="honeycomb">
		<?php query_posts( 'post_type=parceiros&posts_per_page=-1' );
		    if (have_posts()) : while (have_posts()) : the_post(); ?>
		<li class="item-<?php echo ++$j; ?>">
			<figure>
				<?php the_post_thumbnail('fullsize'); ?>
			</figure>
			<div class="hex">
				<div class="top"></div>
				<div class="middle">
					<?php the_content(); ?>
				</div>
				<div class="bottom"></div>
			</div>
		</li>
		<?php endwhile; endif; ?>
	</ul>
</section>
