 <?php
/*
 * Template Name: New Canopy Tour
*/
get_header('page'); ?>

<div class="category-banners">
    <?php if (is_page('canopy-tour')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9604' ); ?>
  <?php } ?>

<div class="wrap">    
    <div id="page">
        <div class="box-content post">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
			     <h1 class="widget-title"><?php the_title(); ?></h1>
                <div class="page-entry">
				<?php the_content(); ?>
                
    
            </div><!-- #page-entry -->
            </div><!-- #page -->    
          
                
            <?php endwhile; endif; ?>
        </div><!-- box-content post -->
        
	</div><!-- #page -->
    
   <div id="sidebar">
   
   
  			
                    <div class="sidebarvideo box-content">
                    	<h3 class="widget-title">Canopy Tour</h3>
                        <iframe width="300" height="169" src="http://www.youtube.com/embed/oDDMj7LisQs?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div><!-- sidebarvideo  -->
                    
                     <div class="sidebarvideo box-content">
                    	<h3 class="widget-title">Twilight Tour</h3>
                        <iframe width="300" height="169" src="http://www.youtube.com/embed/kR9OPPLuAmc?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div><!-- sidebarvideo  -->
           
   
   
  <div class="sidebar-item box-content" id="required-passes">
<h3 class="widget-title">Required Passes</h3>



<div class="side-links"><a href="<?php bloginfo('url'); ?>/visit-us/passes/allsport-pass"><img src="http://usnwc.org/play/wp-content/uploads/2014/03/AllSport_gray.png" /></a></div>
<div class="side-links"><a href="<?php bloginfo('url'); ?>/visit-us/passes/coolsport-pass"><img src="http://usnwc.org/play/wp-content/uploads/2014/03/CoolSport_Gray.png"  /></a></div>
<div class="side-links"><a href="<?php bloginfo('url'); ?>/visit-us/passes/quicksport-pass"><img src="http://usnwc.org/play/wp-content/uploads/2014/03/QuickSport_Gray.png" /></a></div>
<div class="side-links"><a href="http://store.usnwc.org/ecom/ItemList.aspx?node_id=2203253"><img src="http://usnwc.org/play/wp-content/uploads/2014/03/Canopy-Tour.png" /></a></div>



</div><!-- sidebar contetetnt  -->
   
   <div class="sidebar-item box-content">
<h3 class="widget-title">Qualifiers</h3>
  <img src="<?php bloginfo('template_url'); ?>/images/qualifier-canopy-tour.jpg"  alt="Degree of Difficulty" />
   </div><!-- sidebarvideo  -->
   
   </div><!-- sidebar -->
    
</div><!-- #wrap -->
<?php get_footer('page'); ?>