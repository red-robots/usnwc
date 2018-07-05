 <?php
/*
 * Template Name: Tiny Tiles
*/
get_header('page'); ?>

<div class="category-banners">
    <?php if (is_page('faqs')) { ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '11447' ); ?>
    <?php } elseif (is_page('sup-squatch')) {  ?>
    <?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '9583' ); ?>

  <?php } ?>

</div>
  
<div id="grid">

   
<?php $this_page_id=$wp_query->post->ID; ?>
	

<?php 
/* Let's query some posts first... */
query_posts(array(
'showposts' => 40, // how many pages to show
'post__not_in' => array(17,4474,8499,8497,8606,8628), // Do not show, 17 = Event calendar, 4474 = GoPro Helmet rental 
'post_parent' => $this_page_id, // parent page
'post_type' => 'page',  // this is a page not a post
'orderby' => 'menu_order', /// order by this order.
'order' => 'ASC')); /// Reverse that order menu order to correct top down

/* Say hello to the Loop... */
if ( have_posts() ) : 





/* Anything placed in #sort is positioned by jQuery Masonry */ ?>
<div class="sort">
    


    
    <?php while ( have_posts() ) : the_post(); 
    	
    	global $my_size, $force_feat_img, $embed_code, $vid_url;
    	
        // Gather custom fields
        //$embed_code = get_post_meta($post->ID, 'soy_vid', true);
        //$vid_url = get_post_meta($post->ID, 'soy_vid_url', true);
        $force_feat_img = get_post_meta($post->ID, 'soy_hide_vid', true);
        $show_title = get_post_meta($post->ID, 'soy_show_title', true);
        $show_desc = get_post_meta($post->ID, 'soy_show_desc', true);
        $box_size = get_post_meta($post->ID, 'soy_box_size', true); 
        
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
    
    <div class="all box <?php echo $category_classes . $my_size; ?>">
    
        
        <div <?php post_class( 'box-content '.$content_class ) ?>>
            <?php // Display featured image
            if ( has_post_thumbnail() ): ?>
            
                <div class="img-container">    
                    <?php 
                    // Display the appropriate sized featured image
                    if( $my_size != 'col2' ): ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($my_size, array( 'class' => 'feat-img' ) ); ?></a>
                    <?php else: ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array( 'class' => 'feat-img' ) ); ?></a>
                    <?php endif; ?>
                    
                    
                     <?php // Display Activites on Hover within the category ?>
                      <?php if (27 == $post->post_parent) { ?>
                      <div class="list-activities">
                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      
                      
                   <ul>
  <?php
  wp_list_pages('title_li=&child_of='.$post->ID.'&depth=1'); ?>
  

  </ul>
                      
                      
                      </div><!-- #actions -->
                      <?php } ?>
                      
                    
                </div><!-- #img-container -->
                
                <?php //if( has_post_format( 'gallery' ) ) get_template_part( 'includes/gallery-list' ); ?>
                
            <?php endif; // #has_post_thumbnail() ?>

             <div class="post-content">
            
	           
                <?php // Display post content
	            
	              
	               
	                   echo get_excerpt(100); 
	              
	                
	             ?>
	            
	             
            </div><!-- #entry -->	    
            
        </div><!-- #box-content -->
        
    </div><!-- #box -->
    <?php endwhile; endif; ?>
</div><!-- #sort -->



  </div><!-- grid -->
    

<?php get_footer('page'); ?>