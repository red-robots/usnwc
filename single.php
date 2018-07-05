<?php
/* Single Post Template
 * @since   1.0
 * @alter   2.0
*/
get_header(); ?>

<?php get_sidebar("banner");?>
<?php if(have_posts()){
	the_post(); ?>
	<article class="post">
		<header>
			<h1><?php the_title(); ?></h1>
		</header>		        	        
		<?php the_content(); ?>
   		<?php comments_template(); ?>
   	</article>
<?php } //end of if have posts
get_footer(); 
?>