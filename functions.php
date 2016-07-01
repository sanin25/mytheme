<?php
/**
 * Шаблон made fermerjeck
 * https://github.com/fermerjeck
 * @package WordPress
 * @subpackage fermerjeck
 */
register_nav_menus( array( // Регистрируем 2 меню
	'top' => 'Верхнее меню',
	'left' => 'Нижнее'
) );
add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(254, 190); // Задаем размеры миниатюре

if ( function_exists('register_sidebar') ){
    register_sidebar(
        array(
            'name'			 => __( 'main' ),
            'id'			 => 'home-sidebar',
            'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'	 => '</aside>',
            'before_title'	 => '<h3 class="widget-title">',
            'after_title'	 => '</h3>',
        ) );

}

$args = array(
	'flex-width'    => true,
	'flex-height'    => true,
    'width'         => 0,
    'height'        => 0,
	'header-text'   => true,
	'default-image' => get_template_directory_uri() . '/img/header.png',
);
add_theme_support( 'custom-header', $args );


 function addAllScriptsAndCss(){
        /*Scripts*/


        wp_enqueue_script( 'my-jquery-ui', get_template_directory_uri().'/js/jquery-ui.min.js',array('jquery'));

        wp_enqueue_script( 'my-bxslider', get_template_directory_uri().'/js/jquery.bxslider.min.js',array('jquery'));

        wp_enqueue_script( 'my_TweenMax', get_template_directory_uri().'/js/TweenMax.min.js',array('jquery'));

        wp_enqueue_script( 'my_ScrollMagic', get_template_directory_uri().'/js/ScrollMagic.js',array('jquery'));
        wp_enqueue_script( 'my_TextPlugin', get_template_directory_uri().'/js/debug.addIndicators.js',array('jquery'));

        wp_enqueue_script( 'my_gsap', get_template_directory_uri().'/js/animation.gsap.js',array('jquery'));

        wp_enqueue_script( 'my-script', get_template_directory_uri().'/js/myscript.js',array('jquery'));

       
        /*Css*/

     wp_enqueue_style( 'my-font-awesome', get_stylesheet_directory_uri().'/css/font-awesome.min.css');

     wp_enqueue_style( 'my-mystyle', get_stylesheet_directory_uri().'/css/style.css');


 }

    add_action('wp_enqueue_scripts', 'addAllScriptsAndCss');


//Вывод кратких данных из корзины
if ( ! function_exists( 'cart_link' ) ) {
    function cart_link() {
        ?>
        <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Перейти в корзину' ); ?>"><i class="fa fa-shopping-cart"></i><?php echo sprintf (_n( '%d товар', '%d товаров', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
        <?php
    }
}

//Ajax Обновление кратких данных из корзины
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Перейти в корзину' ); ?>"><i class="fa fa-shopping-cart"></i><?php echo sprintf (_n( '%d товар', '%d товаров', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}

?>

