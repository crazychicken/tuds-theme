<?php get_header(); the_post(); ?>

<div class="main">
	<div class="body-content">
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
	
<?php get_footer() ?>