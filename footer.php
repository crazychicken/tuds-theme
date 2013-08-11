	
	</div>
	<!-- /end container -->
	
	<div class="footer">
		<ul class="nav">
			<?php wp_nav_menu( $args ); ?>
		</ul>
		<br>
		<p>Copy right @ clgt.vn 2013</p>
	</div>
	<?php wp_footer();?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("ul.thumbnails li:nth-child(4)").css('clear', 'both');
		});
	</script>
</body>
</html>