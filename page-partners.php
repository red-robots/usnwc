 <?php
/*
 *Template Name: Partners
*/
get_header('page'); ?>

<div class="wrap">    
    <div id="page">
        <div class="box-content post">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
			<?php if ( has_post_thumbnail() ){ 
                the_post_thumbnail('col4', array( 'class' => 'feat-img' ) );
            } ?>
            
            <div class="page-entry">
            	<h1 class="page-title"><?php the_title(); ?></h1>
                
				<?php the_content(); ?>
                
                
                
                
                <?php // Parks and Rec
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-parkandrec.jpg" />
                </div>
                <div class="partner-description">
                <h4>Mecklenburg County Park and Recreation</h4>
                <a href="http://www.charmeck.org/Departments/Park+and+Rec/Home.htm">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // SMC
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-cmc.jpg" />
                </div>
                <div class="partner-description">
                <h4>Carolinas Medical Center</h4>
                <a href="http://www.carolinasmedicalcenter.org/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // Subaru
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-subaru.jpg" />
                </div>
                <div class="partner-description">
                <h4>Subaru</h4>
                <a href="http://www.subaru.com/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // Suddath
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-suddath.jpg" />
                </div>
                <div class="partner-description">
                <h4>Suddath</h4>
                <a href="http://www.suddathcharlotte.com/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // Blue Max 
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-bluemax.jpg" />
                </div>
                <div class="partner-description">
                <h4>Blue Max</h4>
                <a href="http://bluemaxmaterials.com/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // Cocal Coala
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-coke.jpg" />
                </div>
                <div class="partner-description">
                <h4>Coca Cola</h4>
                <a href="http://www.mycokerewards.com/home.do">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // smith optics
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-smithoptics.jpg" />
                </div>
                <div class="partner-description">
                <h4>Smith Optics</h4>
                <a href="http://www.smithoptics.com/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // REI
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-rei.jpg" />
                </div>
                <div class="partner-description">
                <h4>REI</h4>
                <a href="http://www.rei.com/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // Fairfiled
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/fairfield.jpg" />
                </div>
                <div class="partner-description">
                <h4>Fairfield Inn Northlake</h4>
                <a href="http://www.marriott.com/hotels/travel/clthb-fairfield-inn-charlotte-northlake/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // southpark
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-southpark.jpg" />
                </div>
                <div class="partner-description">
                <h4>South Park Cycles</h4>
                <a href="http://www.southparkcycles.com/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
                <?php // USACK
				
				?>
                <div class="partner-logo">
                <img src="<?php bloginfo('template_url'); ?>/images/partner-usack.jpg" />
                </div>
                <div class="partner-description">
                <h4>USACK</h4>
                <a href="http://www.usack.org/">Visit Online</a>
                </div>
                <div class="partner-clear"></div>
                
               
                
                
                
                
            </div><!-- #page-entry -->
           
                
            <?php endwhile; endif; ?>
        </div>
        
	</div><!-- #page -->
    
    <?php get_sidebar(); ?>
    
</div><!-- #wrap -->
<?php get_footer('page'); ?>