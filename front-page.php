<!--frontpage-->
<?php get_header(); ?>
			<div id="content">

				<div id="inner-content" class="wrap">

						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content " itemprop="articleBody">
									<?php

									$images = get_field('gallery', 'option');
									$rand = array_rand($images, 1);

									if( $images ): ?>
										<div class="quote_image" style="background-image: url('<?php echo esc_url($images[$rand]['sizes']['quote_image']); ?>');height:500px;width:100%;">
											<div class="quote_border"></div>
											<div class="quote_container <?php echo $images[$rand]['alt']; ?>">
												<div class="quote_body">"<?php echo $images[$rand]['caption']; ?>"</div>
												<div class="quote_attribution"><?php echo $images[$rand]['title']; ?></div>
											</div>
										</div>
									<?php endif; ?>

								</section>

							</article>

							<?php endwhile; else : endif; ?>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
