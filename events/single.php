
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
		
		
		<!--Featured image-->
	    <figure class="article-header">
			<?php if (has_post_thumbnail()){
				the_post_thumbnail( '650' );
			} else { ?>
				<img src="<?php  bloginfo('template_directory');  ?>/library/images/destaque-default.png" alt="templo" />
			<?php } ?>
	    </figure>
	    
	    <!--Titulo do post-->
	    <h2 class="single-title title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    
		<section>

			<div id="tribe-events-event-meta" class="tribe-events-event-list-meta">
				<table cellspacing="0">
					<?php if (tribe_is_multiday() || !tribe_get_all_day()): ?>
					<tr>
						<td class="tribe-events-event-meta-desc"><?php _e('Início:', 'tribe-events-calendar'); ?></td>
						<td class="tribe-events-event-meta-value" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date(); ?></td>
					</tr>
					<tr>
						<td class="tribe-events-event-meta-desc"><?php _e('Fim:', 'tribe-events-calendar'); ?></td>
						<td class="tribe-events-event-meta-value" itemprop="endDate" content="<?php echo tribe_get_end_date(); ?>"><?php echo tribe_get_end_date(); ?></td>
					</tr>
					<?php else: ?>
					<tr>
						<td class="tribe-events-event-meta-desc"><?php _e('Data:', 'tribe-events-calendar'); ?></td>
						<td class="tribe-events-event-meta-value" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date(); ?></td>
					</tr>
					<?php endif; ?>
			
					<?php
						$venue = tribe_get_venue();
						if ( !empty( $venue ) ) :
					?>
					<tr>
						<td class="tribe-events-event-meta-desc"><?php _e('Local:', 'tribe-events-calendar'); ?></td>
						<td class="tribe-events-event-meta-value" itemprop="name">
							<?php if( class_exists( 'TribeEventsPro' ) ): ?>
								<?php tribe_get_venue_link( get_the_ID(), class_exists( 'TribeEventsPro' ) ); ?>
							<?php else: ?>
								<?php echo tribe_get_venue( get_the_ID() ); ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php endif; ?>
					<?php
						$phone = tribe_get_phone();
						if ( !empty( $phone ) ) :
					?>
					<tr>
						<td class="tribe-events-event-meta-desc"><?php _e('Telefone:', 'tribe-events-calendar'); ?></td>
						<td class="tribe-events-event-meta-value" itemprop="telephone"><?php echo $phone; ?></td>
					</tr>
					<?php endif; ?>
					<?php if (tribe_address_exists( get_the_ID() ) ) : ?>
					<tr>
						<td class="tribe-events-event-meta-desc"><?php _e('Endereço:', 'tribe-events-calendar'); ?><br />
						<?php if( get_post_meta( get_the_ID(), '_EventShowMapLink', true ) == 'true' ) : ?>
							<a class="gmap" itemprop="maps" href="<?php echo tribe_get_map_link(); ?>" title="Click to view a Google Map" target="_blank"><?php _e('Google Map', 'tribe-events-calendar' ); ?></a>
						<?php endif; ?></td>
						<td class="tribe-events-event-meta-value"><?php echo tribe_get_full_address( get_the_ID() ); ?></td>
					</tr>
					<?php endif; ?>
					<?php
						$cost = tribe_get_cost();
						if ( !empty( $cost ) ) :
					?>
					<tr>
						<td class="tribe-events-event-meta-desc"><?php _e('Preço:', 'tribe-events-calendar'); ?></td>
						<td class="tribe-events-event-meta-value" itemprop="price"><?php echo $cost; ?></td>
					 </tr>
					<?php endif; ?>
				</table>
			</div>
			</section>
		</article>
		<?php edit_post_link( 'editar', '', '', 'edit-link' ); ?> 

	    <aside>
	    	<h3>Eventos</h3>
	    	<ul id="related-posts">
	    		<?php query_posts( 'post_type=tribe_events&orderby=rand&posts_per_page=3' );
	    		    while (have_posts()) : the_post(); ?>
	    		
	    		    <li id="post-<?php the_ID(); ?>" <?php post_class('related_post'); ?>>
	    				<figure>
	    					<a href="<?php the_permalink(); ?>">
	    						<?php if (has_post_thumbnail()){
	    							the_post_thumbnail(array(200,150));
	    						} else { ?>
	    							<img src="<?php  bloginfo('template_directory');  ?>/library/images/destaque-default.png" alt="templo" />
	    						<?php } ?>
	    					</a>
	    				</figure>
	    			    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	    		
	    		    </li> <!-- end article -->
	    		
	    		    <?php endwhile; ?>
	    		
	    	</ul>
	    </aside>
