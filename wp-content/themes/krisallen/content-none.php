<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Kris Allen
 */
?>

	<?php if( is_page('tour') ) : ?>
	
				<section id="post" class="container">
				
					<div class="row">
						<article id="post-<?php the_ID(); ?>" class="span12 story" role="article" itemscope itemtype="http://schema.org/BlogPosting">	
							<section class="post-text span8">
								<h3 class="entry-title single-title"><?php _e("No tour days are available at this time", "bonestheme"); ?></h3>
								<div class="divider"></div>
								<section class="entry-content clearfix">
									<p><?php _e("To tour dates are available at this time. Please check back soon for updates!", "bonestheme"); ?></p>
								</section>
								<footer class="article-footer">
								    <p><?php _e("We will be announcing more dates soon!.", "bonestheme"); ?></p>
								</footer>
							</section>
						</article>		
					</div>
						
				</section>	
				
	<?php else : ?>

			<section id="post" class="container">
			
				<div class="row">
					<article id="post-<?php the_ID(); ?>" class="span12 story" role="article" itemscope itemtype="http://schema.org/BlogPosting">	
						<section class="post-text span8">
							<h3 class="entry-title single-title"><?php _e("Article Not Found", "bonestheme"); ?></h3>
							<div class="divider"></div>
							<section class="entry-content clearfix">
								<p><?php _e("The article you were looking for was not found, but maybe try looking again!", "bonestheme"); ?></p>
							</section>
							<footer class="article-footer">
							    <p><?php _e("This is the error message.", "bonestheme"); ?></p>
							</footer>
						</section>
					</article>		
				</div>
					
			</section>	
	<?php endif; ?>