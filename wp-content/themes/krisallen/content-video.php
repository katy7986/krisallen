<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage Kris Allen
 */
?>
			<?php if( is_front_page() ) : ?>
					<article class="span4">
						<a href="#" class="img"><div class="fitvids"><?php the_post_format_video(); ?></div></a>
						<section>
							<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p><?php the_excerpt(); ?></p>
						</section>
					</article>
			<?php else : ?>
					<article class="span4">
						<a href="#" class="img"><div style="background-image:url(http://distilleryimage8.s3.amazonaws.com/5a1c0f9e719011e2ade722000a1faea4_7.jpg)"></div></a>
						<section >
							<h3><a href="#">Featured Post</a></h3>
							<p>In Wellington Street my brother met a couple of sturdy roughs who had just been rushed out of Fleet Street with still-wet newspapers and staring placards. "Dreadful catastrophe!" they bawled one to the other down Wellington Street.</p>
						</section>
					</article>			
			<?php endif; ?>		