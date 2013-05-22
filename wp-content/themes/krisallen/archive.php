<?php get_header(); ?>
			
			<section id="archive" class="container">

				<div class="archive row-fluid">
				
					    <?php if (is_category()) { ?>
				
							<article class="span4">
								<a href="#" class="img"><div style="background-image:url(http://distilleryimage0.s3.amazonaws.com/d85e01c86f2e11e2b92122000a9e0727_7.jpg)"></div></a>
								<section>
									<h3><?php _e("", "bonestheme"); ?></span> <?php single_cat_title(); ?></h3>
									<p><?php echo category_description(); ?></p>
								</section>
									
								<footer class="article-footer">
									<div>
										<span><time><?php echo get_the_time('j'); ?></time></span> <?php echo get_the_time('M'); ?>
									</div>
									
									<div>
										<a href="http://www.facebook.com/sharer.php?u=http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="facebook"><i class="icon-facebook"></i></a>
									</div>
									
									<div>
										<a href="https://twitter.com/share?status=Currently reading http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?> via @KrisAllen" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="twiter"><i class="icon-twitter"></i></a>
									</div>
									
									<div>
										<a href="https://plus.google.com/share?url=http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="google"><i class="icon-google-plus"></i></a>
									</div>
									
									<div>
										<a href="#" class="read-more">Read More</a> &rarr;
									</div>		
						
							</footer> <!-- end article footer -->
							</article>
					    
					    <?php } elseif (is_tag()) { ?> 
						    <h1 class="archive-title h2">
							    <span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
						    </h1>
					    
					    <?php } elseif (is_author()) { 
					    	global $post;
					    	$author_id = $post->post_author;
					    ?>
						    <h1 class="archive-title h2">

						    	<span><?php _e("Posts By:", "bonestheme"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>

						    </h1>
					    <?php } elseif (is_day()) { ?>
						    <h1 class="archive-title h2">
	    						<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						    </h1>
		
		    			<?php } elseif (is_month()) { ?>
			    		    <h1 class="archive-title h2">
				    	    	<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
					        </h1>
					
					    <?php } elseif (is_year()) { ?>
					        <h1 class="archive-title h2">
					    	    <span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
					        </h1>
					    <?php } ?>

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					    
							<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); $url = $thumb['0']; ?>
							<article class="span4">
								<a href="<?php the_permalink(); ?>" class="img"><div style="background-image:url(<?php echo $url; ?>)"></div></a>
								<section>
									<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
									<p><?php the_excerpt(); ?></p>
								</section>
									
								<footer class="article-footer">
									<div>
										<span><time><?php echo get_the_time('j'); ?></time></span> <?php echo get_the_time('M'); ?>
									</div>
									
									<div>
										<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="facebook"><i class="icon-facebook"></i></a>
									</div>
									
									<div>
										<a href="https://twitter.com/share?status=<?php rawurlencode('Currently reading ' . the_permalink(false) . ' via @KrisAllen'); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="twiter"><i class="icon-twitter"></i></a>
									</div>
									
									<div>
										<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'width=575,height=350,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;" class="google"><i class="icon-google-plus"></i></a>
									</div>
									
									<div>
										<a href="<?php the_permalink(); ?>" class="read-more">Read More</a> &rarr;
									</div>		
						
							</footer> <!-- end article footer -->
								
							</article>
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('bones_page_navi')) { ?>
						        <?php bones_page_navi(); ?>
					        <?php } else { ?>
						        <nav class="wp-prev-next">
							        <ul class="clearfix">
								        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
								        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
							        </ul>
					    	    </nav>
					        <?php } ?>
					
					    <?php else : ?>
					
    					    <article id="post-not-found" class="hentry clearfix span12">
    						    <header class="article-header">
    							    <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
    					    	</header>
    						    <section class="entry-content">
    							    <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
        						</section>
    	    					<footer class="article-footer">
    		    				    <p><?php _e("This is the error message in the archive.php template.", "bonestheme"); ?></p>
    			    			</footer>
    				    	</article>
					
					    <?php endif; ?>
			

				</div>
				
			</section>
			
			<section id="social">

				<div class="facebook">
					<div class="embed">
						<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fkrisallen&width=350&height=258&show_faces=true&colorscheme=light&stream=false&border_color=%23fff&header=false&appId=258628480941047" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:100%;" allowTransparency="true"></iframe>
					</div>
				</div>

				<div class="instagram">
					<div class="embed igfeed">
						<a href="#" class="instanext"><div class="next"></div></a>
						<div class="scrollarea">
						<?php 
							$transient = get_transient('instagramz');
							if ( empty( $transient ) ) {
								// declare the variables for instagram 
								$userid = 7924810;
								$access_token = '21611949.200a12c.deaad557dfee46ca8c28ec49c0c97608';
								$count = 6;
								
								// Call two WordPress functions to receive data and to parse the body
								$response = wp_remote_retrieve_body( wp_remote_get( "https://api.instagram.com/v1/users/7924810/media/recent/?access_token=21611949.200a12c.deaad557dfee46ca8c28ec49c0c97608&count=$count" ) );
								
								// Call json_decode function that will return object with data
								$data = json_decode($response, true);
								$html_output = '';
								
								foreach ( $data["data"] as $value ) {
									$html_output .= '<a href="'.$value['link'].'" target="_blank">';
									$html_output .= '<article>';
									$html_output .= '<img src="' .$value['images']['standard_resolution']['url']. '"/>';
									$html_output .= '<p>' .$value['caption']['text']. '</p>';
									$html_output .= '</article>';
									$html_output .= '</a>';
								}						
								echo $html_output;
								
								set_transient('instagramz', $html_output, 60*60*4 );
								
							} else {
								echo $transient;
							}
						?>
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
				<?php 
					while ( $query->have_posts() ) : $query->the_post(); 
					global $post;
					$venue = get_post_meta( $post->ID, '_ka_tour_text', true );
					$city = get_post_meta( $post->ID, '_ka_tour_city', true );
					$state = get_post_meta( $post->ID, '_ka_tour_state', true );
					$the_date = get_post_meta( $post->ID, '_ka_tour_date', true );
					$the_time = get_post_meta( $post->ID, '_ka_tour_time', true );
					$the_price = get_post_meta( $post->ID, '_ka_tour_cost', true );
				?>
				<section class="span3">
					<h3><?php echo $venue; ?></h3>
					<h4><?php echo $city; ?>, <?php echo $state; ?></h4>

					<p><time datetime="<?php echo $the_date; ?>"><?php echo date( 'F j, Y', $the_date ); ?></time> <span>&mdash;</span> <?php echo $the_time; ?></p>
				</section>
				<?php endwhile; ?>				
			<?php endif; ?>
			
			</section>		

<?php get_footer(); ?>
