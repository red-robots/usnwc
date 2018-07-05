<?php 
/*
 * @author: Fritz Healy
 * NOTE: Working from existing templates
 *
 * This page sets up a function to recursively gather all the child tiles of a parent
 * and display the content of the child pages if set. 
 * 
 * For all practical purposes this function should not be replaced by the function found 
 * in the file loop-recursiveEnhanced.php. The point being that function requires no added
 * markup of the template to display the top level header if there is content, so it is 
 * enhanced aka. all inclusive. For example, there is a ~7% decrease in page speed on the 
 * whitewater race series page for using the 
 * enhanced version, thus this file was left for times when peak performance is required. 
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
 * The function also displays the content of the child page if the content of the page is set,
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
 * NOTE: unlike the enhanced version this function does not exculde headers for sub-pages 
 * with no children. 
 */
function display_loop_tile_recursive($args){
	global $post; //have to include the post in order to be able to query the values set from WP_Query
	//declare variables as null in case register_globals ever gets turned on
	$list_to_query = null; $list_to_query_titles = null; $list_content = null;
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
        		$list_to_query_titles[]=the_title("","",false);
        		$list_content[]=$query->post->post_content;
        	}
		} //end of while
	} // end of if have posts
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
			<div class="tile container <?php 
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
				/*
			 	 * Get all of the page options using get_post_meta and get_field
			   	 */
    	    	$embed_code = get_post_meta($query->post->ID, 'soy_vid', true);
    	    	$vid_url = get_post_meta($query->post->ID, 'soy_vid_url', true);
   	 	    	$force_feat_img = get_post_meta($query->post->ID, 'soy_hide_vid', true);
     	   		$show_title = get_post_meta($query->post->ID, 'soy_show_title', true);
     	   		$show_desc = get_post_meta($query->post->ID, 'soy_show_desc', true);
     	   		$box_size = get_field('box_size');
     	   		$date = get_field('date');
				/*
				 * Set the embed size for videos and the size for featured images using the
				 * box size gathered from the page
				 */
		        if(strcmp($box_size,'medium')===0){
   			        $my_size = 'size-Medium';
       			    $embed_size = '495';
	        	} else if(strcmp($box_size,'large')===0){
    		        $my_size = 'size-Large';
   	    		    $embed_size = '670';
    		    } else if(strcmp($box_size,'tiny')===0){
 	  	    	    $my_size = 'size-Tiny';
       		    	$embed_size = '145';
 	    	   	} else { 
   		   		 	$my_size = 'size-Default';
       				$embed_size = '320';
       			}
				/*
	       		 * Display a tile for the post only if there is some image/video,etc. to display
       	 		 */
       			if($embed_code||$vid_url||(has_post_format('gallery')&&!$_force_feat_img)||has_post_thumbnail()){
       				/*
    	    		 * Create a loop to get all the category names 
   	    			 */
       				$category_classes = '';
       				foreach((get_the_category()) as $category){
       					$category_classes .= $category->category_nicename . ' '; 
    				} 
	    			/*
	    			 * Set up an <a> tag to link the whole tile div to the post permalink
   					 * Assign class names including tile, the category, size, and post name of the 
    				 * tile
    			 	 */
    			 	if(get_field('exclude')!=="yes"){
	    			?>
		    			<a href="<?php the_permalink(); ?>"><div class="tile <?php 
    						echo $category_classes . $my_size. ' '.$query->post->post_name; 
    					?>">
    	    			    <?php
        	    			// Display video if available
    	        			if( ( $embed_code || $vid_url ) && !$force_feat_img ){
   	    	    				if( $vid_url ){ 
       	    						echo '<div class="vid-container">'.apply_filters('the_content', '[embed width="' . $embed_size . '"]' . $vid_url . '[/embed]').'</div>';
	          					} else { 
    	       						echo '<div class="vid-container">'.$embed_code.'</div>';
        		   				} 
    	    			    // Display gallery
   	    	    			} elseif( has_post_format( 'gallery' ) && !$force_feat_img ){
       	   		 				get_template_part( 'includes/loop-gallery' );
       		  				/* Display featured image using the url of the featured image instead of 
	       	 				 * a thumbnail to avoid formatting issues with inline styling
    	      	 			 * Display div with event complete image of apropriate size if event complete
        	  	 			 * with featured image in background 
           					 */	
           					} elseif( has_post_thumbnail() ){  
           						$img_url=wp_get_attachment_image_src(get_post_thumbnail_id($query->post->ID),array(294,455))[0]; //absolute path
            					$img_url_rel=str_replace(home_url(),"",$img_url); //relative path
            					if ( in_array( 'yes', get_field('event_complete') ) ) { ?>
            						<div style="background-image:url(<?php echo $img_url;?>);">
            							<?php //have to use absolute path to getimagesize if you don't
	            						//specify how many folders to go up in relative path
    	        						if(getimagesize($img_url)[0]===getimagesize($img_url)[1]){?> 	   
 			               					<img src="/wp-content/uploads/2015/05/Event_Complete_Square.png">
        		        				<?php } 
        	    	    				else {?>
        	        						<img src="/wp-content/uploads/2014/10/Event_Complete_Slide.png">
        	        					<?php } ?>
        	        				</div>
	        	        		<?php }
    	    	        		else {?>                 
 	    	          				<img class="<?php echo $my_size;?>" src="<?php echo $img_url_rel;?>">
            	 				<?php }
             				}
   	         				/*
       	     				 *add class overlay if not creative or category page since you can't 
	           	 			 *edit meta fields for categories on individual pages since they don't
    	       			 	 *have pages. Otherwise add class no-overlay
        	   			 	 */?>
   	        	 			<header class="<?php 
       	     				if(!$creative&&!is_category())echo "overlay";
           	 				else echo "no-overlay";
           					?>">
           						<h2><?php the_title(); ?></h2>
	           				</header>
    	         			<?php 
   	    	     			/*
       	    	 			 * Display date on when a creative is used or in a category except in 
           	 				 * the news category.
           					 */
           					if($date&&($creative||is_category())){?>
           						<p class="date"><?php echo $date;?></p>
	   		       			<?php } 
   			       		//close of tile?>
  						</div></a> 
       				<?php }
       			}
   			} //end of while 
   			//end of tile container ?>
       		</div>
   		<?php } //end of if have posts
   		wp_reset_postdata();
   	} //end of if list to display
   	/*
   	 * First, check to see if there is a title for every post to query
   	 * If so, create a for loop to run through each child to query
   	 * Then, display that child's title and content only if it is set and there are no tiles 
   	 * already displayed under the parent heading, aka. is a parent page
   	 * Finally, call the functions self using the child 
   	 * ID as the parent ID in order to recursively search all child until there are no 
   	 * more children to query or every child has image to display
   	 */
   	if($list_to_query&&$list_to_query_titles&&(count($list_to_query)===count($list_to_query_titles))){
	   	for($i=0;$i<count($list_to_query);$i++){
	   		$title_slug=strtolower(preg_replace("/\s+/","-",preg_replace("/&#[0-9]+;/"
			,"",$list_to_query_titles[$i])));?>
			<a name="<?php echo $title_slug;?>"></a>
	   		<header class="post"><h1><?php echo $list_to_query_titles[$i];?></h1></header>
	   		<?php if($list_content&&(count($list_to_query)===count($list_content))){
	   			if($list_content[$i]!=""){?>
	   				<section class="post <?php echo $title_slug;?>">
						<?php echo $list_content[$i];?>
					</section>
   				<?php }
   			}
   			display_loop_tile_recursive(array('post_parent'=>$list_to_query[$i],'post_type'=>'page','order'=>'ASC','posts_per_page'=>'-1'));
   		} // end of for loop
   	} //end of list to query
} //end of function display loop recursive
?>