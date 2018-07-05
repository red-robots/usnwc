<?php
/*
 * Template Name: Activities
 */

get_header( 'page' ); ?>


<?php get_sidebar( "banner" ); ?>

<?php if ( have_posts() ) : ?>
    <section class="post">
        <header>
            <h1><?php echo the_title(); ?></h1>
        </header>
        <article class="row-activity">
			<?php while ( have_posts() ) : the_post();
				$pageTitle = get_the_title();
				?>


                <section class="copyz">
					<?php the_content(); ?>
                </section>


				<?php
				/*
				 * Display the video or post_thumbnail featured image (if any)
				 */
				if ( has_post_thumbnail() ) {
					$img_url = str_replace( home_url(), "", wp_get_attachment_image_src( get_post_thumbnail_id( $query->post->ID ), array(
						200,
						268
					) )[0] );
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
					if ( $img_url ) { ?>
                        <figure class="featured_image">
                            <img class="<?php echo $my_size ?>" src="<?php echo $img_url; ?>">
                        </figure>
					<?php }
				}
				/*
				 * Display the title of the post and the content
				 */
				?>


			<?php endwhile; ?>




			<?php
			// Child page queries
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => - 1,
				'post_parent'    => $post->ID,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			);


			$parent = new WP_Query( $args );

			if ( $parent->have_posts() ) : ?>

                <section class="copy">

                    <section class="act-qualifiers">

                        <div class="col-titles col-title">
							<?php echo $pageTitle; ?>
                        </div>
                        <div class="col-diff col-title">
                            Difficulty
                        </div>
                        <div class="col-qual col-title">
                            Qualifiers
                        </div>

						<?php while ( $parent->have_posts() ) : $parent->the_post();
							$exclude = get_field( "exclude" );
							if ( $exclude && strcmp( $exclude, "yes" ) === 0 ):
								continue;
							endif;
							/*
							 * Get all of the fields for pass type and qualifiers and difficulty
							 * to variables
							 */
							$asp   = in_array( 'asp', get_field( 'passes' ) );
							$csp   = in_array( 'csp', get_field( 'passes' ) );
							$qsp   = in_array( 'qsp', get_field( 'passes' ) );
							$ctp   = in_array( 'canopy', get_field( 'passes' ) );
							$link  = get_field( "link" );
							$quals = get_field( "qualifiers" );
							$beg   = in_array( 'beginner', get_field( 'difficulty' ) );
							$int   = in_array( 'intermediate', get_field( 'difficulty' ) );
							$adv   = in_array( 'advanced', get_field( 'difficulty' ) ); ?>

                            <div class="act-req-row">
                                <div class="col-titles">
									<?php if ( $link ): ?>
                                    <a href="<?php echo $link; ?>">
										<?php endif; ?>
										<?php the_title(); ?>

										<?php if ( $link ): ?>
                                    </a>
								<?php endif; ?>
                                </div>

                                <div class="col-diff">
                                    <div class="diff-icon">
										<?php if ( $beg ) { ?>
                                            <img class="activity-key"
                                                 src="<?php bloginfo( 'template_url' ); ?>/images/diff-easy.png"/>
										<?php } ?>
                                    </div>
                                    <div class="diff-icon">
										<?php if ( $int ) { ?>
                                            <img class="activity-key"
                                                 src="<?php bloginfo( 'template_url' ); ?>/images/diff-med.png"/>
										<?php } ?>
                                    </div>
                                    <div class="diff-icon">
										<?php if ( $adv ) { ?>
                                            <img class="activity-key"
                                                 src="<?php bloginfo( 'template_url' ); ?>/images/diff-advanced.png"/>
										<?php } ?>
                                    </div>

                                </div><!-- col-diff -->

                                <div class="col-qual">
									<?php echo $quals; ?>
                                </div>
                            </div><!-- act-req-row -->


						<?php endwhile; ?>
                    </section>
                </section>
                <div class="clear"></div>
			<?php endif; // end child query ?>
            <aside class="activities-key-wrapper">
                <div class="pass-options-link"><a href="<?php echo get_permalink( 25443 ); ?>">See Pass Options</a></div>
                <h2>Key</h2>
                <div class="novice pair"><img class="activity-key"
                                              src="<?php bloginfo( 'template_url' ); ?>/images/diff-easy.png"/><span>Novice</span>
                </div><!--.novice-->
                <div class="intermediate pair"><img class="activity-key"
                                                    src="<?php bloginfo( 'template_url' ); ?>/images/diff-med.png"/><span>Intermediate</span>
                </div><!--.intermediate-->
                <div class="advanced pair"><img class="activity-key"
                                                src="<?php bloginfo( 'template_url' ); ?>/images/diff-advanced.png"/><span>Advanced</span>
                </div><!--.advanced-->
            </aside><!--.key-->
        </article>
    </section>
<?php endif; // endd page query ?>

<?php get_footer( 'page' ); ?>
