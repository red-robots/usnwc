 <?php
/*
 * Template Name: Rows Template
 */

get_header('page'); ?>



 <?php get_sidebar("banner");?>
<?php
/*
 *
 */   
get_template_part('loop','article');
display_loop_article(array(
	'post_parent'=>$post->ID,
	'post_type'=>'page',
	'order'=>'ASC',
	'posts_per_page'=>'-1','orderby'=>'menu_order'
));
?>
    

<?php get_footer('page'); ?>