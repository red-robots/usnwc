 <?php
/*
 * Template Name: Employment
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
    	<?php //the_content(); ?>

      

    	<?php if( have_rows('full_time_positions') ):  ?>
    		<section class="employment-pos">
    			<h2>Full-Time positions</h2>
    		<?php while( have_rows('full_time_positions') ):  the_row(); 
    				$pos = get_sub_field('position');
    				$link = get_sub_field('link');
    			?>
    			<div class="position">
    				<a href="<?php echo $link; ?>" target="_blank"><?php echo $pos; ?></a>
    			</div>

    	<?php endwhile; ?>
    	</section>
    	<?php endif; ?>


    	<?php if( have_rows('part_time_positions') ):  ?>
    		<section class="employment-pos right">
    			<h2>Part-Time positions</h2>
    		<?php while( have_rows('part_time_positions') ):  the_row(); 
    				$pos = get_sub_field('position');
    				$link = get_sub_field('link');
    			?>
    			<div class="position">
    				<a href="<?php echo $link; ?>" target="_blank"><?php echo $pos; ?></a>
    			</div>

    	<?php endwhile; ?>
    	</section>
    	<?php endif; ?>




    	<?php comments_template(); ?>
	</article>  

<!-- <article class="filtering">
  <?php 
      // for filtering big festival days
      //get_template_part('includes/festival-filtering'); ?>

</article> -->
	<?php if(in_array(get_field('sidebar'),array("bottom","both"),true)){
		$sidebar="bottom";
		get_template_part('sidebar');
	} 
} //end of if have posts ?> 

<?php get_footer('page'); 
?>