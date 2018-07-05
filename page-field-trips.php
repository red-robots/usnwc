 <?php
/*
 * Template Name: Field Trips
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
        <div class="icon container field-trips">
            <a href="http://usnwc.org/visit/facility-map/" target="_blank">
                <div class="icon">
                    <img src="http://usnwc.org/wp-content/uploads/2014/10/facility_map.jpg" alt="Facility Map Icon">
                    <header><h2>Facility Map</h2></header>
                </div>
            </a>
            <a href="http://usnwc.org/calendar/" target="_blank">
                <div class="icon">
                    <img src="http://usnwc.org/wp-content/uploads/2014/10/general.jpg" alt="Calendar Icon">
                    <header><h2>Calendar</h2></header>
                </div>
            </a>
            <a href="http://usnwc.org/wp-content/uploads/2014/10/Current-Assumption-of-Risk-Waiver.pdf" target="_blank">
                <div class="icon">
                    <img src="http://usnwc.org/wp-content/uploads/2014/10/waiver.jpg" alt="Waiver Icon">
                    <header><h2>Waiver</h2></header>
                </div>
            </a>
            <a href="http://usnwc.org/visit/virtual-tour/" target="_blank">
                <div class="icon">
                    <img src="http://usnwc.org/wp-content/uploads/2014/10/virtual_tour.jpg" alt="Virtual Tour Icon">
                    <header><h2>Virtual Tour</h2></header>
                </div>
            </a>
        </div>
    	<?php comments_template(); ?>
	</article>    
	<?php if(in_array(get_field('sidebar'),array("bottom","both"),true)){
		$sidebar="bottom";
		get_template_part('sidebar');
	} 
} //end of if have posts ?> 

<?php get_footer('page'); 
?>