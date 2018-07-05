 <?php
/*
 * Template Name: Activity Single Featured Header
*/
get_header('page'); ?>


<div class="category-banners">
    <?php if (is_page('whitewater-rafting')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9581' ); ?>
    <?php } elseif (is_page('sup-squatch')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9583' ); ?>
      <?php } elseif (is_page('whitewater-sup')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9585' );  ?>
      <?php } elseif (is_page('rodeo-rafting')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9579' );  ?>
      <?php } elseif (is_page('whitewater-kayaking')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9587' );  ?>
      <?php } elseif (is_page('slalom')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9589' ); ?>
    
      <?php } elseif (is_page('flatwater-kayaking')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9593' );  ?>
      <?php } elseif (is_page('stand-up-paddle-boarding')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9595' );  ?>
      <?php } elseif (is_page('war-canoes')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9597' );  ?>
    
    <?php } elseif (is_page('adventure-course')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9602' );  ?>
    <?php } elseif (is_page('canopy-tour')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9604' );  ?>
    <?php } elseif (is_page('canyon-crossing')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9606' );  ?>
    <?php } elseif (is_page('canyon-spur')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9608' );  ?>
    <?php } elseif (is_page('canyon-zip')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9610' );  ?>
    <?php } elseif (is_page('climb-2-zip')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9612' );  ?>
    <?php } elseif (is_page('double-cross')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9614' );  ?>
    <?php } elseif (is_page('eco-trekking')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9616' );  ?>
    <?php } elseif (is_page('mega-jump')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9618' );  ?>
    <?php } elseif (is_page('mega-zip')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9620' );  ?>
    <?php } elseif (is_page('mountain-biking')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9622' );  ?>
    <?php } elseif (is_page('obstacle-challenge')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9624' );  ?>
    <?php } elseif (is_page('ridge-course')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9125' );  ?>
    <?php } elseif (is_page('rock-climbing')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9626' );  ?>
    <?php } elseif (is_page('trail-system')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9628' );  ?>
 
  <?php } ?>

</div>

<div class="wrap">

    <div id="page">
        <div class="box-content post">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
			            
	    <h1 class="widget-title"><?php the_title(); ?></h1>
            <div class="page-entry">
                
				<?php the_content(); ?>
                
    
            </div><!-- #page-entry -->
                
          
                
            <?php endwhile; endif; ?>
        </div><!-- box-content post -->
        
	</div><!-- #page -->
    
   <div id="sidebar">
<?php 
//
///////////   VIDEOS    < -----------
//// If there is a video associated with the page then show the video Video dimensions
?>  
  			<?php if ( get_post_meta($post->ID, 'video-embed', true) ) { ?>
			                    <div class="sidebarvideo box-content">
<h3 class="widget-title">Activity Video</h3>
                    		<?php echo get_post_meta($post->ID, "video-embed", $single = true); ?>
                    </div><!-- sidebarvideo  -->
            <?php } ?>
            
<?php 
//
///////////   Slalom Page    < -----------
//
 if(is_page('whitewater-kayaking')) { ?> 
<div class="sidebar-item box-content">
<h3 class="widget-title">Slalom Kayaking</h3>
<ul>
<li><a href="<?php bloginfo('url')?>/slalom">Training</a></li>
<li><a href="<?php bloginfo('url')?>/slalom">Races</a></li>
<li><a href="<?php bloginfo('url')?>/slalom">Water Schedule</a></li>
</ul>
</div><!-- sidebar-item  -->
<?php } // end id id page whitewater kayaing?>


</div><!-- sidebar -->
    
</div><!-- #wrap -->
<?php get_footer('page'); ?>