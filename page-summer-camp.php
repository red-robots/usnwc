 <?php
/*
 * Template Name: Summer Camps
*/
get_header('page'); ?>



 <?php get_sidebar("banner");?>
<?php if(have_posts()){ the_post(); 

		// reg link
		$regLink = get_field('camp_registration_link');
	?>
	<?php if(in_array(get_field('sidebar'),array("top","both"),true)){
		$sidebar="top";
		get_template_part('sidebar');
	} ?>  
	<article class="post <?php echo $post->post_name; ?>">
	  	<header>
    	   	<h1><?php the_title(); ?></h1>
  		</header>
  		<div class="icon container">
			<a href="#campinfo">
				<div class="icon size-Default what-to-bring">
			    	<img class="size-Default" src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/11/Activity_schedule_New.png">
					<header>
						<h2>Camp Info</h2>
					</header>
				</div>
			</a>
			<a href="#campprograms">
				<div class="icon size-Default what-to-bring">
			    	<img class="size-Default" src="<?php bloginfo('template_url'); ?>/images/trail-map.png">
					<header>
						<h2>Programs & Activities</h2>
					</header>
				</div>
			</a>
			<?php if( $regLink ) { ?>
				<a href="<?php echo $regLink; ?>" target="_blank">
					<div class="icon size-Default what-to-bring">
				    	<img class="size-Default" src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/10/what_to_bring.jpg">
						<header>
							<h2>Register</h2>
						</header>
					</div>
				</a>
			<?php } ?>
			<a href="<?php bloginfo('url'); ?>/learn/summer-camp/summer-camp-forms/" >
				<div class="icon size-Default daily-activity-schedule">
			    	<img class="size-Default" src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/11/Activity_schedule_New.png">
					<header>
						<h2>Forms</h2>
					</header>
				</div>
			</a>
		</div>
    	<?php the_content(); ?>
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