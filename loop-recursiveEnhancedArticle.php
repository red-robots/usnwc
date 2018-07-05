<?php 
/*
 * @author: Fritz Healy
 * NOTE: Working from existing templates
 *
 * This page sets up a function to recursively gather all the child tiles of a parent
 * and display the content of the child pages if set and no tiles to display
 *
 * NOTE: While this function is all inclusive and should be used for all practical purposes
 * For example, there is a roughly 7% on whitewater race series page gain in page speed by using the function in loop-recursive.php 
 * NOTE: This function hides sub-page headers with no content or tiles in them while 
 * loop-recursive does not. 
 */

/*
 * This function searches all the child pages of a specified post
 * If the child has a video/image/gallery set then it is displayed
 * Otherwise the function calls itself with the child ID supplied as the parent ID
 * This sets up a recursive feature that will display all children and grand children, etc.
 * of the original parent until there are no more children to query or all children have
 * an image to display.
 * The function also displays headings of the parent tile and displays all the child tiles
 * that have a image, etc. set under that heading together/first instead of looping through the 
 * childs children 
 * The function also displays the content of the page if the content of the page is set, 
 * displayed under the page heading.
 * The $args value is passed from the template as the argument used for the query
 * NOTE: Although this function can be used in place of loop-tile, it is fairly 
 * computationally intensive since it has twice the number of wordpress loops as loop-tile,
 * and it uses recursion, thus loop-tile should be used if speed is a necessity.
 * NOTE: This function sets a header for any page without a featured image.
 * This assumes that it 1) has children, and 2) should be used as a header (aka. doesn't 
 * have all non-set-featured-image children, with the intention of not using this page as
 * a label). If the designer doesn't want to display a header for any page with 
 * non-feature-image-set children then a check of the children tiles must be performed 
 * prior to setting the header in the third loop, maybe with a modification of the first
 * loop as a function to return true if child featured images are set. 
 * This is unnecessary for the usnwc's current purposes, so has not been implemented.
 * NOTE: This function might receive a performance increase if the display loop was 
 * eliminated by assigning all the needed meta and post variables to arrays/objects and then displayed the posts by looping
 * through those arrays/objects. This was not implemented due to the fact that 
 * it was needlessly complex, still required a looping feature, and created another 
 * potentially very large set of arrays/object which might be slower to access than a 
 * WP_Query, and the arrays/object might take up a lot of memory.
 */
