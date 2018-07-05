 <?php
/*
 * Template Name: Daily Activity Schedule Page
*/
get_header('page'); ?>

<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->

<div id="grid">


<div class="category-banners">
    <?php if (is_page('new-pass-grid')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '1747' ); ?>
      <?php } elseif (is_page('activity-schedule')) { ?>
<?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '2261' );  ?>
  <?php } ?>


</div>

<div id="page">
        <div class="box-content post">
        
        <h1 class="widget-title"><?php the_title(); ?></h1>
        
        <div class="page-entry">
        
<?php 	
		$pass_hours = get_field("pass_hours"); 
		$water_times = get_field("water_times");
?>
		
<?php $this_page_id=$wp_query->post->ID; ?>

 <!-- Rewind and Reset -->
<?php  wp_reset_query(); // Reset Query  ?> 
<?php rewind_posts(); ?>


<?php 
/* Let's query some posts first... */
query_posts(array(
'showposts' => 40, // how many pages to show
'post_parent__in' => array( 81, 77, 79, 75, 69), // parent page
'post_type' => 'page',  // this is a page not a post
'meta_key' => 'area',
'orderby' => 'meta_value', /// order by this order.
'post__not_in' => array( 164, 166, 107, 294 ),
'order' => 'ASC')); /// Reverse that order menu order to correct top down

/* Say hello to the Loop... */
if ( have_posts() ) : 





/* Anything placed in #sort is positioned by jQuery Masonry */ ?>

<div style="text-align:center;"><h2>Availability Schedule for <?php echo date("l, F j"); ?></h2>
<h4>Schedule subject to change</h4>
<h4>Walk-up activities may close lines prior to pass hours</h4>
<h4>Pass Hours: <?php echo $pass_hours; ?>, Water Times: <?php echo $water_times; ?></h4>
<!-- <h4><img src="/wp-content/uploads/2014/11/open_indicator.png" /> Activity Currently Available</h4>	
<h4><img src="/wp-content/uploads/2014/11/closed_indicator.png" /> Activity Currently Unavailable</h4> --!>

<div class="activity-grid">
<table>    

<!-- time of day row -->
<tr>
<td></td>
<?php $hour=8; ?>
<?php for ($i=0; $i<=26; $i++) { ?>
 		 
 		 <?php $hour = $hour%12; ?>
 		 
 		 <?php if($hour == 0) { 
 		 
 		 $hour = 12;
 		 
 		 } ?>
 		 
 		 
 		 <?php
 		  
 		 if($i%2 == 0) :
 		 $time = (string) $hour; 
 		 $hour = $hour+1;
 		  		 
 		 else :
 		 list($time, $mins) = explode(":", $time);
 		 $time = (string) $hour;
 		 
 		 endif; ?>
 		 
 		 <?php if($i < 26/4) :
 		 $desig = "am";
 		 
 		 else :
 		 $desig = "pm";
 		 
 		 endif; ?>	
 		
 		
 		<td colspan="2">
 			
 		 
 		<div><?php echo $time.$desig ?></div>

 		 </td>
 		 	 
 		 
	<?php } ?>	

</tr> 

 <!-- end time of day row -->	


<!-- blank row -->

<tr>
<td></td>
<?php $hour=8; ?>
<?php for ($i=0; $i<=52; $i++) { ?>
 		 
 		 <?php 
 		 if($i%4 == 0) :
 		 $time = (string) $hour; 
 		 $hour = $hour+1;
 		  		 
 		 else :
 		 list($time, $mins) = explode(":", $time);
 		 $time = (string) $hour;
 		 
 		 endif; ?>
 		 
 		
 		<td>

 		 </td>
	 
 		 
	<?php } ?>	

</tr> 

