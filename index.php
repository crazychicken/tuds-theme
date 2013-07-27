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
			$args = array( 'post_type' => 'project', 'posts_per_page' => 2, 'orderby' => 'post_date', 'order' => 'DESC' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ):
				$loop->the_post();
		?>

		<div class="block">
			<a href="#">
				<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '270'); }?>
			</a>
			<div class="block-right">
				<h2 class="project-name"><a href="#"><?php the_title(); ?></a></h2>
				<span class="name"><a href="#"><?php the_author() ?></a></span>
				<p class="members">Member : <a href="#">john doe,</a> <a href="#">Petter,</a> <a href="#">Marry</a> ...</p>
			</div>

			<div class="block-info">
				<h3><a href="#">Project info</a></h3>
				<p>
					<?php the_excerpt(); ?>
				</p>
				<a class="view-more" href="#"><img src="<?php bloginfo('template_url') ?>/assets/images/arrow-right.png" alt=""></a>
			</div>
		</div>

		<?php endwhile; ?>
	</div>

	<?php get_sidebar();?>
</div>

<?php get_footer();?>