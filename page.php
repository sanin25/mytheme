<?php
/**
 * Шаблон made fermerjeck
  * https://github.com/fermerjeck
 * @package WordPress
 * @subpackage fermerjeck
 */
get_header(); // Подключаем хедер?>
<?php if ( is_active_sidebar( 'home-sidebar' ) ){ ?>
    <ul id="sidebar">
        <?php dynamic_sidebar( 'main' ); ?>
    </ul>
<?php } ?>
<?php get_footer(); // Подключаем футер ?>