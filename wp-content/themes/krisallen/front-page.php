<?php get_header(); ?>
			
			<section id="news" class="container">

				<a href="#"><div class="next hidden-phone"></div></a>

				<div class="scrollarea row-fluid">
				<?php if ( have_posts() ) : ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); $url = $thumb['0']; ?>
					<article class="span4">
						<a href="#" class="img"><div style="background-image:url(<?php echo $thumb; ?>)"></div></a>
						<section>
							<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p><?php the_excerpt(); ?></p>
						</section>
					</article>
					<?php endwhile; ?>
		
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>				
				</div>
				
			</section>
			
			<section id="social">

				<div class="facebook">
					<div class="embed">
						<!--iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fkrisallen&amp;width=480&amp;height=395&amp;show_faces=false&amp;colorscheme=light&amp;stream=true&amp;border_color&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:480px; height:395px;" allowTransparency="true"></iframe-->
					</div>
				</div>

				<div class="instagram">
					<div class="embed">
						<a href="#"><div class="next"></div></a>
						<div class="scrollarea">
							<article>
								<img src="http://distilleryimage0.s3.amazonaws.com/fd6043289e7711e282a322000a1f9709_7.jpg"/>
								<p>Thanks Dayton for havin us out. We had an awesome time. Especially with this frog.</p>
							</article>

							<article>
								<img src="http://distilleryimage0.s3.amazonaws.com/61cd3ed69e3e11e293a322000a1f92e9_7.jpg"/>
								<p>You think kids one day will find their dads old CDs and play them. #doubtit</p>
							</article>
						</div>
					</div>
				</div>

				<div class="twitter">
					<div class="embed"></div>
				</div>

			</section>

			<section id="events" class="row-fluid">
			
			<?php
				$args = array(
					'meta_key' => '_ka_tour_date',
					'order' => 'ASC',
					'post_type' => 'tour',
					'orderby' => 'meta_value_num', 
					'meta_query' => array(
					    array(
					        'key' => '_ka_tour_date', // Check the start date field
					        'value' => time(),  
					        'compare' => '>'
					    )
					)
				); 
				$query = new WP_Query( $args ); 
			?>				
			<?php if ( $query->have_posts() ) : ?>
				<?php while( have_posts() : the_post(); ) : ?>
				<section class="span3">
					<h3>Atkinson Room - Frostburg State</h3>
					<h4>Frostburg, Maryland</h4>

					<p>April 6, 2013 <span>&mdash;</span> 10:00pm</p>
				</section>
				<?php endwhile; ?>				
			<?php endif; ?>
			
			</section>		

<?php get_footer(); ?>
