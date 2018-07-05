 <?php
/*
 * Template Name: All News
*/
get_header(); ?>

 <?php $post = get_post('13642');
 setup_postdata($post);
 get_sidebar("banner");?>
 <header class="post">
	<h1>News</h1>
</header>
<?php 
/*
 * The call to get_template_part gets the template function display_loop_tile
 * which queries the posts based on the supplied args
 * The arguments for the query are supplied as arguments for the function.
 * The loop cleans up and resets the query after it is called
 */
get_template_part('loop','tile');
display_loop_tile(array('cat'=>'4','post_type'=>'post','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>'-1'));
?>

<?php get_footer(); ?>