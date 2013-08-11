<?php

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Filter wp_nav_menu() to add additional links and other output
function new_nav_menu_items($items) {
	$homeClass = is_home() ? 'current_page_item': '';
	$homelink = '<li class="home ' . $homeClass . '"><a href="' . home_url( '/' ) . '">' . __('Home') . '</a></li>';
	$items = $homelink . $items;
	return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );

function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<div class="comment-body">
			<div class="comment-author vcard">
				<?php
					$avatar_size = 50;
					if ( '0' != $comment->comment_parent )
						$avatar_size = 39;

					// printf('<a href="%1$s"> %3$s %2$s</a> <span class="says">said:</span>', 
					// 	esc_url( get_comment_link( $comment->comment_ID ) ), 
					// 	get_comment_author_link(),
					// 	get_avatar( $comment, $avatar_size )
					// );

					// /* translators: 1: comment author, 2: date and time */
					// printf( __( '%1$s on %2$s <span class="says">said:</span>', 'twentyeleven' ),
					// 	sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
					// 	sprintf( '<a class="avatar-comment" href="%1$s"><time datetime="%2$s">%3$s</time></a>',
					// 		esc_url( get_comment_link( $comment->comment_ID ) ),
					// 		get_comment_time( 'c' ),
					// 		/* translators: 1: date, 2: time */
					// 		sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
					// 	)
					// );
				?>
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>" class="avatar-comment">
					<?php echo get_avatar( $comment, $avatar_size ) ?>
				</a>

				<cite class="fn">
					<a href="#" rel="external nofollow" class="url"><?php echo get_comment_author_link() ?></a>
				</cite>
				<span class="says">says:</span>
			</div>
			<div class="comment-meta commentmetadata">
				<?php printf( __( '%1$s at %2$s', 'tuds_theme' ), get_comment_date(), get_comment_time() ) ?>
			</div>
			<?php comment_text(); ?>
			<!-- <div class="reply f-right">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div> -->
		</div>

	<?php
			break;
	endswitch;
}

add_theme_support( 'post-thumbnails' ); 

/**
 * Registers two widget areas.
 *
 * @return void
 */
function my__widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'twentythirteen' ),
		'id'            => 'featured_member',
		'description'   => __( 'Appears in the footer section of the site.', 'twentythirteen' ),
		'before_widget' => '<li class="thumbnail">',
		'after_widget'  => '</li>'
	) );

	register_sidebar( array(
		'name'          => __( 'Home page slider area', 'tuds' ),
		'id'            => 'metaslider',
		'description'   => __( 'Home page slider.', 'tuds' ),
		'before_widget' => "",
		'after_widget'  => ""
	) );
}
add_action( 'widgets_init', 'my__widgets_init' );