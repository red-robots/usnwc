<?php 
/*
 * @author: Fritz Healy
 * NOTE: Working from existing templates
 *
 * This function is the loop to display the content of the queried posts as articles on 
 * the usnwc site.
 * The header given to the section of articles is either the title of the page or "upgrades"
 * if upgrades are queried this is specific to the usnwc requirements. 
 * The $args value is passed from the template as the argument used for the query
 */
function display_loop_article($args){
	/*
	 * Queries the posts with WP_Query and set up The Loop
	 */
	$query=new WP_Query($args);
	if($query->have_posts()){
		/*
		 * Articles will be held within a section container
		 * The header of the section will be either the name of the page that called this 
		 * fucntion or "upgrades" if upgrades were queried 
		 */
		?>
		<section class="post container <?php 
			if($args['post_type']&&$args['post_type']==='page'){
				echo strtolower(preg_replace("/\s+/","-",preg_replace("/&#[0-9]+;/"
				,"",get_the_title($args['post_parent']))));
				if(in_array(array(array(
  			    	'key' => 'upgrade_check',
            		'value' => 'yes'
        			)
    			), $args)){
    				echo " upgrades";
    			}
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
			<header>
				<?php if(in_array(array(array(
  			    	'key' => 'upgrade_check',
            		'value' => 'yes'
        			)
    			), $args)){ ?>
					<h1>Upgrades</h1>
				<?php } else {?>
					<h1><?php echo the_title();?></h1>
				<?php }?>
			</header>
			<?php while($query->have_posts()){
				$query->the_post();
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
   						if($img_url){ ?>
   							<figure class="featured_image">
 	  							<img class="<?php echo $my_size?>" src="<?php echo $img_url;?>">
 							</figure>
   						<?php } 
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
			<?php } //end of while ?>
		</section>
	<?php }//end of if have posts
	wp_reset_postdata();
}?>