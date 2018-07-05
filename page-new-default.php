 <?php
/*
 * Template Name: New Default
*/
get_header('page'); ?>


<div class="category-banners">
    <?php if (is_page('passes')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9103' ); ?>
    <?php } elseif (is_page('rivers-edge-bar-grill')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9673' ); ?>
   <?php } elseif (is_page('the-market')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9675' ); ?>
   <?php } elseif (is_page('pumphouse-biergarten')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9671' ); ?>
      <?php } elseif (is_page('who-we-are')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9710' );  ?>
      <?php } elseif (is_page('our-partners')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9706' );  ?>
      <?php } elseif (is_page('mission-statement')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9704' );  ?>
      <?php } elseif (is_page('play-relax-learn')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9708' ); ?>
      <?php } elseif (is_page('event-planning')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9595' );  ?>
<?php } elseif (is_page('employment')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '10319' );  ?>
<?php } elseif (is_page('memorial-day-trail-race-feedback')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '10462' ); ?>
<?php } elseif (is_page('openhouse')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11407' ); ?>
<?php } elseif (is_page('contact-us')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11434' ); ?>
<?php } elseif (is_page('directions')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11438' ); ?>
<?php } elseif (is_page('what-to-bring')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11443' ); ?>
<?php } elseif (is_page('group-outings-form')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11436' ); ?>
<?php } elseif (is_page('group-outings')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11436' ); ?>
<?php } elseif (is_page('brew-dash-6k-race-feedback')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '10473' ); ?>
<?php } elseif (is_page('canopy-tour')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11922' ); ?>
<?php } elseif (is_page('festivals-concerts-and-ticketed-events')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11924' ); ?>
<?php } elseif (is_page('general')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11926' ); ?>
<?php } elseif (is_page('kayaking')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11928' ); ?>
<?php } elseif (is_page('rafting')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11930' ); ?>
<?php } elseif (is_page('trails')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11932' ); ?>
<?php } elseif (is_page('activity-passes')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11934' ); ?>


  <?php } ?>

</div>


<!-- removes the faetured image if custom field is set -->
<?php
if(get_post_meta($post->ID, 'hide_featured_image', true)): {
    $headerremove = 0;
}
endif;
?>

<div class="wrap">    
    <div id="page">
        <div class="box-content post" style="margin-top:10px;">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
<div class="box-content-image post" style="text-align:center;">
			<?php 
			
			// new stuff
				if(get_post_meta($post->ID, 'use another poster', true)): { ?>
				<img src="<?php echo get_post_meta($post->ID, "use another poster", $single = true); ?>" class="feat-img" />
                <?php }
				// end new stuff 
			elseif ( has_post_thumbnail($headerremove) ):
                the_post_thumbnail('col4', array( 'class' => 'feat-img' ) );
            endif; ?>
</div>

            <h1 class="widget-title"><?php the_title(); ?></h1>
            <div class="page-entry">
            	
                
				<?php the_content(); ?>
                
                    <?php if (($post->post_parent == 178) && !is_page('employment-application')) { ?>
                
                <div class="register-button"><a href="http://usnwc.org/about/employment/employment-application/">Apply Now</a></div>
                
                <?php } ?>
                
            </div><!-- #page-entry -->
           
                
            <?php endwhile; endif; ?>
        </div>
        
	</div><!-- #page -->
    
    <?php get_sidebar(); ?>
    
</div><!-- #wrap -->
<?php get_footer('page'); ?>