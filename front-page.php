<!--frontpage-->
<?php get_header(); ?>
<div id="content">
	<div id="inner-content">
			<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<?php if (have_rows('front_page_content', 'option') ) : ?>
					<?php while (have_rows('front_page_content', 'option') ) : the_row(); ?>
						<!-- Full Width Content -->
						<?php if ( get_row_layout() == 'full_width_content_area') : ?>
							<section id="<?php $page_link = sanitize_title_for_query( get_sub_field('layout_title') ); echo esc_attr( $page_link ); ?>">
							<?php if (get_sub_field('section_header')) : ?>
							<h2 class="section-header"><?php the_sub_field('section_header'); ?></h2>
							<?php endif; ?>
							<div class="full_width_content <?php if (get_sub_field('show_background_color') ) { ?> <?php if (get_sub_field('show_borders') ) { ?> full_width_content_borders <?php } ?>  full_width_content_background-color<?php } ?>" <?php if (get_sub_field('show_background_color') ) { ?>style="background-color:<?php the_sub_field('background_color'); ?>" <?php } ?>>
								<div class="wrap">
									<?php the_sub_field('content'); ?>
								</div>
							</div>
						</section>
						<!-- end Full Width Content -->
						<!-- Charts -->
							<?php elseif ( get_row_layout() == 'charts') : ?>
							<?php $chart_settings = get_sub_field('chart_settings'); ?>
							<section class="impact-charts wrap" id="<?php $page_link = sanitize_title_for_query( get_sub_field('layout_title') ); echo esc_attr( $page_link ); ?>">
								<?php if (get_sub_field('section_header')) : ?>
									<h2 class="section-header"><?php the_sub_field('section_header'); ?></h2>
								<?php endif; ?>
								<?php if(have_rows('chart', 'option') ) : ?>
									<ul class="<?php echo $chart_settings['orientation'];?> <?php echo $chart_settings['charts_per_line']; ?>">
									<?php while(have_rows('chart', 'option') ) : the_row(); ?>
									<li class="chart-<?php the_sub_field('chart_position'); ?>">
										<?php
										$link = get_sub_field('attribution_link');
										if( $link ):
										    $link_url = $link['url'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
										    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
										<?php endif; ?>
											<div class="chart">
												<?php $chart = get_sub_field('chart_image'); echo do_shortcode($chart); ?>
												<div class="percentage"><?php the_sub_field('percentage'); ?>%</div>
											</div>
											<div class="content"><?php the_sub_field('content'); ?></div>
										<?php if( $link ) : ?>
										</a>
										<?php endif; ?>
									</li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</section>
							<!-- end Charts -->
							<!-- Columns -->
						<?php elseif ( get_row_layout() == 'columns') : ?>
						<section class="content-columns wrap" id="<?php $page_link = sanitize_title_for_query( get_sub_field('layout_title') ); echo esc_attr( $page_link ); ?>">
							<?php if (get_sub_field('section_header')) : ?>
								<h2 class="section-header"><?php the_sub_field('section_header'); ?></h2>
							<?php endif; ?>
							<?php if(have_rows('column', 'option') ) : ?>
								<ul>
								<?php while(have_rows('column', 'option') ) : the_row(); ?>
								<li>
									<?php $image = get_sub_field('column_image', 'option');  $size = 'gallery_image'; ?>
									<?php echo wp_get_attachment_image( $image, $size ); ?>

									<?php if(get_sub_field('process_step') ) : ?>
										<div class="process_step" <?php if(get_sub_field('process_color') ) : ?>style="border-color:<?php the_sub_field('process_color');?>"<?php endif; ?>>
											<div class="border">
												<span class="step">step</span>
												<span class="number">
													0<?php the_sub_field('process_step'); ?>
												</span>
											</div>
										</div>
									<?php endif; ?>
									<h3 class="column_header" <?php if(get_sub_field('process_color') ) : ?>style="color:<?php the_sub_field('process_color');?>"<?php endif; ?>><?php the_sub_field('column_header'); ?></h3>
									<div class="content"><?php the_sub_field('content'); ?></div>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</section>
						<!-- end Columns -->
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<!-- Contact -->
				<?php if (have_posts()) : the_post(); ?>
				<section class="contact-section" id="contact-us">
					<h2><?php the_field('contact_section_header', 'option'); ?></h2>
					<div class="contact-section__container" style="background-image: url(<?php the_field('contact_form_background', 'option'); ?>);">
						<div class="contact-section__form">
							<p class="contact-section__form_header"><?php the_field('contact_section_form_header', 'option'); ?></p>
							<?php
								$form = get_field('contact_form', 'option');
								echo do_shortcode($form);
							?>
						</div>
					</div>
				</section>
				<?php endif; ?>
				<!-- end Contact -->
			</main>
	</div>
</div>
<?php get_footer(); ?>
