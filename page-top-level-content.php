 <?php
/*
 * Template Name: Top Level w/ Content
*/

get_header('page'); ?>


 <?php get_sidebar("banner");?>
<header class="post"><h1><?php the_title(); ?></h1></header>
<?php if(have_posts()){
	the_post();
    if(get_the_content()){ ?>
        <section class="post top-level-content <?php echo $post->post_name; ?>">
            <?php the_content(); ?>
        </section>
    <?php }
} 
/*
 * The call to get_template_part gets the template function display_loop_tile
 * which queries the posts based on the supplied args
 * The arguments for the query are supplied as arguments for the function.
 * The loop cleans up and resets the query after it is called
 */ 
 get_template_part('loop','tile');
 display_loop_tile(array('post_parent'=>$post->ID,'post_type'=>'page','order'=>'ASC','posts_per_page'=>'-1','orderby'=>'menu_order'));
?>
<?php get_footer('page'); ?>