<!-- end blank row -->
    
    <?php while ( have_posts() ) : the_post(); 
    	
    	global $my_size, $force_feat_img, $embed_code, $vid_url;
    	
        // Gather custom fields
        //$embed_code = get_post_meta($post->ID, 'soy_vid', true);
        //$vid_url = get_post_meta($post->ID, 'soy_vid_url', true);
        $force_feat_img = get_post_meta($post->ID, 'soy_hide_vid', true);
        $show_title = get_post_meta($post->ID, 'soy_show_title', true);
        $show_desc = get_post_meta($post->ID, 'soy_show_desc', true);
        $box_size = get_post_meta($post->ID, 'soy_box_size', true); 
		$date = date('l, h:ia', time());
        
        if( $box_size == 'Medium (485px)' ){
            $my_size = 'col3';
            $embed_size = '495';
        } else if( $box_size == 'Large (660px)' ){
            $my_size = 'col4';
            $embed_size = '670';
        } else if( $box_size == 'Tiny (135px)' ){
            $my_size = 'col1';
            $embed_size = '145';
        }else{
            $my_size = 'col2';
            $embed_size = '320';
        }
        
        /* Check whether content is being displayed
         * This determines whether a border should be applied
         * above the postmeta section
        */
        if($show_title != 'No'){
            $content_class = 'has-content';
        } else if($show_desc != 'No' && $post->post_content){
            $content_class = 'has-content';
        }else {
            $content_class = 'no-content';
        }
        
        // Assign categories as class names to enable filtering
        $category_classes = '';
        
        foreach( ( get_the_category() ) as $category ) {
            $category_classes .= $category->category_nicename . ' ';
        } 
    ?>
    
    
    <?php $upgrade=get_post_meta($post->ID, "upgrade", $single = true); ?>

    
  <tr>
  
  <td>
            	

	           		<?php the_title(); ?>
	           		<div style="display:none;"><?php echo get_field("area"); ?></div>
	           		
	           		<?php edit_post_link(__('Edit', 'shaken')); ?>
	           		</td>
	           		
  	           		<td style="border-left:0px;">
	           		
	           		
	           		 <?php if( date('D', time()) == 'Mon') : ?>
	<div style="display:none;"><?php echo get_field("monday"); ?></div>
	<?php if ( 11351 == $post->post_parent ) :
		list($open, $close) = explode("-", get_field("monday", 11351));
	else :
		list($open, $close) = explode("-", get_field("monday")); 
	endif; ?>
		<div class="open" style="display:none;"><?php echo str_replace(' ', '', $open) ?></div>
		<div class="close" style="display:none;"><?php echo str_replace(' ', '', $close) ?></div>
	

<?php elseif( date('D', time()) == 'Tue') : ?>
	<div style="display:none;"><?php echo get_field("tuesday"); ?></div>
	<?php if ( 11351 == $post->post_parent ) :
		list($open, $close) = explode("-", get_field("tuesday", 11351));
	else :
		list($open, $close) = explode("-", get_field("tuesday")); 
	endif; ?>
		<div class="open" style="display:none;"><?php echo str_replace(' ', '', $open) ?></div>
		<div class="close" style="display:none;"><?php echo str_replace(' ', '', $close) ?></div>
		
<?php elseif( date('D', time()) == 'Wed') : ?>
	<div style="display:none;"><?php echo get_field("wednesday"); ?></div>
	<?php if ( 11351 == $post->post_parent ) :
		list($open, $close) = explode("-", get_field("wednesday", 11351));
	else :
		list($open, $close) = explode("-", get_field("wednesday")); 
	endif; ?>
		<div class="open" style="display:none;"><?php echo str_replace(' ', '', $open) ?></div>
		<div class="close" style="display:none;"><?php echo str_replace(' ', '', $close) ?></div>
		
<?php elseif( date('D', time()) == 'Thu') : ?>
	<div style="display:none;"><?php echo get_field("thursday"); ?></div>
	<?php if ( 11351 == $post->post_parent ) :
		list($open, $close) = explode("-", get_field("thursday", 11351));
	else :
		list($open, $close) = explode("-", get_field("thursday")); 
	endif; ?>
		<div class="open" style="display:none;"><?php echo str_replace(' ', '', $open) ?></div>
		<div class="close" style="display:none;"><?php echo str_replace(' ', '', $close) ?></div>
		
<?php elseif( date('D', time()) == 'Fri') : ?>
	<div style="display:none;"><?php echo get_field("friday"); ?></div>
	<?php if ( 11351 == $post->post_parent ) :
		list($open, $close) = explode("-", get_field("friday", 11351));
	else :
		list($open, $close) = explode("-", get_field("friday")); 
	endif; ?>
		<div class="open" style="display:none;"><?php echo str_replace(' ', '', $open) ?></div>
		<div class="close" style="display:none;"><?php echo str_replace(' ', '', $close) ?></div>
		
