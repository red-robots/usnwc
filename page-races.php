 <?php
/*
 * Template Name: Races
*/
get_header('page'); ?>



 <?php get_sidebar("banner");?>
<?php if(have_posts()) { ?>
    <?php the_post(); ?>
    <article class="post"> 
		<header>
          	<h1><?php the_title(); ?></h1>
        </header>
        <?php
        $event_details = get_field('event_details');
		$registration_details = get_field('registration_details');
		$registration_link = get_field('registration_link');
		$schedule = get_field('schedule');
		$race_document = get_field('race_document');
		$post_race = get_field('post_race');
		$awards = get_field('awards');
		$course_map = get_field('course_map');
		$use_alternate_course = in_array('yes',get_field('use_alternate_course'));
		$alternate_course = get_field('alternate_course');
		$volunteer = get_field('volunteering');
		$results = get_field('results');
		$additional_info = get_field('additional_event_info');     
		$sponsors = get_field('sponsors'); 
		$recapvideo = get_field('recap_video');      
        ?>
        <nav class="bookmark-links">
			<table>
				<tbody>
					<tr>
						<?php if($event_details){ ?>
							<td><a href="#info"><img src="http://usnwc.org/wp-content/uploads/2015/05/EventDetails.png"></a></td>
						<?php } else { ?>
							<td class="no-link"><img src="http://usnwc.org/wp-content/uploads/2015/05/EventDetails.png"></td>
						<?php } ?>
						<?php if($registration_link){ ?>
							<td><a href="#register"><img src="http://usnwc.org/wp-content/uploads/2015/05/Register.png"></a></td>
						<?php } else { ?>
							<td class="no-link"><img src="http://usnwc.org/wp-content/uploads/2015/05/Register.png"></td>
						<?php } ?>
						<?php if($course_map || $alternate_course) { ?>
							<td><a href="#map"><img src="http://usnwc.org/wp-content/uploads/2015/05/Course.png"></a></td>
						<?php } else { ?>
							<td class="no-link"><img src="http://usnwc.org/wp-content/uploads/2015/05/Course.png"></td>
						<?php } ?>
						<?php if($results){ ?>
							<td><a href="#results"><img src="http://usnwc.org/wp-content/uploads/2015/05/Results.png"></a></td>
						<?php } else { ?>
							<td class="no-link"><img src="http://usnwc.org/wp-content/uploads/2015/05/Results.png"></td>
						<?php } ?>
					</tr>
					<tr>
						<?php if($event_details){ ?>
							<td><a href="#info"><p>Event Details</p></a></td>
						<?php } else { ?>
							<td class="no-link"><p>Event Details</p></td>
						<?php } ?>
						<?php if($registration_link){ ?>
							<td><a href="#register"><p>Register</p></a></td>
						<?php } else { ?>
							<td class="no-link"><p>Register</p></td>
						<?php } ?>
						<?php if($course_map || $use_alternate_course) { ?>
							<td><a href="#map"><p>Course</p></a></td>
						<?php } else { ?>
							<td class="no-link"><p>Course</p></td>
						<?php } ?>
						<?php if($results){ ?>
							<td><a href="#results"><p>Results</p></a></td>
						<?php } else { ?>
							<td class="no-link"><p>Results</p></td>
						<?php } ?>
					</tr>
				</tbody>
			</table>
		</nav>	
        <section class="content">
			<?php the_content();?>
        </section>
        <?php if( $event_details ) { ?>
            <section class="event">
               	<a name="info"></a>
              	<header><h2>Event Details:</h2></header>
            	<?php echo $event_details ?>
            </section>            
        <?php } ?>
        <?php if( $registration_details ) { ?>      
        	<section class="registration">
               	<a name="register"></a>
                <header><h2>Registration:</h2></header>
               	<?php echo $registration_details ?>
            	<?php if( $registration_link ) { ?>
					<?php echo "<a href='".$registration_link." ' class='register-button-link' target='_blank'><div class='register-button'>Register</div></a>" ?>
           		<?php } ?>
          	</section>
        <?php } ?>
        <?php if( $schedule ) { ?>
            <section class="schedule">
               	<header><h2>Schedule:</h2></header>
               	<?php echo $schedule ?>
           	</section>
        <?php } ?>
        <?php if( $race_document ) { ?>                
        	<section class="race-document">
               	<header><h2>Race Document:</h2></header>
               	<?php echo $race_document ?>
           	</section>
        <?php } ?>
        <?php if( $post_race ) { ?>
            <section class="post-race">
               	<header><h2>Post-Race:</h2></header>
               	<?php echo $post_race ?>
           	</section>
        <?php } ?>
        <?php if( $awards ) { ?>
            <section class="awards">
               	<header><h2>Awards:</h2></header>
               	<?php echo $awards ?>
           	</section>
        <?php } ?>
        <?php if ( $course_map || $use_alternate_course) { ?>
            <section class="course">
               	<header><h2>Course:</h2></header>
               	<?php if( $course_map ) { ?>
              		<a name="map"></a>
           			<a href="<?php echo $course_map['url']; ?>" target="_blank"><img src="<?php echo $course_map['url']; ?>" width="400" alt="<?php echo $course_map['alt']; ?>" /></a>
               	<?php } ?>                
               	<?php if( $use_alternate_course ) { ?>
          		<?php echo $alternate_course ?>
			<div class="clearfix"></div>
		<?php } ?>
           	</section>
        <?php } ?>
        <?php if( $volunteer ) { ?>
            <section class="volunteer">
               	<header><h2>Volunteering:</h2></header>
               	<?php echo $volunteer ?>
           	</section>
        <?php } ?>
        <?php if( $results ) { ?>
            <section class="results">
               	<a name="results"></a>
               	<?php echo $results ?>
           	</section>
        <?php } ?>
		<?php if( $recapvideo ) { ?>
			<section class="recap-video">
				<a name="recapvideo"></a>
				<?php echo $recapvideo ?>
			</section>
		<?php } ?>
        <?php if( $sponsors ) { ?>
        	<section class="sponsors">
               	<header><h2>Sponsors:</h2></header>
               	<?php echo $sponsors ?>
          	</section>
        <?php } ?>
        <?php if( $additional_info ) { ?>
            <section class="additional-info">
               	<header><h2>Additional Event Info:</h2></header>
               	<?php echo $additional_info ?>
        	</section>
        <?php } ?>
    	<?php comments_template(); ?>  
	</article>  
<?php } ?>
<?php get_footer('page'); ?>