function display_loop_tile_recursive_enhanced_article($args){
	global $post; //have to include the post in order to be able to query the values set from WP_Query
	//declare variables as null in case register_globals ever gets turned on
	$list_to_query = null; $list_to_display = null;
	//set up the loop
	$query=new WP_Query($args);
	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();
			/*
		 	 * Get the page options using get_post_meta and get_field
		   	 */
        	$embed_code = get_post_meta($query->post->ID, 'soy_vid', true);
            $vid_url = get_post_meta($query->post->ID, 'soy_vid_url', true);
          	$force_feat_img = get_post_meta($query->post->ID, 'soy_hide_vid', true);
			/*
  	       	 * This if and else add the current post values to a series of lists based on
  	       	 * whether or not the post has a image/video/etc. to display
         	 */
        	if($embed_code||$vid_url||(has_post_format('gallery')&&!$_force_feat_img)||has_post_thumbnail()){
        		$list_to_display[]=$query->post->ID;
        	} 
        	else {
        		$list_to_query[]=$query->post->ID;
        	}
		} //end of while
	} // end of if have posts
	wp_reset_postdata();
	/*
	 * Display the title if there are tiles to show or there is content
	 * Display only title if no content and there are tiles
	 */
	$query=new WP_Query(array('page_id'=>$args['post_parent']));
	if($query->have_posts()){
		$query->the_post();
		if($list_to_display||$query->post->post_content){ ?>
			<a name="<?php echo $query->post->post_name;?>"></a>
			<header class="post"><h1><?php echo the_title(); ?></h1></header>
			<?php if($query->post->post_content){ ?>
					<section class="post <?php echo $query->post->post_name; ?>">
						<?php echo $query->post->post_content; ?>
					</section>
			<?php }
		}
	}
	wp_reset_postdata();
	/*
	 * If there are posts to display display all of them at once instead of searching their 
	 * children first 
	 * NOTE: This code is identical to loop-tile.php but is included here on it's own 
	 * without a call to get_template_part to make this template independent of changes to
	 * loop-tile in the future. 
	 */
	if($list_to_display){
		//set up the loop
		$query=new WP_Query(array('post__in'=>$list_to_display,'post_type'=>'page','order'=>'ASC','posts_per_page'=>'-1'));
		if($query->have_posts()){
			//create a tile container for all tiles?>
			<section class="post container <?php 
				if($args['post_type']&&$args['post_type']==='page'){
					echo strtolower(preg_replace("/\s+/","-",preg_replace("/&#[0-9]+;/"
					,"",get_the_title($args['post_parent']))));
				}
				elseif($args['post_type']&&$args['post_type']==='post'){
					if($args['cat']){
						for($i=0;$i<count($args['cat']);$i++){
							echo " ".strtolower(preg_replace("/\s+/","-",preg_replace("/&#[0-9]+;/"
							,"",get_the_category_by_ID($args['cat'][$i]))));
						}
					}
				}
			?>">
			<?php 
   	 	  	/*
   	   		 * Have to get creatives before the loop because it's a page level field not a 
   	   		 * post level field otherwise the value would be based on each tile not the page
   	   		 * itself
   	   		 */
			if ("yes"===get_field('creatives')[0]) { 		//if creatives
				$creative = true;						//set creatives to true
			}	 
			else $creative = false;
			//The Loop
			while($query->have_posts()){
				$query->the_post();
				$exclude = get_field('exclude');
				if($exclude && strcmp($exclude,"yes")===0){
				    continue;
                }
				/*
				 * Get the video code if any
				 */
   	   			$video=get_field('video'); 
       			/*
    			 * Create a loop to get all the category names 
   				 */
   				$category_classes = '';
   				foreach((get_the_category()) as $category){
   					$category_classes .= $category->category_nicename . ' '; 
   				} 
   				/* 
   				 * The article will contain all of the content of the queried post
   				 * Assign category names and post name to article class
   				 */
   				?>
				<a name="<?php echo $query->post->post_name;?>"></a>
   				<article class="row <?php echo $category_classes.$query->post->post_name;?>">
 	  				<?php 
 	  				/*
 	  				 * Display the video or post_thumbnail featured image (if any)
 	  				 */
   					if(has_post_thumbnail()){ 
   						$img_url=str_replace(home_url(),"",wp_get_attachment_image_src(get_post_thumbnail_id($query->post->ID),array(200,268))[0]);
   						/*
   						Commenting and if($img_url) to remove video from thumbnails
   						Remove the commenting and the following if($img_url) if you want video with shown thumbnails
   						if($video){ ?>
							<figure class="video" style="background-image:url(<?php echo $img_url;?>)">
								<a href="<?php echo $video; ?>" rel="video">
									<img src="/wp-content/uploads/2014/11/play_button_smaller.png">
								</a> 
							</figure>  
   						<?php }
   						else */
   						
   						if($img_url){
                            if ( in_array( 'yes', get_field('event_complete') ) ) { ?>
                                <figure class="featured_image hoverable" style="background-image:url(<?php echo $img_url;?>);">
                                    <img src="/wp-content/uploads/2016/12/EventComplete.png" alt="Event Complete">
                                </figure>
                            <?php } elseif ( in_array( 'yes', get_field('sold_out') ) ) { ?>
                                <figure class="featured_image hoverable" style="background-image:url(<?php echo $img_url;?>);">
                                    <img src="<?php echo get_template_directory_uri()."/images/Sold_Out_Tile.png";?>" alt="Sold Out Tile">
                                </figure>
                            <?php } else {?> 
                                <figure class="featured_image">
                                    <img src="<?php echo $img_url;?>">
                                </figure>
                            <?php } 
   						}
   					} 
   					/*
   					 * Display the title of the post and the content
   					 */
   					?>
   					<section class="copy">
	   					<header>
   							<h2><?php the_title(); ?></h2>
   						</header>
   						<?php the_content();
   						/*
   						 * Get all of the fields for pass type and qualifiers and difficulty
	   					 * to variables
   						 */
  	 					$asp=in_array( 'asp', get_field('passes') );
						$csp=in_array( 'csp', get_field('passes') );
						$qsp=in_array( 'qsp', get_field('passes') ) ;
						$ctp=in_array( 'canopy', get_field('passes') );
						$quals = get_field( "qualifiers" );
						$beg = in_array( 'beginner', get_field('difficulty') );
						$int = in_array( 'intermediate', get_field('difficulty') );
						$adv = in_array( 'advanced', get_field('difficulty') );	 
	        			/*
	        			 * If any of the pass data variables are set display the pass images
	        			 * based on which items are set in this post
	    	    		 */
		        		if ( $asp || $csp || $qsp || $ctp ) { ?>
							<div class="passes">		
								<span>Available <br>With:</span>
								<div class="checks">
									<?php if( $asp ){ ?>
										<a href="/activity-passes"><img src="/wp-content/uploads/2014/11/AllSport.png" /></a>
									<?php } else { ?>
      									<img src="/wp-content/uploads/2014/11/AllSport_gray.png" />
 									<?php } ?> 
									<?php if( $csp ){ ?>
										<a href="/activity-passes"><img src="/wp-content/uploads/2014/11/CoolSport.png" /></a>
									<?php } else { ?>
							    		<img src="/wp-content/uploads/2014/11/CoolSport_Gray.png" />
									<?php } ?> 
									<?php if( $qsp ){ ?>
										<a href="/activity-passes" /><img src="/wp-content/uploads/2014/11/QuickSport.png" /></a>
									<?php } else { ?>
										<img src="/wp-content/uploads/2014/11/QuickSport_Gray.png" />
									<?php } ?> 					
									<?php if( $ctp ) { ?>
										<a href="/activity-passes" /><img src="/wp-content/uploads/2014/11/Canopy-Tour.png" /></a>
									<?php } ?> 
								</div>
							</div>
						<?php }
						/*
						 * If any of the qualifier or difficulty data variables are set 
						 * display the qualifiers and difficulty based on which are set in 
						 * this post
						 */
						if($quals||$beg||$int||$adv){ ?>
							<div class="qualifiers difficulty container">
								<?php if($quals) { ?>
									<div class="qualifiers">
										<span class="title">Qualifiers:</span> 
										<p><?php echo $quals; ?></p>
									</div>
								<?php } ?>		
								<?php if ( $beg || $int || $adv ) { ?>	
									<div class="difficulty">
										<span>Difficulty:</span>
										<div>
											<?php if( $beg ) { ?>
												 <img src="/wp-content/uploads/2014/11/Easy2.png" /> <span>Beginner</span> <br />
											<?php }
											if( $int ) { ?>
							 					<img src="/wp-content/uploads/2014/11/medium2.png" /> <span>Intermediate</span> <br />
											<?php } 
											if( $adv ) { ?>
												<img src="/wp-content/uploads/2014/11/Advanced2.png" /> <span>Advanced</span> 
											<?php } ?>
										</div>
									</div>
								<?php }?>
							</div> 
						<?php }
						//display the option to edit the post if logged in?>
						<?php edit_post_link(__('Edit this post', 'shaken')); ?>
					</section>
   				</article>
   			<?php } //end of while 
   			//end of tile container ?>
       		</section>
   		<?php } //end of if have posts
   		wp_reset_postdata();
   	} //end of if list to display
   	/*
   	 * First, check to see if there are posts to query
   	 * if so loop through and call self for every post to query as a parent
   	 * evenutally this loop won't run once there it reaches a post which is not itself 
   	 * a parent 
   	 */
   	if($list_to_query){
	   	for($i=0;$i<count($list_to_query);$i++){
   			display_loop_tile_recursive_enhanced_article(array('post_parent'=>$list_to_query[$i],'post_type'=>'page','order'=>'ASC','posts_per_page'=>'-1'));
   		} // end of for loop
   	} //end of list to query
} //end of function display loop recursive
?>