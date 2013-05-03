<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage Kris Allen
 */
?>

	<article id="post-<?php the_ID(); ?>" class="span12 story" role="article" itemscope itemtype="http://schema.org/BlogPosting">
	
		<a href="#" class="img"><div class="span12 media fitvids"><?php the_post_format_video(); ?></div></a>
	
		<section class="post-text span8">
		
				<h3 class="entry-title single-title" itemprop="headline"><a href="<?php the_permalink(); ?>"<?php the_title(); ?></a></h3>
			
			<div class="divinder"></div>
			
			<section class="entry-content clearfix" itemprop="articleBody">
				<?php the_content(); ?>
			</section> <!-- end article section -->
	
			<footer class="article-footer">
					<div>
						<span><time><?php echo get_the_time('j'); ?></time></span> <?php echo get_the_time('M'); ?>
					</div>
					
					<div>
						<a href="#" class="facebook">F</a>
					</div>
					
					<div>
						<a href="#" class="twiter">T</a>
					</div>
					
					<div>
						<a href="#" class="google">G</a>
					</div>
					
					<div>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More</a> &rarr;
					</div>		
		
			</footer> <!-- end article footer -->
			
		</section>

	</article> <!-- end article -->
		