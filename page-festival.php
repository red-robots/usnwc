 <?php
/*
 * Template Name: Festival
*/
get_header('page'); ?>



 <?php get_sidebar("banner");?>
<?php if(have_posts()){ 
   	the_post(); ?>
	<?php if(in_array(get_field('sidebar'),array("top","both"),true)){
		$sidebar="top";
		get_template_part('sidebar');
	} ?>  
	<article class="post <?php echo $post->post_name; ?>">
	  	<header>
    	   	<h1><?php the_title(); ?></h1>
  		</header>
    	<?php the_content(); ?>
      <?php get_template_part('includes/festival-filtering'); ?>
      <?php the_field('bottom_content') ?>
    	<?php comments_template(); ?>
	</article>  

<!-- <article class="filtering">
  <?php 
      ?>

</article> -->
	<?php if(in_array(get_field('sidebar'),array("bottom","both"),true)){
		$sidebar="bottom";
		get_template_part('sidebar');
	} 
} //end of if have posts ?> 

<?php get_footer('page'); 
?>