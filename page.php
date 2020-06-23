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

<?php 
      if( is_page('about') ) {
        // Add some id for the anchor below
        $theID = "about";
       ?>
       <div class="footericons">
        <div class="footicon">
          <a href="https://stories.usnwc.org/stories/" target="_blank">
            <div class="icon stories">
                    <img class="size-small >" src="<?php bloginfo('template_url'); ?>/images/stories.png"/>
                  <header>
                  <h2>Stories</h2>
                </header>
            </div>
          </a>
        </div>
        <div class="footicon">
          <a href="https://stories.usnwc.org/films/" target="_blank">
            <div class="icon films">
                    <img class="size-small >" src="<?php bloginfo('template_url'); ?>/images/films.png"/>
                  <header>
                  <h2>Films</h2>
                </header>
            </div>
          </a>
        </div>
        <div class="footicon">
          <a href="#about">
            <div class="icon about">
                    <img class="size-small >" src="<?php bloginfo('template_url'); ?>/images/about.png"/>
                  <header>
                  <h2>About</h2>
                </header>
            </div>
          </a>
        </div>
        <div class="footicon">
          <a href="<?php bloginfo('url'); ?>/about/#mission">
            <div class="icon ">
                    <img class="size-small mission>" src="<?php bloginfo('template_url'); ?>/images/mission.png"/>
                  <header>
                  <h2>Mission</h2>
                </header>
            </div>
          </a>
        </div>
      </div>
      <?php } else {
        // else sanitise the title with dashes
        $theID = sanitize_title_with_dashes( get_the_title() );
      }

      ?>

	<article class="post <?php echo $post->post_name; ?>">
    <div id="<?php echo $theID; ?>" class="headanchor"></div>
	  	<header>
    	   	<h1>
            <?php the_title(); ?>
          </h1>
  		</header>
    	<?php 

      // summer camp forms
      if( is_page('summer-camp-forms') ) {get_template_part('camp-forms');}

      the_content(); 

      ?>

      

      

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