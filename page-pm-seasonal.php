 <?php
/*
 * Template Name: PM Seasonal
*/
get_header('pm-seasonal'); ?>



 <?php get_sidebar("banner");?>
<?php if(have_posts()){
   	the_post(); ?>
	<?php if(in_array(get_field('sidebar'),array("top","both"),true)){
		$sidebar="top";
		get_template_part('sidebar');
	} ?>
	<article class="post <?php echo $post->post_name; ?>">
	  	<header>
    	   	<h1><?php the_title(); ?></h1>
  		</header>
		<?php the_content(); ?>
		<div class="tabbable">
			<p class="nav">
				<a class="tab2link" href="#tab2" data-toggle="tab" >Jobs By Department</a> 
				<span class="tab7link" style="display: none;">| </span> <a class="tab7link" href="#tab7" data-toggle="tab" class="active" style="display: none;">Jobs By Category</a>
				| <a class="tab1link" href="#tab1" data-toggle="tab" class="active" >All Jobs</a>
			</p>

			<h2 id="pagetitle"></h2>

			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
					<table class="sortable">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Department</th>
								<th>Share</th>
							</tr>
						</thead>
						<tbody id="table-body-all">
							<tr>
								<td colspan="4" style="text-align: center;"><p style=" margin: 100px 0px;">Please Wait. Loading Available Job Positions...</p></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="tab2">
					<table class="jobs-by-business sortable">
						<thead>
							<tr>
								<th>Department</th>
								<th>Open Positions</th>
							</tr>
						</thead>
						<tbody id="table-body-business">
							<tr>
								<td colspan="3" style="text-align: center;"><p style=" margin: 100px 0px;">Please Wait.  Loading Available Job's By Business...</p></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="tab3">
					<table class="jobs-by-business sortable">
						<thead >
							<tr>
								<th>Location</th>
								<th>Department</th>
								<th>Open Positions</th>
							</tr>
						</thead>
						<tbody id="table-body-locations">
							<tr>
								<td colspan="4" style="text-align: center;"><p style=" margin: 100px 0px;">Please Wait.  Loading Available Job's By Location...</p></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="tab4">
					<table class="jobs-by-business sortable">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Department</th>
								<th>Share</th>
							</tr>
						</thead>
						<tbody id="table-body-business-filter">
							<tr>
								<td colspan="4" style="text-align: center;"><p style=" margin: 100px 0px;">Please Wait.  Loading Available Job Positions...</p></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="tab5">
					<table class="jobs-by-business sortable">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Department</th>
								<th>Share</th>
								<th>Apply</th>
							</tr>
						</thead>
						<tbody>
							<tr id="detail-load">
								<td colspan="5" style="text-align: center;"><p style=" margin: 100px 0px;">Please Wait.  Loading Available Job Details...</p></td>
							</tr>
							<tr id="detail-row">
								<td class="title"></td>
								<td id="business"></td>
								<td id="share"></td>
								<td><a class="applyurl" href="#" >Apply</a></td>
							</tr>
						</tbody>
					</table>

					<div id="detail-data">
						<div class="jobtitle">
							<h3 class="title"></h3>
							<p class="subnav"> <a id="backtolist" onClick="showPreviousTab();">Back to List</a> | <a class="applyurl applybutton" href="#" >Apply Now</a></p>
						</div>

						<div class="jobdescription"></div>

						<div class="requirements"></div>

						<div class="addinfo"></div>
					</div>
				</div>

				<div class="tab-pane" id="tab6">
					<table class="jobs-by-me sortable">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Department</th>
								<th>Miles Away</th>
								<th>Share</th>
							</tr>
						</thead>
						<tbody id="table-body-jobsbyme">
							<tr>
								<td colspan="5" style="text-align: center;"><p style=" margin: 100px 0px;">Please Wait. Loading Available Job Positions...</p></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="tab7">
					<table class="sortable">
						<thead>
							<tr>
								<th>Category</th>
								<th>Job Title</th>
								<th>Department</th>
								<th>Share</th>
							</tr>
						</thead>
						<tbody id="table-body-categories">
							<tr>
								<td colspan="4" style="text-align: center;"><p style=" margin: 100px 0px;">Please Wait.  Loading Available Job's By Categories.....</p></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<p class="breadcrumb">
		
			<a class="tab2link" href="#tab2" data-toggle="tab" >Jobs By Department</a>
			| <a class="tab1link" href="#tab1" data-toggle="tab" class="active" style="">All Jobs</a>
		</p>
	</article>
	<?php if(in_array(get_field('sidebar'),array("bottom","both"),true)){
		$sidebar="bottom";
		get_template_part('sidebar');
	}
} //end of if have posts ?>

<?php get_footer('page'); 
?>