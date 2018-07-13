<script type="text/javascript">
	


</script>
<?php 
// Run the filter

if( have_rows('activity') ) : ?>
	
	<h2>Filter By Activity Type:</h2>
		<div class="button-group filters-button-group">
		<button class="button is-checked" data-filter="*">show all</button>

		<?php 
		$save = array();
		while( have_rows('activity') ) : the_row(); 

			// $name = get_sub_field('activity_name');
			// $time = get_sub_field('time');
			// $location = get_sub_field('location');
			$type = get_sub_field('activity_type');
			$str = strtolower($type);

			if( !in_array($str, $save) ) {
		?>
			
			<button class="button " data-filter=".<?php echo $str;?>"><?php echo $type; ?></button>
		
		<?php 
			}
		$save[] = $str;

		endwhile;?>
		</div>
	
<?php endif; ?>



<div class="clear"></div>
<?php if( have_rows('activity') ) : ?>
	<h2>Filter By Time:</h2>
		<div class="button-group filters-button-group">

		<?php while( have_rows('activity') ) : the_row(); 

			// $name = get_sub_field('activity_name');
			$time = get_sub_field('time');
			// $location = get_sub_field('location');
			//$type = get_sub_field('activity_type');
			$str = strtolower($time);
			$str = sanitize_title_with_dashes($str);

			// echo '<pre>';
			// print_r($time);
			// echo '</pre>';
			if( !in_array($str, $save) ) {
		?>
			<button class="button " data-filter=".<?php echo $str;?>"><?php echo $time; ?></button>
		
		<?php 
			}
		$save[] = $str;

		endwhile;?>
				</div>
	
<?php endif; ?>


<div class="clear"></div>
<?php if( have_rows('activity') ) : ?>
	<h2>Filter By Location:</h2>
		<div class="button-group filters-button-group">

		<?php while( have_rows('activity') ) : the_row(); 

			// $name = get_sub_field('activity_name');
			//$time = get_sub_field('time');
			$location = get_sub_field('location');
			//$type = get_sub_field('activity_type');
			$str = strtolower($location);
			$strS = sanitize_title_with_dashes($str);

			// echo '<pre>';
			// print_r($time);
			// echo '</pre>';
			if( !in_array($str, $save) ) {
		?>
			<button class="button " data-filter=".<?php echo $strS;?>"><?php echo $location; ?></button>
		
		<?php 
			}
		$save[] = $str;

		endwhile;?>
					</div>
	
<?php endif; ?>		
			
			
		

		
				
			

		<?php //endwhile; ?>


<?php 
// run the fields

if( have_rows('activity') ) : ?>
	
		<div class="tile container">
		<?php while( have_rows('activity') ) : the_row(); 

			$name = get_sub_field('activity_name');
			$time = get_sub_field('time');
			$location = get_sub_field('location');
			$strL = strtolower($location);
			$santiL = sanitize_title_with_dashes($location);
			$type = get_sub_field('activity_type');
			$str = strtolower($type);
			$santitime = sanitize_title_with_dashes($time);

		?>

			<div class="tile activity-card element-item 
				<?php if($str) {echo $str.' ';} ?>
				<?php if($santitime) {echo $santitime.' ';} ?>
				<?php if($santiL) {echo $santiL.' ';} ?>
			" data-category="<?php //echo $str; ?>">
				<h3><?php echo $name; ?></h3>
				<h4><?php echo $time; ?></h4>
				<h4><?php echo $location; ?></h4>
				<h4><?php echo $type; ?></h4>
			</div>
				
			

		<?php endwhile; ?>
		</div>

<?php endif; ?>
