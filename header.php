<?php
/**
 * Шаблон made fermerjeck
 * https://github.com/fermerjeck
 * @package WordPress
 * @subpackage fermerjeck
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<!-- RSS, стиль и всякая фигня -->
<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
<title>
<?php // Генерируем тайтл в зависимости от контента с разделителем " | "
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>
<?php
	wp_head(); // Необходимо для работы плагинов и функционала wp
?>


</head>
<body>
<div class="topmenublock">
<?php
		$args = array( // Выводим верхнее меню
			'theme_location'=>'top',
			'container'=>'',
			'depth'=> 0,
			'menu_class' => "topmenu",
			'menu_id' => 'topmenu',
			'fallback_cb' => '__return_empty_string',
			);
		wp_nav_menu($args);
?>
	<div class="headercart">
		<li class="menu-item cart-punkt" ><?php cart_link(); ?><?php the_widget( 'WC_Widget_Cart', 'title=' ); ?></li>
	</div>
</div>
<div class="header">
	<?php if(has_header_image()){?>
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<?php }else{ ?>

			<ul  class="headerslider">
				<li><img src="<?php echo get_template_directory_uri() ?>/img/slider/slide-1.jpg" alt=""></li>
				<li><img src="<?php echo get_template_directory_uri() ?>/img/slider/slide-2.jpg" alt=""></li>
				<li><img src="<?php echo get_template_directory_uri() ?>/img/slider/slide-3.jpg" alt=""></li>
			</ul>

	<?php } ?>
	<div class="logo">
<?php

	if( has_custom_logo() ) the_custom_logo();


?>
	</div>
</div>
