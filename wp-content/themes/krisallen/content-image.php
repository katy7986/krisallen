<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Kris Allen
 */
?>

	<article id="post-<?php the_ID(); ?>" class="span12 story" role="article" itemscope itemtype="http://schema.org/BlogPosting">
		
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $url = $thumb['0']; ?>
		<a href="#" class="img"><div class="span12 media photo" style="background-image:url('<?php echo $url; ?>')"></div></a>
	
		<section class="post-text span8">
		
			<h3 class="entry-title single-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			
			<div class="divider"></div>
			
			<section class="entry-content clearfix" itemprop="articleBody">
				<?php the_content(); ?>
			</section> <!-- end article section -->
	
			<footer class="article-footer">
					<div>
						<span><time><?php echo get_the_time('j'); ?></time></span> <?php echo get_the_time('M'); ?>
					</div>
							
					<div>
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="facebook"><i class="icon-facebook"></i></a>
					</div>
					
					<div>
						<a href="https://twitter.com/share?status=<?php rawurlencode('Currently reading ' . the_permalink(false)); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="twiter"><i class="icon-twitter"></i></a>
					</div>
					
					<div>
						<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="google"><i class="icon-google-plus"></i></a>
					</div>
		
			</footer> <!-- end article footer -->
			
		</section>
		
		<section class="post-social span4">
			<div class="row">
				<a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>" class="prev-post" data-toggle="tooltip" title="Previous Post" rel="tooltip"><i class="icon-angle-left icon-white icon-2x"></i></a>
				<a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>" class="next-post" data-toggle="tooltip" title="Next Post" rel="tooltip"><i class="icon-angle-right icon-white icon-2x"></i></a>
			</div>
			<div class="row">
				<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="fb"><i class="icon-facebook icon-white icon-2x"></i></a>
				<a href="https://twitter.com/share?status=<?php rawurlencode('Currently reading ' . the_permalink(false)); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="tw"><i class="icon-twitter icon-white icon-2x"></i></a>
			</div>
		</section>

	</article> <!-- end article -->