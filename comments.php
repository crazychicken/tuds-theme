<div class="comment">
	<h3>Comment</h3>
	<p class="number-comment"><i class="icon-comment-alt"></i><a href="#"> <?php echo get_comments_number() ?> Comment</a></p>
	
	<?php 
		comment_form(array(
			'title_reply' => '',
			'comment_notes_after' => ''
		)); 
	?>

	<?php if ( have_comments() ) : ?>
		<ul class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use twentyeleven_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define twentyeleven_comment() and that will be used instead.
				 * See twentyeleven_comment() in twentyeleven/functions.php for more.
				 */
				wp_list_comments(array(
					'callback' => 'twentyeleven_comment'
				));
			?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyeleven' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyeleven' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentyeleven' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>
</div>
