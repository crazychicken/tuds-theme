<?php get_header(); the_post();?>

<div class="main">
	<div class="body-content">
		<!-- <div class="wrap-slide">

			<div class="slides">
				<img src="wp-content/themes/dung-website/assets/images/img-slide.png" alt="" id="1">
				<img src="wp-content/themes/dung-website/assets/images/img-slide-1.png" alt="" id="2">
				<img src="wp-content/themes/dung-website/assets/images/img-slide-2.png" alt="" id="3">
			</div>

		</div> -->
		<div class="wrap-slide">
			<?php echo do_shortcode("[metaslider id=152]"); ?>
		</div>

		<div class="block-title">
			<h3><i class="icon-paste"></i>New project</h3>
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

			<div class="block-info">
				<h3><a href="#">Project info</a></h3>
				<p>
					<?php the_excerpt(); ?>
				</p>
				<a class="view-more" href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_url') ?>/assets/images/arrow-right.png" alt=""></a>
			</div>
		</div>
		<?php endwhile; ?>

		<div class="block-title">
			<h3><i class="icon-group"></i>Member Projects</h3>
		</div>
		<ul class="thumbnails">
			<?php 
				$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY user_registered LIMIT 3");
			?>
			<?php if($authors && count($authors) > 0): ?>

				<?php foreach($authors as $author): ?>
					<!-- Get author post -->
					<?php
						$post_query = "SELECT ID, post_date, post_title
											from $wpdb->posts 
											WHERE 
												$wpdb->posts.post_author=%d 
												AND $wpdb->posts.post_type=%s
												AND $wpdb->posts.post_status=%s
										 	LIMIT 3";

						$post_query = $wpdb->prepare($post_query, $author->ID, 'project', 'publish');
						$posts = $wpdb->get_results($post_query);
					?>
					<?php if(count($posts) > 0): ?>
					<li class="thumbnail">
						<a href="<?php echo esc_url( get_author_posts_url( $author->ID ) ); ?>">
							<?php if (function_exists('get_avatar')) { echo get_avatar( $author->ID, '270'); }?>
						</a>
						<h4 class="name"><a href="<?php echo esc_url( get_author_posts_url( $author->ID ) ); ?>"><?php echo $author->user_nicename; ?></a></h4>
						<ol>
							<li class="header-title">Project</li>
							<?php foreach($posts as $post): ?>
								<li>
									<a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title ?></a>
								</li>
							<?php endforeach ?>
						</ol>
					</li>
					<?php endif; ?>
				<?php endforeach; ?>

			<?php endif; ?>
		</ul>
	</div>

	<?php get_sidebar();?>
</div>

<?php get_footer();?>