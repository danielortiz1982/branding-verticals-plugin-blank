<?php get_header(); ?>
<main class="site-content">
	<div class="container">
		<?php if(have_posts() ) : while(have_posts() ) : the_post(); ?>
		<div class="<?php post_class(); ?>">
			<h2 class="the-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<div class="post-thumbnail"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" /></a></div>
			<div class="the-content"><?php the_content(); ?></div>
			<div class="sample-meta">
				<p>Input: <?php echo get_post_meta(get_the_ID(), 'sample_input', true); ?></p>
				<p>Select: <?php echo get_post_meta(get_the_ID(), 'sample_select', true); ?></p>
				<p>Radio: <?php echo get_post_meta(get_the_ID(), 'sample_radio', true); ?></p>
				<p>Textarea: <?php echo get_post_meta(get_the_ID(), 'sample_textarea', true); ?></p>
				<?php $file = get_post_meta(get_the_ID(), 'sample_file_upload', true); ?>
				<p>Click to view file:<br /><a href="<?php echo $file['url']; ?>"><?php echo $file['url']; ?></a></p>
				<p>File Upload:<br /><iframe src="<?php echo $file['url']; ?>"><iframe></p>
			</div>
		</div>
		<?php endwhile ?>
		<?php endif ?>
	</div>
</main>
<?php get_footer(); ?>