<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<link rel="stylesheet" type="text/css" href="wp-content/themes/dung-website/assets/css/font-awesome.css">
	<!-- [if IE 7] -->
	<link rel="stylesheet" type="text/css" href="wp-content/themes/dung-website/assets/css/font-awesome-ie7.css">
	<!-- [endif] -->

	<link rel="stylesheet" type="text/css" href="wp-content/themes/dung-website/style.css">

	<?php wp_head(); ?>
</head>

<body>
	<div class="container">
		<a class="goto-top" href="#"><img src="wp-content/themes/dung-website/assets/images/go-top.png" alt=""></a>
		<div class="header">
			<!-- <a class="brand logo">
				<img <?php bloginfo("name"); ?> src="wp-content/themes/dung-website/assets/images/logo.png" alt="">
			</a> -->
			<h1 class="site-title brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<?php get_search_form();?>
		</div>

		<ul class="breadcrumbs">
			<?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</ul>


	