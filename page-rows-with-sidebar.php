 <?php
/*
 * Template Name: Rows with sidebar Template
 */

get_header(); ?>



 <?php get_sidebar("banner");?>
<?php

if(in_array(get_field('sidebar'),array("top","both"),true)){
	$sidebar="top";
	get_template_part('sidebar');
}

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

if(in_array(get_field('sidebar'),array("bottom","both"),true)){
	$sidebar="bottom";
	get_template_part('sidebar');
} 
?>
    

<?php get_footer(); ?>