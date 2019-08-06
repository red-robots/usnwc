<?php
/* Single Post Template
 * @since   1.0
 * @alter   2.0
*/
get_header(); 

global $post;

$content = get_field('activity_descr');
$images = get_field('gallery');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

get_sidebar("banner");

// Start
while(have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		<header>
			<?php the_title( '<h1 class="entry-title product_title">', '</h1>' ); ?>
		</header>		        	        
		<?php  echo $content; ?>

		<?php if( have_rows('activities') ) : ?>
			<div class="quali-acti">
            <table class="sub-menu">

                <thead>

                    <tr>
                        <th>Activities</th>
                        <th>Difficulty</th>
                        <th>Qualifiers</th>
                    </tr>
                </thead>
                <tbody>
                                    
                                

            <?php while( have_rows('activities') ) : the_row(); 

                $name = get_sub_field('name');
                $difficulty = get_sub_field('difficulty');
                $qualifiers = get_sub_field('qualifiers');
                $show = get_sub_field('show');
                
            ?>
            <?php 
                
                if(strcmp('no',$show)!==0){?>
                    <tr>
                        <?php // fields
                        // $name = $act['name'];
                        // $difficulty = $act['difficulty'];
                        // $qualifiers = $act['qualifiers'];
                        $beg = in_array( 'Easy', $difficulty );
                        $int = in_array( 'Intermediate', $difficulty );
                        $adv = in_array( 'Difficult', $difficulty );?>

                        <td>
                            <?php if($name) echo $name;?>
                        </td>
                        <td>
                            <div class="difficulty">
                                <div class="diff-icon">
                                    <?php if( $beg ) { ?>
                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-easy.png" />
                                    <?php } ?>
                                </div>
                                <div class="diff-icon">
                                    <?php if( $int ) { ?>
                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-med.png" />
                                    <?php } ?>
                                </div>
                                <div class="diff-icon">
                                    <?php if( $adv ) { ?>
                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-advanced.png" />
                                    <?php } ?>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php if($qualifiers) echo $qualifiers;?>
                        </td>
                    </tr>
                <?php } //endif for $show ?>
            <?php endwhile; ?>
                </tbody>
            </table> 
           </div>
        <?php endif; // end of Qualifiers ?>

			<?php 
			// Begin Flexslider

			// see variable above in header
			

			if( $images ): ?>
			<div class="flexslider">
			    <ul class="slides">
			        <?php foreach( $images as $image ): ?>
			            <li>
			            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			</div>
		<?php endif; ?>
   	</article>
<?php endwhile; //end of if have posts
get_footer(); 
?>