<?php elseif( date('D', time()) == 'Sat') : ?>
	<div style="display:none;"><?php echo get_field("satuday"); ?></div>
	<?php if ( 11351 == $post->post_parent ) :
		list($open, $close) = explode("-", get_field("satuday", 11351));
	else :
		list($open, $close) = explode("-", get_field("satuday")); 
	endif; ?>
		<div class="open" style="display:none;"><?php echo str_replace(' ', '', $open) ?></div>
		<div class="close" style="display:none;"><?php echo str_replace(' ', '', $close) ?></div>
		
<?php elseif( date('D', time()) == 'Sun') : ?>
	<div style="display:none;"><?php echo get_field("sunday"); ?></div>
	<?php if ( 11351 == $post->post_parent ) :
		list($open, $close) = explode("-", get_field("sunday", 11351));
	else :
		list($open, $close) = explode("-", get_field("sunday")); 
	endif; ?>
		<?php $open = str_replace(' ', '', $open) ?>
		<div class="open" style="display:none;"><?php echo $open ?></div>
		<?php $close = str_replace(' ', '', $close) ?>
		<div class="close" style="display:none;"><?php echo $close ?></div>
			
<?php endif; ?>

<?php $isclosed = get_field("closed"); ?>

<?php if( time() > strtotime($open) && time() < strtotime($close) && $isclosed == "no" ) : ?>
	
	<span class="activity-hours" style="display:none;"><img src="/wp-content/uploads/2014/11/open_indicator.png" /></span>
	
	<?php else : ?>
	
	<span class="activity-hours" style="display:none;"><img src="/wp-content/uploads/2014/11/closed_indicator.png" /></span>
	
	<?php endif; ?>        
	           		
	<br />
	           		

