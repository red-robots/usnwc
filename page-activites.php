 <?php
/*
 * Template Name: Activities

 	Created 8/5/2019


	This new template will pull in the post type of Activities and show general information about the posttype. This post typs is also used in the passes information.


*/

get_header('page'); 

get_sidebar("banner");
?>

<header class="post"><h1><?php the_title(); ?></h1></header>
<?php
/*
 * The call to get_template_part gets the template function display_loop_tile
 * which queries the posts based on the supplied args
 * The arguments for the query are supplied as arguments for the function.
 * The loop cleans up and resets the query after it is called
 */ 
 get_template_part('loop','tile');
 display_loop_tile(array(
 	// 'post_parent'=>$post->ID,
 	'post_type'=>'activity',
 	'order'=>'ASC',
 	'posts_per_page'=>'-1',
 	'orderby'=>'menu_order'
 ));

?>
<?php 

get_footer('page'); 

?>