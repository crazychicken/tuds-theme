<?php get_header(); the_post();?>

<div class="main">
	<div class="body-content">
		
		<?php if ( is_active_sidebar( 'metaslider' ) ) : ?>
			<?php if (!dynamic_sidebar('metaslider') ) : ?>
			<?php endif; ?>
		<?php endif; ?>

		<div class="block-title">
			<h3><i class="icon-paste"></i><?php echo __('New project', 'tuds') ?></h3>
		</div>
		<?php
			$args = array( 'post_type' => 'project', 'posts_per_page' => 2, 'orderby' => 'menu_order', 'order' => 'ASC' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ):
				$loop->the_post();
		?>

		<div class="block">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
				<?php //if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '270'); }?>
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

			<div class="block-info">
				<h3><a href="#">Project info</a></h3>
				<p>
					<?php the_excerpt(); ?>
				</p>
				<a class="view-more" href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url') ?>/assets/images/arrow-right.png" alt=""></a>
			</div>
		</div>
		<?php endwhile; ?>

		<?php if ( is_active_sidebar( 'featured_member' ) ) : ?>
		<div class="block-title">
			<h3><i class="icon-group"></i>Member Projects</h3>
		</div>

		<ul class="thumbnails">
			<?php if (!dynamic_sidebar('featured_member') ) : ?>
			<?php endif; ?>
		</ul>
		<?php endif; ?>
	</div>

	<?php get_sidebar();?>
</div>

<?php get_footer();?>