<!--frontpage-->
<?php get_header(); ?>
			<div id="content">

				<div id="inner-content" class="wrap">

						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content " itemprop="articleBody">
									<?php

									$images = get_field('quote_gallery', 'option');
									$rand = array_rand($images, 1);

									if( $images ): ?>
										<div class="quote_image" style="background-image: url('<?php echo esc_url($images[$rand]['sizes']['quote_image']); ?>');height:500px;width:100%;">
											<?php if ($images[$rand]['caption']) : ?>
												<div class="quote_border"></div>
												<div class="quote_container <?php echo $images[$rand]['alt']; ?>">
													<div class="quote_body">"<?php echo $images[$rand]['caption']; ?>"</div>
													<div class="quote_attribution"><?php echo $images[$rand]['title']; ?></div>
												</div>
												<?php endif; ?>
										</div>
									<?php endif; ?>

								</section>
								<section class="what-we-do">
									<h2><?php the_field('what_we_do_header', 'option'); ?></h2>
									<?php if( have_rows('company_offerings', 'option') ): ?>
									<ul>
										<?php while ( have_rows('company_offerings', 'option') ) : the_row(); ?>
										<li>
											<div class="icon">
												<?php $image = get_sub_field('icon');
													if( !empty($image) ):
													// vars
													$url = $image['url'];
													$title = $image['title'];
													$alt = $image['alt'];

													// thumbnail
													$size = 'medium_square';
													$thumb = $image['sizes'][ $size ];
													$width = $image['sizes'][ $size . '-width' ];
													$height = $image['sizes'][ $size . '-height' ];

													 ?>
													<img src="<?php echo $thumb; ?>" />
												<?php endif; ?>
											</div>
											<div class="content">
												<h3><?php the_sub_field('header'); ?></h3>
												<p><?php the_sub_field('content'); ?></p>
											</div>
										</li>
										<?php endwhile; ?>
									</ul>
									<?php endif; ?>
									<?php $link = get_field('call_to_action', 'option');
										if( $link ):
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<div class="center-content">
										<a class="accent-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
									</div>
									<?php endif; ?>
								</section>
								<?php if(get_field('impact_stats_header', 'option') ) : ?>
									<section class="impact-charts">
										<h2><?php the_field('impact_stats_header', 'option'); ?></h2>
										<?php if( have_rows('impact_charts', 'option') ): ?>
										<ul>
											<?php while ( have_rows('impact_charts', 'option') ) : the_row(); ?>
											<li>
												<?php
													$image = get_sub_field('chart_graphic');
													$size = 'medium_square';

													  if( $image ) {
													  	echo wp_get_attachment_image( $image, $size );
													  }

													?>
												<div class="impact-description"><?php the_sub_field('caption');?></div>
											</li>
											<?php endwhile; ?>
										</ul>
									<?php endif; ?>
									</section>
								<?php endif; ?>
							</article>
						</main>
				</div>
				<section class="contact-section">
					<h2><?php the_field('contact_section_header', 'option'); ?></h2>
					<div class="contact-section__container">
						<div class="contact-section__form">
							<p class="contact-section__form_header"><?php the_field('contact_section_form_header', 'option'); ?></p>
							<?php
								$form = get_field('contact_form', 'option');
								echo do_shortcode($form);
							?>
						</div>
					</div>
				</section>
				<?php endwhile; else : endif; ?>

			</div>


<?php get_footer(); ?>
