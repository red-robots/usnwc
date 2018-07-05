<?php 
/*
 * Template Name: Recursive Display Enhanced Article
 * @author: Fritz Healy
 * NOTE: Working from existing templates
 *
 *
 */

get_header(); ?>


<?php get_sidebar("banner");?>
<?php 
/*
 * the call to get_template_part gets the template function display_loop_tile_recursive_enhanced
 * which queries the posts based on the supplied args and displays the post and all children
 * as tiles
 * The arguments for the query are supplied as arguments to the function
 * The loop cleans up and resets the query after it is called
 */
get_template_part('loop','recursiveEnhancedArticle');
display_loop_tile_recursive_enhanced_article(array('post_parent'=>$post->ID,'post_type'=>'page','order'=>'ASC', 'posts_per_page'=>'-1','orderby'=>'menu_order'));
?>


<?php get_footer(); 
?>