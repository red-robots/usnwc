 <?php
/*
 * Template Name: Passes-Tours Template
 */

get_header('page'); ?>

<?php while( have_posts() ) { the_post();



	get_sidebar("banner");?>

	<section class="post container passes-tours">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		<?php $top_sections = get_field("top_sections");
		if($top_sections){
			foreach($top_sections as $section){
				$title = $section['title'];
				if($title){?>
					<a name="<?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($title)));?>"></a>
					<article class="row <?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($title)));?>">
						<?php 
						/*
						* Display the video or post_thumbnail featured image (if any)
						*/
						$image = $section['image'];
						if($image){?>
							<figure class="featured_image">
								<img src="<?php echo $image['sizes']['medium'];?>">
							</figure>
						<?php } 
						/*
						* Display the title of the post and the content
						*/
						?>
						<section class="copy">
							<header>
								<h2><?php echo $title; ?></h2>
							</header>
							<?php $copy = $section['copy'];
							if($copy) echo $copy;?>
						</section>
					</article>
				<?php } ?>
			<?php } //end of foreach 
		}//end of if?>
		<div class="wrapper">
			<header>
				<h2>More Information</h2>
			</header>
			<div class="buttons">
				<div class="button expand-button type-passes" onClick="gtag('event', 'click', {
					  'event_category' : 'PassesTours',
					  'event_label' : 'Passes Button'
					});">Passes</div><!--.expand-button-->
				<div class="button expand-button type-tours" onClick="gtag('event', 'click', {
					  'event_category' : 'PassesTours',
					  'event_label' : 'Tours Button'
					});">Tours</div><!--.expand-button-->
			</div><!--.buttons-->
		</div><!--.wrapper-->
	</section>
	<?php $activities = array(
		'Whitewater'=>'activity_whitewater',
		'Flatwater'=>'activity_flatwater',
		'Climbing'=>'activity_climbing',
		'Ziplines'=>'activity_ziplines',
		'Ropes'=>'activity_ropes',
		'Jumps'=>'activity_jumps',
		'Trails'=>'activity_trails',
		'Kayaking'=>'activity_kayaking',
		'Stand-Up Paddleboarding'=>'activity_sup'
	);?>
	<section class="post container passes">
	<a id="the-pass-section" name="<?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($title)));?>"></a>
		<header>
			<h1>Passes</h1>
		</header>
		<?php $passes_sections = get_field("passes_sections");
		if($passes_sections){
			foreach($passes_sections as $section){
				$title = $section['title'];
				if($title){?>
					
					<article class="row <?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($title)));?>">
						<?php 
						/*
						* Display the video or post_thumbnail featured image (if any)
						*/
						$image = $section['image'];
						if($image){ ?>
							<figure class="featured_image">
								<img src="<?php echo $image['sizes']['medium'];?>">
							</figure>
						<?php } 
						/*
						* Display the title of the post and the content
						*/
						?>
						<section class="copy">
							<header>
								<h2><?php echo $title; ?></h2>
							</header>
							<?php $copy = $section['copy'];
							if($copy) echo $copy;?>
							
							<h2><i>Activity Access</i></h2>
							<p style="margin-bottom: 0;">Please click items below for specific activities, difficulties, and qualifiers.</p>
							<ul class="top-level-menu">
								<?php /* loop for activity access section */
								foreach($activities as $key => $activity){?>
									<?php if($section[$activity]) {?>
										<li class="top-level-item">
											<div class="title"><span class="indicator-plus">+</span><span class="indicator-min">-</span> <?php echo $key;?></div><!--.title-->
											<table class="sub-menu">
												<thead>
													<tr>
														<th>Activities</th>
														<th>Difficulty</th>
														<th>Qualifiers</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($section[$activity] as $act) {
														$show = $act['show'];
														if(strcmp('no',$show)!==0){?>
															<tr>
																<?php // fields
																$name = $act['name'];
																$difficulty = $act['difficulty'];
																$qualifiers = $act['qualifiers'];
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
														<?php } //endif for $show
													}//end foreach ?>
												</tbody>
											</table> 
										</li>
									<?php } // end for if?>
								<?php } //end for foreach ?>
							</ul>
							<?php //section for buttons for each activity
							$buttons = $section['buttons'];
							if($buttons){?>
								<div class="buttons">
									<?php foreach($buttons as $button){
										$link = $button['link'];
										$text = $button['text'];
										$weblink = $button['web_link'];
										if($link != '' ) {
											$result = $link;
										} elseif( $weblink != '') {
											$result = $weblink;
										} else {
											$result = '#';
										}
										if($text){?>
											<a class="button" href="<?php echo $result;?>"><?php echo $text;?></a>
										<?php } // end for if?>
									<?php }// end for foreach?>
								</div><!--.buttons-->
							<?php } //end for if?>
						</section>
					</article>
				<?php } ?>
			<?php } //end of foreach 
		}//end of if?>
	</section>

	<section class="post container tours">
	<a id="the-tours-section" name="<?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($title)));?>"></a>
		<header>
			<h1>Tours</h1>
		</header>
		<?php $tours_sections = get_field("tours_sections");
		if($tours_sections){
			foreach($tours_sections as $section){
				$title = $section['title'];
				if($title){?>
					
					<article class="row <?php echo strtolower(preg_replace('/[^0-9a-zA-Z\-]/','',sanitize_title_with_dashes($title)));?>">
						<?php 
						/*
						* Display the video or post_thumbnail featured image (if any)
						*/
						$image = $section['image'];
						if($image){ ?>
							<figure class="featured_image">
								<img src="<?php echo $image['sizes']['medium'];?>">
							</figure>
						<?php } 
						/*
						* Display the title of the post and the content
						*/
						?>
						<section class="copy">
							<header>
								<h2><?php echo $title; ?></h2>
							</header>
							<?php $copy = $section['copy'];
							if($copy) echo $copy;?>

							<?php /*
							* Get all of the fields for pass type and qualifiers and difficulty
							* to variables
								*/
							$difficulty = $section['difficulty'];
							$quals = $section['qualifiers'];
							$beg = in_array( 'beginner', $difficulty );
							$int = in_array( 'intermediate', $difficulty );
							$adv = in_array( 'advanced', $difficulty );	
							$tourprice = $section['price'];
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
											<div><p  class="flexstretch">
												<?php if( $beg ) { ?>
													<img src="/wp-content/uploads/2014/11/Easy2.png" /> <span>Beginner</span> <br />
												<?php }
												if( $int ) { ?>
												
													<img src="/wp-content/uploads/2014/11/medium2.png" class="med-diff-align" /> <span class="diff-align">Intermediate</span> <br />
												
													
												<?php } 
												if( $adv ) { ?>
													<img src="/wp-content/uploads/2014/11/Advanced2.png" /> <span>Advanced</span> 
												<?php } ?>
											</p></div>
										</div>
									<?php } if( $tourprice ) { ?>
									<div class="difficulty">
										<span><i>Price:</i></span>
										<div><p><i><?php echo $tourprice; ?></i></p></div>
									</div>
									<?php } ?>
								</div> 
							<?php }?>
							<?php //section for buttons for each activity
							$buttons = $section['buttons'];
							if($buttons){?>
								<div class="buttons">
									<?php foreach($buttons as $button){
										$link = $button['link'];
										$text = $button['text'];
										$weblink = $button['web_link'];
										if($link != '' ) {
											$result = $link;
										} elseif( $weblink != '') {
											$result = $weblink;
										} else {
											$result = '#';
										}
										if($text){?>
											<a class="button" href="<?php echo $result;?>"><?php echo $text;?></a>
										<?php } // end for if?>
									<?php }// end for foreach?>
								</div><!--.buttons-->
							<?php } //end for if?>
						</section>
					</article>
				<?php } ?>
			<?php } //end of foreach 
		}//end of if?>
	</section>

<?php }//endwhile
 get_footer('page'); ?>