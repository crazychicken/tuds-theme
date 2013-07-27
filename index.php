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

		<div <?php post_class('post') ?>>
			<div class="block-title">
				<h3 class="entry-title noinfo"><i class="icon-paste"></i><?php the_title(); ?></h3>
			</div>
			<div class="content">
				<?php the_content() ?>
			</div>
		</div>
	</div>

	<?php get_sidebar();?>
</div>

<?php get_footer();?>