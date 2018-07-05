 <?php
/*
 * Template Name: Rows w/content Template
 */

get_header('page'); ?>



 <?php get_sidebar("banner");?>
<?php
/*
 *
 */   
get_template_part('loop','article-with-content');
display_loop_article(array(
	'post_parent'=>$post->ID,
	'post_type'=>'page',
	'order'=>'ASC',
	'posts_per_page'=>'-1','orderby'=>'menu_order'
));
?>
    

<?php get_footer('page'); ?>
