<?php 
/* 
 * Template Name: Virtual Tour
*/

get_header(); ?>

<?php if(have_posts()){
	the_post();?>
	<header class="post">
		<h2><?php echo the_title();?></h2>
	</header>
	<article class="post <?php echo $post->post_name;?>">
		<?php echo the_content();?>
	</article>
<?php }
get_footer(); ?>