</td>

  
<?php if( date('D', time()) == 'Mon') { ?>
	<div style="display:none;"><?php echo get_field("monday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("monday")); ?>
	<?php $open = str_replace(' ', '', $open) ?>
	<div class="open" style="display:none;"><?php echo $open ?></div>
	<?php $close = str_replace(' ', '', $close) ?>
	<div class="close" style="display:none;"><?php echo $close ?></div>						
<?php } ?>   

<?php if( date('D', time()) == 'Tue') { ?>
	<div style="display:none;"><?php echo get_field("tuesday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("tuesday")); ?>
	<?php $open = str_replace(' ', '', $open) ?>
	<div class="open" style="display:none;"><?php echo $open ?></div>
	<?php $close = str_replace(' ', '', $close) ?>
	<div class="close" style="display:none;"><?php echo $close ?></div>						
<?php } ?>   

<?php if( date('D', time()) == 'Wed') { ?>
	<div style="display:none;"><?php echo get_field("wednesday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("wednesday")); ?>
	<?php $open = str_replace(' ', '', $open) ?>
	<div class="open" style="display:none;"><?php echo $open ?></div>
	<?php $close = str_replace(' ', '', $close) ?>
	<div class="close" style="display:none;"><?php echo $close ?></div>						
<?php } ?>  

<?php if( date('D', time()) == 'Thu') { ?>
	<div style="display:none;"><?php echo get_field("thursday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("thursday")); ?>
	<?php $open = str_replace(' ', '', $open) ?>
	<div class="open" style="display:none;"><?php echo $open ?></div>
	<?php $close = str_replace(' ', '', $close) ?>
	<div class="close" style="display:none;"><?php echo $close ?></div>						
<?php } ?>   

<?php if( date('D', time()) == 'Fri') { ?>
	<div style="display:none;"><?php echo get_field("friday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("friday")); ?>
	<?php $open = str_replace(' ', '', $open) ?>
	<div class="open" style="display:none;"><?php echo $open ?></div>
	<?php $close = str_replace(' ', '', $close) ?>
	<div class="close" style="display:none;"><?php echo $close ?></div>						
<?php } ?>   

<?php if( date('D', time()) == 'Sat') { ?>
	<div style="display:none;"><?php echo get_field("saturday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("saturday")); ?>
	<?php $open = str_replace(' ', '', $open) ?>
	<div class="open" style="display:none;"><?php echo $open ?></div>
	<?php $close = str_replace(' ', '', $close) ?>
	<div class="close" style="display:none;"><?php echo $close ?></div>						
<?php } ?>   

<?php if( date('D', time()) == 'Sun') { ?>
	<div style="display:none;"><?php echo get_field("sunday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("sunday")); ?>
	<?php $open = str_replace(' ', '', $open) ?>
	<div class="open" style="display:none;"><?php echo $open ?></div>
	<?php $close = str_replace(' ', '', $close) ?>
	<div class="close" style="display:none;"><?php echo $close ?></div>						
<?php } ?>   

<?php $hour=9; ?>
<?php for ($i=0; $i<=52; $i++) { ?>
 		 
 		 <?php 
 		 if($i%4 == 1) :
 		 $time = (string) $hour . ":15"; 
 		  
 		 elseif ($i%4 == 2) :
 		 $time = (string) $hour . ":30";
 		 
 		 elseif ($i%4 == 3) :
 		 $time = (string) $hour . ":45";
 		 $hour = $hour+1; 
 		 
 		 else :
 		 list($time, $mins) = explode(":", $time);
 		 $time = (string) $hour . ":00";
 		 
 		 endif; ?>
 		 
 		 <?php if ( (strtotime($open) <= strtotime($time)) && (strtotime($close) > strtotime($time)) && ($open != 0) ) : ?> 
 		  	
 		 	<td style="background-color:green;">
 		 	<?php echo " "; ?>
 		 	
 		 <?php else : ?>
 		 	<td>
 		    <?php echo " "; ?>
 		 <?php endif; ?>
 		  		 
 		 
 		 </td>
 		 
 		 
 		 
	<?php } ?>	

		<td>
			<?php  
				if ($open || $close) {
					echo $open." - ".$close;
				}
				else {
					echo "Closed";
				}
			
			?>
		</td>

</tr>    	    

                
                <?php //if( has_post_format( 'gallery' ) ) get_template_part( 'includes/gallery-list' ); ?>
                	    

    
    
    
    <?php endwhile; endif; ?>

</table> <!-- walk up table -->    

</div>

<div class="activity-grid-bottom">
    
<table><!-- time slot table -->

<?php $closed = get_field("closed", 67); ?>

<?php if( $closed == "no") : ?>

 <!-- Rewind and Reset -->
<?php  wp_reset_query(); // Reset Query  ?> 
<?php rewind_posts(); ?>


<?php 
/* Let's query some posts first... */
query_posts(array(
'showposts' => 40, // how many pages to show
'post_parent' => 67, // parent page
'post_type' => 'page',  // this is a page not a post
'post__not_in' => array(191,189), //not WW SUP or WW kayaking
'orderby' => 'menu_order', /// order by this order.
'order' => 'ASC')); /// Reverse that order menu order to correct top down

/* Say hello to the Loop... */
if ( have_posts() ) : 

/* Anything placed in #sort is positioned by jQuery Masonry */ ?>
    
    <?php while ( have_posts() ) : the_post(); 
    	
    	global $my_size, $force_feat_img, $embed_code, $vid_url;
    	
        // Gather custom fields
        //$embed_code = get_post_meta($post->ID, 'soy_vid', true);
        //$vid_url = get_post_meta($post->ID, 'soy_vid_url', true);
        $force_feat_img = get_post_meta($post->ID, 'soy_hide_vid', true);
        $show_title = get_post_meta($post->ID, 'soy_show_title', true);
        $show_desc = get_post_meta($post->ID, 'soy_show_desc', true);
        $box_size = get_post_meta($post->ID, 'soy_box_size', true); 
		$date = date('l, h:ia', time());
        
        if( $box_size == 'Medium (485px)' ){
            $my_size = 'col3';
            $embed_size = '495';
        } else if( $box_size == 'Large (660px)' ){
            $my_size = 'col4';
            $embed_size = '670';
        } else if( $box_size == 'Tiny (135px)' ){
            $my_size = 'col1';
            $embed_size = '145';
        }else{
            $my_size = 'col2';
            $embed_size = '320';
        }
        
        /* Check whether content is being displayed
         * This determines whether a border should be applied
         * above the postmeta section
        */
        if($show_title != 'No'){
            $content_class = 'has-content';
        } else if($show_desc != 'No' && $post->post_content){
            $content_class = 'has-content';
        }else {
            $content_class = 'no-content';
        }
        
        // Assign categories as class names to enable filtering
        $category_classes = '';
        
        foreach( ( get_the_category() ) as $category ) {
            $category_classes .= $category->category_nicename . ' ';
        } 
    ?>
    
    
    <?php $upgrade=get_post_meta($post->ID, "upgrade", $single = true); ?>

    
  <tr>
    <td>
            	

	           		<?php the_title(); ?>
				<br />
<?php edit_post_link(__('Edit', 'shaken')); ?>

<div style="display:none;"><?php echo $date; ?></div>

</td>
<td>
<?php if( date('D', time()) == 'Mon') : ?>
	<div style="display:none;"><?php echo get_field("monday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("monday", 67)); ?>
	<?php 
	$open = str_replace(' ', '', $open);
	echo "First trip ";
	echo $open;
	$close = str_replace(' ', '', $close);
	echo " : Last trip ";
	echo $close;
	 ?>
			
<?php elseif( date('D', time()) == 'Tue') : ?>
	<div style="display:none;"><?php echo get_field("tuesday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("tuesday", 67)); ?>
	<?php 
	$open = str_replace(' ', '', $open);
	echo "First trip ";
	echo $open;
	$close = str_replace(' ', '', $close);
	echo " : Last trip ";
	echo $close;
	 ?>
	 
<?php elseif( date('D', time()) == 'Wed') : ?>
	<div style="display:none;"><?php echo get_field("wednesday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("wednesday", 67)); ?>
	<?php 
	$open = str_replace(' ', '', $open);
	echo "First trip ";
	echo $open;
	$close = str_replace(' ', '', $close);
	echo " : Last trip ";
	echo $close;
	 ?>
			
<?php elseif( date('D', time()) == 'Thu') : ?>
	<div style="display:none;"><?php echo get_field("thursday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("thursday", 67)); ?>
	<?php 
	$open = str_replace(' ', '', $open);
	echo "First trip ";
	echo $open;
	$close = str_replace(' ', '', $close);
	echo " : Last trip ";
	echo $close;
	 ?>
			
<?php elseif( date('D', time()) == 'Fri') : ?>
	<div style="display:none;"><?php echo get_field("friday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("friday", 67)); ?>
	<?php 
	$open = str_replace(' ', '', $open);
	echo "First trip ";
	echo $open;
	$close = str_replace(' ', '', $close);
	echo " : Last trip ";
	echo $close;
	 ?>
			
<?php elseif( date('D', time()) == 'Sat') : ?>
	<div style="display:none;"><?php echo get_field("saturday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("saturday", 67)); ?>
	<?php 
	$open = str_replace(' ', '', $open);
	echo "First trip ";
	echo $open;
	$close = str_replace(' ', '', $close);
	echo " : Last trip ";
	echo $close;
	 ?>
			
<?php elseif( date('D', time()) == 'Sun') : ?>
	<div style="display:none;"><?php echo get_field("sunday"); ?></div>
	<?php list($open, $close) = explode("-", get_field("sunday", 67)); ?>
	<?php 
	$open = str_replace(' ', '', $open);
	echo "First trip ";
	echo $open;
	$close = str_replace(' ', '', $close);
	echo " : Last trip ";
	echo $close;
	 ?>			
					
<?php endif; ?>


</td>

</tr>
                
                <?php //if( has_post_format( 'gallery' ) ) get_template_part( 'includes/gallery-list' ); ?>
                	        
    <?php endwhile; endif; ?>
<?php endif; ?>

<tr><td colspan="2"><h2>Whitewater rafting resumes March 2015</h2></td></tr>

</table><!-- time slot table -->    </div>


    
    </div><!-- page entry -->



<?php if( is_user_logged_in() ) { ?>
<div id="editor"></div>
<button id="cmd">generate PDF</button>

<?php } ?>



    
    </div><!-- box content -->
    </div><!-- #page -->
    
</div><!-- #sort -->



  </div><!-- grid -->
    
<script type="text/javascript">

response_html = response_html.replace(/td>\s+<td/g,'td><td');
$('#table').html(response_html);

</script>


<?php get_footer('page'); ?>