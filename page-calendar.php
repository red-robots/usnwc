 <?php
/*
 * template Name: Calendar
*/
global $is_tribe;
$is_tribe = true;
get_header('page'); ?>



 <?php get_sidebar("banner");?>
<?php if(have_posts()){
   	the_post(); ?>
	<article class="post <?php echo $post->post_name; ?>">
	  	<header>
    	   	<h1><?php the_title(); ?></h1>
  		</header>
    	<?php the_content(); ?>
	</article>
	<?php $sidebar="bottom";
	get_template_part('sidebar');
} //end of if have posts ?>

<?php get_footer('page'); 
?>