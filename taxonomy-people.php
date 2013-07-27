<?php get_header();?>
	<div class="main">
		<div class="body-content">
			<div class="block-title">
				<h3><i class="icon-paste"></i>Project list</h3>
			</div>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="block">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
							<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '270'); }?>
						</a>
						<div class="block-right">
							<h2 class="project-name"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<span class="name"><a href="#"><?php the_author() ?></a></span>
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
			<?php else : ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar();?>
	</div>
<?php get_footer(); ?>