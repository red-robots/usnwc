 <?php
/*
 * Template Name: Activity passes
 */

get_header('page'); 

?>

 <?php get_sidebar("banner");?>

<?php 
while( have_posts() ) : the_post(); 

	// Fields
	$season_pass = get_field('season_pass');
	$day_pass = get_field('day_pass');
	$single_activity_pass = get_field('single_activity_pass');
	$canopy_tour = get_field('canopy_tour');
	$raft_zip_tour = get_field('raft_+_zip_tour');
 ?>


	<section class="post">

		<header>
			<h1><?php the_title();?></h1>
		</header>

		<article class="row-activity">

			<section class="passes copyz passes-section">
				<h2>PASSES</h2>

				<div class="pass-headings">
					<header>
						<h3>Season Pass</h3>
					</header>
					<header>
						<h3>Day Pass</h3>
					</header>
					<header>
						<h3>Single Activity Pass</h3>
					</header>
				</div>
				<div class="act-pass-cont">
					<div class="passes-col">
						<?php echo $season_pass; ?>
					</div><!-- col -->
					<div class="passes-col">
						<?php echo $day_pass; ?>
					</div><!-- col -->
					<div class="passes-col">
						<?php echo $single_activity_pass; ?>
					</div><!-- col -->
				</div><!-- act-pass-cont -->

			</section>

			<?php 
			// set some conditionals for the difficulty
			// if( )

			 ?>

			<section class="tours copyz passes-section ">
				<h2>ACTIVITIES</h2>

				<div class="grey-border table">

				<!--
				#########################################

						Whitewater

				-->
				<div class="chart-row">
					<div class="chart-col-side">
						<h3 class="title-spacer">Whitewater</h3>
					</div>
					<div class="chart-col-mid">
						<h3>Difficulty</h3>
					</div>
					<div class="chart-col-side chart-col-last">
						<h3>Qualifiers</h3>
					</div>
				</div><!-- chart row -->

					<?php 
					$i=0;
					if(have_rows('activity_whitewater') ) : while(have_rows('activity_whitewater')) : the_row(); $i++;

						// fields
						$name = get_sub_field('name');
						$difficutly = get_sub_field('difficutly');
						$qualifiers = get_sub_field('qualifiers');
						$asterisk = get_sub_field('asterisk');
						$beg = in_array( 'Easy', get_sub_field('difficutly') );
						$int = in_array( 'Intermediate', get_sub_field('difficutly') );
						$adv = in_array( 'Difficult', get_sub_field('difficutly') );

						if( $i == 2 ) {
							$class = 'row-grey';
							$i=0;
						} else {
							$class = '';
						}

					?>

				<div class="chart-row <?php echo $class; ?>">
					<div class="chart-col-side">
						<span class="chart-title <?php echo $spacer; ?>">
							<?php echo $name; ?>
						</span>
                        <span class="asterisk">
							<?php if( $asterisk == 'Yes' ) { echo '*'; } ?>
						</span>
					</div>
					<div class="chart-col-mid">
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
					<div class="chart-col-side chart-col-last">
						<?php echo $qualifiers; ?>
					</div>
				</div><!-- chart row -->

				<?php endwhile; endif; ?>

				<!--
				#########################################

						Flatwater

				-->
				<div class="chart-row">
					<div class="chart-col-side">
						<h3 class="title-spacer">Flatwater</h3>
					</div>
					<div class="chart-col-mid">
						&nbsp;
					</div>
					<div class="chart-col-side chart-col-last">
						&nbsp;
					</div>
				</div><!-- chart row -->

					<?php 
					$i=0;
					if(have_rows('activity_flatwater') ) : while(have_rows('activity_flatwater')) : the_row(); $i++;

						// fields
						$name = get_sub_field('name');
						$difficutly = get_sub_field('difficutly');
						$qualifiers = get_sub_field('qualifiers');
						$asterisk = get_sub_field('asterisk');
						$beg = in_array( 'Easy', get_sub_field('difficutly') );
						$int = in_array( 'Intermediate', get_sub_field('difficutly') );
						$adv = in_array( 'Difficult', get_sub_field('difficutly') );

						if( $i == 1 ) {
							$class = 'row-grey';
						} else {
							$class = '';
							$i=0;
						}

					?>

				<div class="chart-row <?php echo $class; ?>">
					<div class="chart-col-side">
						<span class="chart-title">
							<?php echo $name; ?>
						</span>
                        <span class="asterisk">
							<?php if( $asterisk == 'Yes' ) { echo '*'; } ?>
						</span>
					</div>
					<div class="chart-col-mid">
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
					<div class="chart-col-side chart-col-last">
						<?php echo $qualifiers; ?>
					</div>
				</div><!-- chart row -->

				<?php endwhile; endif; ?>

				<!--
				#########################################

						Climbing

				-->
				<div class="chart-row">
					<div class="chart-col-side">
						<h3 class="title-spacer">Climbing</h3>
					</div>
					<div class="chart-col-mid">
						&nbsp;
					</div>
					<div class="chart-col-side chart-col-last">
						&nbsp;
					</div>
				</div><!-- chart row -->

					<?php 
					$i=0;
					if(have_rows('activity_climbing') ) : while(have_rows('activity_climbing')) : the_row(); $i++;

						// fields
						$name = get_sub_field('name');
						$difficutly = get_sub_field('difficutly');
						$qualifiers = get_sub_field('qualifiers');
						$asterisk = get_sub_field('asterisk');
						$beg = in_array( 'Easy', get_sub_field('difficutly') );
						$int = in_array( 'Intermediate', get_sub_field('difficutly') );
						$adv = in_array( 'Difficult', get_sub_field('difficutly') );

						if( $i == 1 ) {
							$class = 'row-grey';
						} else {
							$class = '';
							$i=0;
						}

					?>

				<div class="chart-row <?php echo $class; ?>">
					<div class="chart-col-side">
						<span class="chart-title">
							<?php echo $name; ?>
						</span>
                        <span class="asterisk">
							<?php if( $asterisk == 'Yes' ) { echo '*'; } ?>
						</span>
					</div>
					<div class="chart-col-mid">
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
					<div class="chart-col-side chart-col-last">
						<?php echo $qualifiers; ?>
					</div>
				</div><!-- chart row -->

				<?php endwhile; endif; ?>


				
				<!--
				#########################################

						Ziplines

				-->
				<div class="chart-row">
					<div class="chart-col-side">
						<h3 class="title-spacer">Ziplines</h3>
					</div>
					<div class="chart-col-mid">
						&nbsp;
					</div>
					<div class="chart-col-side chart-col-last">
						&nbsp;
					</div>
				</div><!-- chart row -->

					<?php 
					$i=0;
					if(have_rows('activity_ziplines') ) : while(have_rows('activity_ziplines')) : the_row(); $i++;

						// fields
						$name = get_sub_field('name');
						$difficutly = get_sub_field('difficutly');
						$qualifiers = get_sub_field('qualifiers');
						$asterisk = get_sub_field('asterisk');
						$beg = in_array( 'Easy', get_sub_field('difficutly') );
						$int = in_array( 'Intermediate', get_sub_field('difficutly') );
						$adv = in_array( 'Difficult', get_sub_field('difficutly') );

						if( $i == 2 ) {
							$class = 'row-grey';
							$i=0;
						} else {
							$class = '';
						}

					?>

				<div class="chart-row <?php echo $class; ?>">
					<div class="chart-col-side">
						<span class="chart-title">
							<?php echo $name; ?>
						</span>
                        <span class="asterisk">
							<?php if( $asterisk == 'Yes' ) { echo '*'; } ?>
						</span>
					</div>
					<div class="chart-col-mid">
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
					<div class="chart-col-side chart-col-last">
						<?php echo $qualifiers; ?>
					</div>
				</div><!-- chart row -->

				<?php endwhile; endif; ?>

				
				<!--
				#########################################

						Ropes Courses

				-->
				<div class="chart-row">
					<div class="chart-col-side">
						<h3 class="title-spacer">Ropes Courses</h3>
					</div>
					<div class="chart-col-mid">
						&nbsp;
					</div>
					<div class="chart-col-side chart-col-last">
						&nbsp;
					</div>
				</div><!-- chart row -->

					<?php 
					$i=0;
					if(have_rows('activity_ropes') ) : while(have_rows('activity_ropes')) : the_row(); $i++;

						// fields
						$name = get_sub_field('name');
						$difficutly = get_sub_field('difficutly');
						$qualifiers = get_sub_field('qualifiers');
						$asterisk = get_sub_field('asterisk');
						$beg = in_array( 'Easy', get_sub_field('difficutly') );
						$int = in_array( 'Intermediate', get_sub_field('difficutly') );
						$adv = in_array( 'Difficult', get_sub_field('difficutly') );

						if( $i == 2 ) {
							$class = 'row-grey';
							$i=0;
						} else {
							$class = '';
						}

					?>

				<div class="chart-row <?php echo $class; ?>">
					<div class="chart-col-side">
						<span class="chart-title">
							<?php echo $name; ?>
						</span>
                        <span class="asterisk">
							<?php if( $asterisk == 'Yes' ) { echo '*'; } ?>
						</span>
					</div>
					<div class="chart-col-mid">
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
					<div class="chart-col-side chart-col-last">
						<?php echo $qualifiers; ?>
					</div>
				</div><!-- chart row -->

				<?php endwhile; endif; ?>


				<!--
				#########################################

						Jumps

				-->
				<div class="chart-row">
					<div class="chart-col-side">
						<h3 class="title-spacer">Jumps</h3>
					</div>
					<div class="chart-col-mid">
						&nbsp;
					</div>
					<div class="chart-col-side chart-col-last">
						&nbsp;
					</div>
				</div><!-- chart row -->

					<?php 
					$i=0;
					if(have_rows('activity_jumps') ) : while(have_rows('activity_jumps')) : the_row(); $i++;

						// fields
						$name = get_sub_field('name');
						$difficutly = get_sub_field('difficutly');
						$qualifiers = get_sub_field('qualifiers');
						$asterisk = get_sub_field('asterisk');
						$beg = in_array( 'Easy', get_sub_field('difficutly') );
						$int = in_array( 'Intermediate', get_sub_field('difficutly') );
						$adv = in_array( 'Difficult', get_sub_field('difficutly') );

						if( $i == 1 ) {
							$class = 'row-grey';
						} else {
							$class = '';
							$i=0;
						}

					?>

				<div class="chart-row <?php echo $class; ?>">
					<div class="chart-col-side">
						<span class="chart-title">
							<?php echo $name; ?>
						</span>
                        <span class="asterisk">
							<?php if( $asterisk == 'Yes' ) { echo '*'; } ?>
						</span>
					</div>
					<div class="chart-col-mid">
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
					<div class="chart-col-side chart-col-last">
						<?php echo $qualifiers; ?>
					</div>
				</div><!-- chart row -->

				<?php endwhile; endif; ?>


				<!--
				#########################################

						Trails

				-->
				<div class="chart-row">
					<div class="chart-col-side">
						<h3 class="title-spacer">Trails</h3>
					</div>
					<div class="chart-col-mid">
						&nbsp;
					</div>
					<div class="chart-col-side chart-col-last">
						&nbsp;
					</div>
				</div><!-- chart row -->

					<?php 
					$i=0;
					if(have_rows('activity_trails') ) : while(have_rows('activity_trails')) : the_row(); $i++;

						// fields
						$name = get_sub_field('name');
						$difficutly = get_sub_field('difficutly');
						$qualifiers = get_sub_field('qualifiers');
						$asterisk = get_sub_field('asterisk');
						$beg = in_array( 'Easy', get_sub_field('difficutly') );
						$int = in_array( 'Intermediate', get_sub_field('difficutly') );
						$adv = in_array( 'Difficult', get_sub_field('difficutly') );

						if( $i == 1 ) {
							$class = 'row-grey';
						} else {
							$class = '';
							$i=0;
						}

					?>

				<div class="chart-row <?php echo $class; ?>">
					<div class="chart-col-side">
						<span class="chart-title">
							<?php echo $name; ?>
						</span>
                        <span class="asterisk">
							<?php if( $asterisk == 'Yes' ) { echo '*'; } ?>
						</span>
					</div>
					<div class="chart-col-mid">
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
					<div class="chart-col-side chart-col-last">
						<?php echo $qualifiers; ?>
					</div>
				</div><!-- chart row -->

				<?php endwhile; endif; ?>
				</div><!-- grey border -->


				<div class="activity-definitions">
					<div class="act-def">
						<img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-easy.png" />
						<span class="">Novice</span>
					</div>
					<div class="act-def">
						<img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-med.png" />
						<span class="">Intermediate</span>
					</div>
					<div class="act-def">
						<img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-advanced.png" />
						<span class="">Advanced</span>
					</div>
					<div class="act-def">Children must have guardian supervison at all times.</div>
					<!--<div class="astr-discl">
						<div class="astr-def">
							<span class="asterisk">* </span> = Activity not available with Single Activity Pass
						</div>
					</div>-->
				</div>
				

			</section>

		</article>

	</section>

<?php 
// end loop
endwhile;

get_footer('page'); ?>
