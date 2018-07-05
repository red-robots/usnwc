 <?php
/*
 * Template Name: Groups
*/
get_header('page'); ?>
<?php get_sidebar("banner");?>
<?php if(have_posts()){
   	the_post(); ?>
	<article class="post groups <?php echo $post->post_name; ?>">
	  	<header>
    	   	<h1><?php the_title(); ?></h1>
  		</header>
    	<?php the_content(); ?>
		<?php $sections = get_field("sections");
		if($sections):?>
			<div class="section-wrapper <?php if(!get_the_content()) echo "no-bar";?>">
				<?php foreach($sections as $section):
					$title = $section['title'];
					$copy = $section['copy'];
					$list = $section['list'];
					$icons = $section['icons'];
					$button_link = $section['button_link'];
					$button_text = $section['button_text'];
					$flexslider = $section['slider'];?>
					<a name="<?php echo sanitize_title_with_dashes($title);?>"></a>
					<div class="section">
						<?php if($title):?>
							<header><h2><?php echo $title;?></h2></header>
						<?php endif;
						if($copy):?>
							<div class="copy">
								<?php echo $copy;?>
							</div><!--.copy-->
						<?php endif;
						if($list):?>
							<div class="list">
								<?php echo $list;?>
							</div><!--.list-->
						<?php endif;
						if($button_link&&$button_text):?>
							<div class="<?php if(!get_the_content()): echo "button-wrapper-center"; else: echo "button-wrapper"; endif;?>">
								<a class="button" href="<?php echo $button_link;?>"><?php echo $button_text;?></a>
							</div>
						<?php endif;?>
						<div class="clearfix"></div>
						<?php if($flexslider):?>
							<div class="flexslider">
								<ul class="slides">
									<?php for ($i = 0; $i< count($flexslider) ; $i++ ):
									$row = $flexslider[$i]; ?>
										<?php if ( strcmp( $row['video_or_image'], "video" ) === 0 && $row['video'] ): ?>
											<li>
												<div class="iframe-wrapper <?php echo $row['mobile_image']?'yes-mobile':'no-mobile';?>"
												<?php if($row['mobile_image']):
													echo 'style="background-image: url('.$row['mobile_image']['url'].');"';
												endif;?>>
													<?php if($row['link']):?>
														<a href="<?php echo $row['link']; ?>" <?php if ( $row['target'] ):echo 'target="_blank"'; endif; ?>></a>
													<?php endif;?>
														<iframe class="desktop" src="<?php echo $row['video']; ?>" webkitallowfullscreen mozallowfullscreen allowfullscreen="true"
																frameborder="0"></iframe>
														<?php if($row['mobile_image']):?>
															<img class="mobile <?php if($i!==0&&$i!==1) echo 'lazy';?>" <?php if($i!==0&&$i!==1) echo 'data-';?>src="<?php echo $row['mobile_image']['url']; ?>"
																	alt="<?php echo $row['mobile_image']['alt']; ?>">
														<?php endif;?> 
												</div><!--.iframe-wrapper-->
											</li>
										<?php elseif ( strcmp( $row['video_or_image'], "image" ) === 0 && $row['image'] ): ?>
											<li>
												<div class="image-wrapper <?php echo $row['mobile_image']?'yes-mobile':'no-mobile';?>"
													style="background-image: url(<?php if($row['mobile_image']):
														echo $row['mobile_image']['url'];
													else:
														echo $row['image']['url'];
													endif;?>);">
													<?php if($row['link']):?>
														<a href="<?php echo $row['link']; ?>" <?php if ( $row['target'] ):echo 'target="_blank"'; endif; ?>>
													<?php endif;?>
															<img class="desktop <?php if($i!==0&&$i!==1) echo 'lazy';?>" <?php if($i!==0&&$i!==1) echo 'data-';?>src="<?php echo $row['image']['url']; ?>"
															alt="<?php echo $row['image']['alt']; ?>">
															<?php if($row['mobile_image']):?>
																<img class="mobile <?php if($i!==0&&$i!==1) echo 'lazy';?>" <?php if($i!==0&&$i!==1) echo 'data-';?>src="<?php echo $row['mobile_image']['url']; ?>"
																	alt="<?php echo $row['mobile_image']['alt']; ?>">
															<?php endif;?>
													<?php if($row['link']):?>
														</a>
													<?php endif;?>
												</div><!--.image-wrapper-->
											</li>
										<?php endif; ?>
									<?php endfor; ?>
								</ul>
							</div><!--.flexslider-->
						<?php endif;?>
					</div><!--.section-->
				<?php endforeach;?>
			</div><!--.section-wrapper-->
		<?php endif;?>
	</article>
<?php } //end of if have posts ?>
<?php get_footer('page'); 
?>