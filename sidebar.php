<div id="secondary" class="widget-area sidebar" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<div id="menu" class="primary">
			 <ul class="nav-menu">
				<?php wp_nav_menu( $args ); ?>
			</ul>
		</div>

	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->