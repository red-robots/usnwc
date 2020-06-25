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