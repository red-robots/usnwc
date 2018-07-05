<?php 
/*
 * Template Name: Recursive Display
 * @author: Fritz Healy
 * NOTE: Working from existing templates
 *
 *
 */
get_header(); ?>


<?php get_sidebar("banner");?>
<?php 
/*
 * Display the content of the parent page and header if there is content to show
 */
if($content=$post->post_content){ ?>
	<a name="<?php echo $post->post_name;?>"></a>
	<header class="post"><h2><?php the_title();?></h2></header>
	<section class="post <?php echo $post->post_name;?>"><?php echo $content;?></section>
<?php }
/*
 * the call to get_template_part gets the template function display_loop_tile_recursive
 * which queries the posts based on the supplied args and displays the post and all children
 * as tiles
 * The arguments for the query are supplied as arguments to the function
 * The loop cleans up and resets the query after it is called
 */
get_template_part('loop','recursive');
display_loop_tile_recursive(array('post_parent'=>$post->ID,'post_type'=>'page','order'=>'ASC', 'posts_per_page'=>'-1','orderby'=>'menu_order'));
?>


<?php get_footer(); 
?>