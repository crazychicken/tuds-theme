<?php get_header();?>

<div class="main">
	<div class="body-content">
		<div <?php post_class('post') ?>>
			<div class="block-title">
				<h3 class="entry-title noinfo"><i class="icon-paste"></i><?php the_title(); ?></h3>
			</div>
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 'post_type' => 'project', 'orderby' => 'post_date', 'order' => 'DESC', 'paged'=> $paged);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ):
					$loop->the_post();
			?>

				<div class="block">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
						<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '270'); }?>
					</a>
					<div class="block-right">
						<h2 class="project-name"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<span class="name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author() ?></a></span>
						<?php 
							$taxonomy = 'people';
		  					$terms = wp_get_post_terms($post->ID, $taxonomy);
		  				?>
						<?php if(count($terms) > 0) : ?>
							<p class="members">Member : 
								<?php foreach($terms as $term): ?>
									<?php 
										$term_link = get_term_link( $term, 'people');
									    if( is_wp_error( $term_link ) )
									        continue;
									?>
									<a href="<?php echo $term_link ?>"><?php echo $term->name ?></a>
								<?php endforeach; ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
			
			<?php if ($paged > 1) { ?>

			<nav id="nav-posts">
				<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
				<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
			</nav>

			<?php } else { ?>

			<nav id="nav-posts">
				<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
			</nav>

			<?php } ?>

			<?php wp_reset_postdata(); ?>
		</div>
	</div>

	<?php get_sidebar();?>
</div>
	
<?php get_footer() ?>