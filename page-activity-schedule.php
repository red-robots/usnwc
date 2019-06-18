 <?php
/*
 * Template Name: Activity Schedule
 */

get_header('page'); ?>

<?php while( have_posts() ) { the_post();

	get_sidebar("banner");

$trailstatus = get_option('tcw_widget_status');
// used to close the entire day down
$hideAll = get_field('hide_all');
if( $hideAll ) {
	$hideAll = $hideAll[0];
}
$closedMessage = get_field('closed_message');
// echo '<pre>';
// print_r($trailstatus);
// echo '</pre>';
// echo '<h1>'.$trailstatus->status.'</h1>';




	?>

	<?php $activities = array(
		'Whitewater'=>'activity_whitewater',
		'Flatwater'=>'activity_flatwater',
		'Climbing'=>'activity_climbing',
		'Ziplines'=>'activity_ziplines',
		'Ropes'=>'activity_ropes',
		'Jumps'=>'activity_jumps',
		'Yoga'=>'activity_yoga',
		'Trails'=>'activity_trails'
	);?>
	<section class="post container activity-schedule">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		<?php $date_notice = get_field("date_notice");
		if($date_notice){?>
			<?php echo $date_notice;?>
		<?php }//endif?>
		<?php if( $hideAll == 'dayclose' ) : 
			echo $closedMessage;
		 else : ?>
			<ul class="activity-schedule-list">
				<?php /* loop for activity access section */
				foreach($activities as $key => $activity){?>
					<li class="top-level-item">
						<span class="title"><?php echo $key;?></span>
						<ul>
							<?php $rows = get_field($activity);
								// echo '<pre>';
								// print_r($rows);
								// echo '</pre>';
							if($rows){
								foreach($rows as $row) {
									$closed = $row['closed'];
									$start_time = $row['start_time'];
									$end_time = $row['end_time'];
									$title = $row['title'];
									$copy = $row['copy'];
									// echo $closed;
									if( !empty($closed) ) {
										foreach( $closed as $status ) {
											$statusWord = $status;
										}
										// echo ' this: '.$statusWord;
									}
									
									// echo '<pre>';
									// print_r($closed);
									// echo '</pre>';
									if( $statusWord != 'hide' ) :
										if( $title == 'Mountain Biking' ) {
											if( $trailstatus['status'] == 'B' ) {
												$tClassStatus = 'closed';
												} else {
													$tClassStatus = '';
												} ?>
											<li class="<?php echo $tClassStatus; ?>">
												<span class="title">Trail Status</span>
												<?php if( $trailstatus['status'] == 'A' ) { ?>
													<span class="time">Open</span>
												<?php } else { ?>
													<span class="time">Closed</span>
												<?php } ?>
											</li>
										<?php }
										?>
										<?php if( $title ) { ?>
											<li class="<?php  if( !empty($closed) ) echo "closed";?>">
												<span class="title"><?php echo $title;?></span>
												<?php if(! empty( $closed ) ) { ?>
													<span class="time">Unavailable</span>
												<?php } elseif($start_time||$end_time){?>
													<span class="time"><?php if($start_time){
														echo $start_time;
													}
													echo "-";
													if($end_time){
														echo $end_time;
													}?></span>
												<?php } //endif?>
												<?php if($copy){?>
													<div class="clearfix"></div>
													<div class="copy">
														<?php echo $copy;?>
													</div><!--.copy-->
												<?php }?>
											</li>
										<?php }//endif?>
									<?php endif; // endif if not "hide" 
										$statusWord = ''; // reset activity status
									?>
								<?php }//end foreach 
							}//endif?>
						</ul>
					</li>
				<?php } //end for foreach 

				// $activities = array(
				// 	'Trails'=>'activity_trails'
				// );

				 ?>
				
					
			</ul>	
		<?php endif; // endif if all activities are closed for the day check. ?>
		<?php the_content();?>
	</section>
<?php }//endwhile
 get_footer('page'); ?>