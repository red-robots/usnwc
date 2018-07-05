<?php
/* Search Results
 *
 * @since   1.0
 * @alter   2.1.3
*/

get_header('search'); ?>


 <?php $post = get_post(45);
 setup_postdata($post);
 get_sidebar("banner");
 wp_reset_postdata();?>
<?php if(have_posts()){?>
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
        <?php while(have_posts()){
            the_post();
            $exclude = get_field('exclude');
            if($exclude && strcmp($exclude,"yes")===0){
                continue;
            } 
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
                        <h2>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </header>
                    <?php the_excerpt();?>
                    <?php //display the option to edit the post if logged in?>
                    <?php edit_post_link(__('Edit this post', 'shaken')); ?>
                </section>
            </article>
        <?php } //end of while ?>
    </section>
<?php }?>

<?php get_footer('page'); ?>