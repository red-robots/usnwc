<?php 

$map = get_field('link_to_activity_map'); 

if( is_page('confluence') ) {
	$tax = 'confluence';
}
?>
<!-- <div class="filter-options">
	// Filter Options //
</div> -->
<div id="the-filter" class="the-filter open">
<?php 
// Run the filter
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'festival_activity',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'festival', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( $tax ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
	
	<div id="filters" class=" ">
		<h2 class="filter-title">Filter By Activity Type:</h2>

		<div class="button-group group1 filters-button-group" data-filter-group="type">
			<button class="filbutton showall is-checked" data-filter="*">show all</button>
			<?php 
			// Set the Array for the whole thing.
			$save = array();
			$first = array();
			$second = array();

			// loop through Activty type first.
			while ($wp_query->have_posts()) : $wp_query->the_post();

				$type = get_field('filter_options');

				foreach($type as $act) {
					$actName = $act;
					// echo $str;
					if( !in_array($actName, $first) ) {
						$first[] = $actName;
					}
				} 

			endwhile; 

				foreach( $first as $theAct ) { 
					$str = strtolower($theAct);
			?>
					<button class="filbutton " data-filter=".<?php echo $str;?>">
						<?php echo $theAct; ?>
					</button>
				<?php
				 } //echo $final;
			 ?>
		</div>
	
<?php endif; ?>



<div class="clear"></div>
<?php 

	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'festival_activity',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'festival', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( $tax ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
	<h2 class="filter-title">Filter By Time:</h2>
		<div class="button-group group2 filters-button-group" data-filter-group="time">
		<button class="filbutton showall is-checked" data-filter="*">show all</button>
			<?php 
				while ($wp_query->have_posts()) : $wp_query->the_post(); 

					//$time = get_field('time_gen');
					$dayD = get_field('date');
					$timestamp = strtotime($dayD);
					$day = date('l', $timestamp);

					$str = strtolower($day);
					$str = sanitize_title_with_dashes($str);
					$timeName = $day;
					if( !in_array($timeName, $second) ) {
						$second[] = $timeName;
					}
					// foreach($dow as $t) {
					// 	$timeName = $t;
					// 	if( !in_array($timeName, $second) ) {
					// 		$second[] = $timeName;
					// 	}
					// }

				endwhile;

				foreach( $second as $theTime ) { 
					// for the link. grab it
					$str = strtolower($theTime);
					// grab the first 4 characters so multi names can still link
					$str = substr($str, 0, 4);
			?>
					<button class="filbutton " data-filter=".<?php echo $str;?>">
						<?php echo $theTime; ?>
					</button>
			
			<?php } ?>
		</div>
	
<?php endif; ?>
	</div>
	<!-- / #filter -->
</div>

<div class="clear"></div>
	
<?php 
// run the fields
$descCount = 0;
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'festival_activity',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'festival', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( $tax ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
		<div class="no-results">
		   <div>No results</div>
		</div>
		<div class="tile container filterzz">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

			$name = get_field('activity_name');
			$timegen = get_field('time_gen');
			$dayD = get_field('date');
					$timestamp = strtotime($dayD);
					$day = date('l', $timestamp);
			$time = get_field('time');
			$duration = get_field('duration');
			$location = get_field('location');
			// echo '<pre>';
			// print_r($location);
			// echo '</pre>';
			$strL = strtolower($location);
			$santiL = sanitize_title_with_dashes($location);
			$type = get_field('filter_options');
			$description = get_field('description');
			
			$ledby = get_field('led_by');
			$ledbyLink = get_field('led_by_link');
			
			$santitime = sanitize_title_with_dashes($timegen);
			
			if( $description != '' ) {
				$descCount++;
			}
			// $santiDesc = sanitize_title_with_dashes($description);

			// echo '<pre>';
			// print_r($timegen );
			// echo '</pre>';

		?>
		
			<div class=" activity-card element-item 
				<?php //if($str) {
					foreach( $type as $t ) {
						$str = strtolower($t);
						echo $str.' ';
					}

					
						$str = strtolower($day);
						// grab the first 4 characters so multi names can still link
						$str = substr($str, 0, 4);
						echo $str.' ';
					
					
					//} ?>
				<?php if($santitime) {echo $santitime.' ';} ?>
				<?php if($santiL) {echo $santiL.' ';} ?>
			" data-category="<?php //echo $str; ?>">
				<h3><?php the_title(); ?></h3>
				
				<?php if( is_page('outdoor-market') ) { ?>
					<div class="desc">
						<span class="upper">Day:</span> <?php echo $timegen[0]; ?>
					</div>
				<?php } ?>

				<?php if( $time || $duration ) { ?>
				<div class="desc">
					<span class="upper">Time:</span> <?php if($time) { echo $time;} ?> <?php if($duration) { echo '('.$duration.')';} ?>
				</div>
				<?php } ?>

				<div class="desc"><span class="upper">Location:</span> <?php echo $location[0]; ?> 
					<a target="_blank" href="<?php echo $map; ?>">(Map)</a>
				</div>

				<div class="desc">
					<span class="upper">Type:</span>
					<?php 
					$prefix = $fruitList = '';
					foreach($type as $act) {
						$fruitList .= $prefix . $act;
	    				$prefix = ', ';
						
						} 
						echo $fruitList;?>
				</div>
				
				<?php if( have_rows('panelists') ) : ?>
					<div class="desc">
						<span class="upper">Panelists:</span><br>
					<?php while( have_rows('panelists') ) : the_row(); 

					$instrName = get_sub_field('instructor_name');
					$instrLink = get_sub_field('instructor_link');
					$instrDescription = get_sub_field('instructor_description');
					$santiName = sanitize_title_with_dashes($instrName);
				?>
					
					<?php if( $instrDescription != '' ) { ?>
						<a class="instr-desc" href="#<?php echo $santiName; ?>">
							<?php echo $instrName; ?><br>
						</a>
					<?php } else {
							echo $instrName . '<br>';
						}
					
					
				endwhile; ?>
					</div>
				<?php endif; ?>
				<?php if( $ledby ) { ?>
					<div class="desc"><span class="upper">Led By:</span>
						<?php if( $ledbyLink ) { ?><a target="_blank" href="<?php echo $ledbyLink; ?>"><?php } ?>
							<?php echo $ledby; ?>
						<?php if( $ledbyLink ) { ?></a><?php } ?>
					</div>
				<?php } ?>
				<?php if( $description != '' ) { ?>
				<div class="act-desc">
					<span class="upper"><a class="pop-desc" href="#desc-<?php echo $descCount; ?>">Information & Description</a></span>
					
					
				</div>
				<?php } ?>

			</div>

			<?php if( $description != '' ) { ?>
			<div style="display: none">
				<div id="desc-<?php echo $descCount; ?>" class="the-pop">
					<?php echo $description; ?>
				</div>
			</div>
			<?php } ?>
			<?php if( have_rows('panelists') ) : while( have_rows('panelists') ) : the_row(); 

					$instrName = get_sub_field('instructor_name');
					$instrLink = get_sub_field('instructor_link');
					$instrDescription = get_sub_field('instructor_description');
					$santiName = sanitize_title_with_dashes($instrName);
				?>
			<div style="display: none">
				<div id="<?php echo $santiName; ?>" class="the-pop">
					<?php echo $instrDescription; ?>
				</div>
			</div>
			<?php endwhile; endif; ?>

		<?php endwhile; 

			if(is_page('outdoor-market')) {
				include(locate_template('includes/extra-items.php'));
			}

		?>
		</div>

<?php endif; ?>


