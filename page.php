 <?php
/*
 * Normal Page Template
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
    	<?php if ( get_field('duties') ) { ?>
    	 	<section class="duties">
    	 		<header>
    	   			<h2>Duties & Responsibilities:</h2>
   				</header>
    	    	<?php the_field('duties'); ?>
    		</section>
    	<?php } ?>
    	<?php if ( get_field('skills') ) { ?>
   	   		<section class="skills">
   	   			<header>
   	   				<h2>Desired Skills & Experience:</h2>
      			</header>
      			<?php the_field('skills'); ?>
			</section>
    	<?php } ?>
    	<?php  
    	if ( get_field('year_round') == 'no' && is_page('raft-guide')) { ?>
    	   	<div class="register-button"><a href="/raft-guide-school">Guide School</a></div>
    	<?php }
    	elseif ( get_field('year_round') == 'no' ||  get_field('year_round') == 'yes'  ) { ?> 
    	  	<div class="register-button"><a href="https://fs24.formsite.com/usnwc/form105/index.html">Apply Now</a></div>
    	<?php } ?>
    	<?php comments_template(); ?>
	</article>    
	<?php if(in_array(get_field('sidebar'),array("bottom","both"),true)){
		$sidebar="bottom";
		get_template_part('sidebar');
	} 
} //end of if have posts ?> 

<?php get_footer('page'); 
?>