
<?php get_header(); ?>
	<div id="content" class="wrap clearfix">
	
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    	
    	    <header class="article-header">
    		    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
    	    </header> <!-- end article header -->
    
    	    <section class="entry-content clearfix" itemprop="articleBody">
    		    <?php the_content(); ?>
    		</section> <!-- end article section -->
    	
	    </article> <!-- end article -->
		
		    <?php endwhile; else : ?>
		
			    <article id="post-not-found" class="hentry clearfix">
			    	<header class="article-header">
			    		<h1><?php _e("Nada encontrado.", "bonestheme"); ?></h1>
			    	</header>
			    </article>
		
		    <?php endif; ?>

		</div> <!-- end #content -->

<?php get_footer(); ?>