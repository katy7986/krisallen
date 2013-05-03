<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Kris Allen
 */
?>

	<article id="post-not-found" class="span12 story">
		<a href="<?php bloginfo('url'); ?>"><div class="span12 media"></div></a>
		<h3><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h3>
		<div class="divider"></div>
		<section class="entry-content">
			<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
		</section>
		<footer class="article-footer">
		    <p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
		</footer>
	</article>