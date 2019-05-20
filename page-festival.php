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
	</article> 



<article class=" post filtering">
<!-- <header><h1><?php the_title(); ?> Schedule</h1></header> -->
  <div class="filter-wraper">

    <?php 
    	if( is_page( array('confluence', 'flowfest', 'outdoor-market') )){
    		get_template_part('includes/pt-festival-filtering');
    	} else {
    		get_template_part('includes/festival-filtering');
    	}
    	 ?>
    	

  </div>
</article>

  <article class="post <?php echo $post->post_name; ?>">
      <?php the_field('bottom_content') ?>
      <?php comments_template(); ?>
  </article> 


	<?php if(in_array(get_field('sidebar'),array("bottom","both"),true)){
		$sidebar="bottom";
		get_template_part('sidebar');
	} 
} //end of if have posts ?> 

<?php get_footer('page'); 
?>