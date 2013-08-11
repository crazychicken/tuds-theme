<div id="secondary" class="widget-area sidebar" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
		<?php wp_nav_menu( $args ); ?>
	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->