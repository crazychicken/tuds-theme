<?php get_header();?>
	<div class="main">
		<div class="body-content">
			<div class="block-title">
				<h3><i class="icon-paste"></i>Project list</h3>
			</div>

			<?php 
				$args = array( 'post_type' => 'project', 'posts_per_page' => 2, 'author' => get_query_var( "author" ), 'orderby' => 'post_date', 'order' => 'DESC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ):
					$loop->the_post();
			?>
				<div class="block">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail() ?>
						<?php else: ?>
							<img src="http://placehold.it/270x170/ffeedd"/>
						<?php endif; ?>
					</a>
					<div class="block-right">
						<h2 class="project-name"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<span class="name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author() ?></a></span>
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
			<?php endwhile; ?>
		</div>
		<?php get_sidebar();?>
	</div>
<?php get_footer(); ?>