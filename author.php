<?php get_header();?>
	<div class="main">
		<div class="body-content">
			<div class="block-title">
				<h3><i class="icon-paste"></i>Author</h3>
			</div>
			<div class="my-account">
				<div class="block">
					<?php 
						$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval(get_query_var( "author" )));
					?>
					<a href="#">
						<?php if (function_exists('get_avatar')) { echo get_avatar( $curauth->ID, '270'); }?>
					</a>
					<div class="block-right">
						<span class="name"><a href="#"><?php echo $curauth->display_name ?></a></span>
						<p><strong>Email :</strong> <a href="mailto: <?php echo $curauth->user_email ?>"><?php echo $curauth->user_email ?></a></p>
					</div>
					<div class="block-info">
						<h3>Biographical Info</h3>
						<p>
							<?php echo nl2br($curauth->description) ?>
						</p>
					</div>
				</div>
			</div>

			<div class="block-title">
				<h3><i class="icon-paste"></i>Projects</h3>
			</div>

			<ul class="product-list">
			<?php 
				$args = array( 'post_type' => 'project', 'posts_per_page' => 2, 'author' => get_query_var( "author" ), 'orderby' => 'post_date', 'order' => 'DESC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ):
					$loop->the_post();
			?>	
				<li>
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
							
							<?php if(!empty($members) && count($members) > 0): ?>
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
				</li>
			<?php endwhile; ?>
			</ul>
		</div>
		<?php get_sidebar();?>
	</div>
<?php get_footer(); ?>