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
					<span class="name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' ) ?></a></span>
				</div>
				<div class="block-info">
					<h3>Project info</h3>
					<p>
						<?php echo the_content(); ?>
					</p>
					<?php 
						$members = get_post_meta(get_the_ID(), 'member', true);
					?>
					
					<?php if(count($members) > 0): ?>
						<p class="members">Member : 
							<?php foreach($members as $member): ?>
								<?php 
									$member_meta = get_the_author_meta('display_name', $member);
									$author_url = esc_url( get_author_posts_url( $member ) );
								?>
								<a href="<?php echo $author_url ?>"><?php echo $member_meta ?></a>
							<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>

			<?php comments_template( '', true ); ?>
		</div>
		<?php get_sidebar();?>
	</div>

<?php get_footer(); ?>