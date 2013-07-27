<?php get_header(); the_post(); ?>
		
	<div class="main">
		<div class="body-content">
			<div class="block">
				<a href="<?php the_permalink() ?>" title="<?php the_author() ?>">
					<?php //if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '270'); }?>
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail() ?>
					<?php else: ?>
						<img src="http://placehold.it/270x170/ffeedd"/>
					<?php endif; ?>
				</a>
				<div class="block-right">
					<h2 class="project-name"><a href="#"><?php the_title(); ?></a></h2>
					<span class="name"><a href="#"><?php echo get_the_author_meta( 'user_nicename' ) ?></a></span>
				</div>
				<div class="block-info">
					<h3><a href="#">Project info</a></h3>
					<p>
						<?php echo the_content(); ?>
					</p>
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

			<?php comments_template( '', true ); ?>
		</div>
		<?php get_sidebar();?>
	</div>

<?php get_footer(); ?>