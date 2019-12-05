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
$passDesc = get_field('pass_availability');
$btnLabel = 'Pass Options';
$btn = get_field('pass_button');
if( $btn ){ $btnLabel = $btn; }
$passLink = get_field('pass_link');
$addInfo = get_field('additional_information');

get_sidebar("banner");

// Start
while(have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		<header>
			<?php the_title( '<h1 class="entry-title product_title">', '</h1>' ); ?>
		</header>		        	        
		<?php  
		/* Single Activity Description */
			echo $content;

		/*

			Single Activity Qualifiers

		*/
		if( have_rows('activities') ) : ?>
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

                if(strcmp('no',$show)!==0){ ?>
                    <tr>
                        <?php // fields
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
        <?php endif; // end of Qualifiers 
        /* Pass Options */ 
        ?>
        <div class="act-pass-options">
        	<div class="desc"><?php echo $passDesc; ?></div>
        	<?php if( $passLink ) { ?>
        		<div class="pass-button">
        			<a href="<?php echo $passLink; ?>"><?php echo $btnLabel; ?></a>
        		</div>
        	<?php } ?>
        </div>
        <?php 
		/*

			Single Activity Gallery


		*/
			// Begin Flexslider

			// see variable above in header
			

			if( $images ): ?>
			<div class="flexslider">
			    <ul class="slides">
			        <?php foreach( $images as $image ): 

                        // echo '<pre>';
                        // print_r($image);
                        // echo $i;
                        // echo '</pre>';

                        if( $image['caption'] ) {
                            $output = $image['caption'];
                            $class='youtube';
                            $i++;
                        } else {
                            $output = $image['url'];
                            $class='gallery';
                        }

                    ?>
			            <li>
                        <?php if( $image['caption'] ) { ?>
                            <a class="<?php echo $class; ?>" href="#video-<?php echo $i; ?>">
                        <?php } ?>
    			            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                            <?php if( $image['caption'] ) { ?></a><?php } ?>
			            </li>

                        <?php if( $image['caption'] ) { ?>
                            <div style="display: none;">
                            
                                <div id="video-<?php echo $i; ?>" class="video">
                                    <div class="embed-container">
                                        <?php echo wp_oembed_get($output); ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


			        <?php endforeach; ?>
			    </ul>
			</div>
		<?php endif; ?>

		<?php if($addInfo){ ?>
			<div class="addInfo">
				<?php echo $addInfo; ?>
			</div>
		<?php } ?>

   	</article>

<?php endwhile; //end of if have posts
get_footer(); 
?>