<?php
/*
Template Name: Single post
Template Post Type: page
*/
get_header();

if (have_posts()) :
	while (have_posts()) : the_post();

		$post_type = wp_get_post_categories($post->ID);
		?>

        <section class="main_desk_section main_desk_other_section"
                 style="background-image: url(<?= get_the_post_thumbnail_url('284'); ?>)">
            <div class="desktop_gradient"></div>
            <div class="desktop_gradient desktop_gradient2"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="main_desk_other_wrap">
                            <div class="main_desk_breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                    href="<?= pll_home_url(); ?>"><?= __('Головна'); ?></a></li>
                                        <li class="breadcrumb-item"><a href="#"><?= __('Блог'); ?></a></li>
										<?php if ($post_type[0] === 23): ?>
                                            <li class="breadcrumb-item"><a
                                                        href="<?php the_permalink(284); ?>"><?= get_cat_name(23); ?></a>
                                            </li>
										<?php elseif ($post_type[0] === 27): ?>
                                            <li class="breadcrumb-item"><a
                                                        href="<?php the_permalink(286); ?>"><?= get_cat_name(27); ?></a>
                                            </li>
										<?php endif; ?>
                                        <li class="breadcrumb-item active"
                                            aria-current="page"><?= the_title(); ?></li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="main_desk_other_title">
                                <h1>
									<?= the_title(); ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- news section -->

        <section class="mt_section page_news_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="last_news_item">

							<?php
							$images = get_field('post_gallery');

							if ($images || have_rows('post_video')) :
								?>

                                <div class="news_slider_wrap">
                                    <div class="slider_main">
										<?php
										if (have_rows('post_video')) :
											while (have_rows('post_video')) : the_row(); ?>
                                                <div class="slider_main_item slider_main_item--video">
                                                    <iframe src="<?= get_video_embed(get_sub_field('post_video_link')) ?>"
                                                            frameborder="0" allow="autoplay; encrypted-media"
                                                            allowfullscreen>
                                                    </iframe>
                                                </div>
											<?php
											endwhile;
										endif;
										?>

										<?php
										if ($images) :
											foreach ($images as $image) : ?>
                                                <div class="slider_main_item"
                                                     style="background-image: url(<?= $image['url']; ?>)">
                                                </div>
											<?php
											endforeach;
										endif;
										?>
                                    </div>

                                    <div class="slider_btn slider_btn_prev">
                                        <svg width="7.5" height="12">
                                            <use xlink:href="#left-icon"></use>
                                        </svg>
                                    </div>
                                    <div class="slider_btn slider_btn_next">
                                        <svg width="7.5" height="12">
                                            <use xlink:href="#right-icon"></use>
                                        </svg>
                                    </div>
                                </div>

							<?php endif;
							wp_reset_postdata();
							?>

                            <div class="last_news_item_content_wrap ">
                                <div class="last_news_item_content">
                                    <span><?= get_the_date('j.m.Y'); ?></span>
                                    <h4><?= the_title(); ?></h4>
                                    <p><?= the_content(); ?></p>
                                </div>
                            </div>
                            <div class="last_news_item_ander_content">
                                <p><?= __('Поділитися в соц.мережах'); ?>:</p>
                                <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>">
                                    <svg width="20" height="20">
                                        <use xlink:href="#fb-icon"></use>
                                    </svg>
                                </a>
                                <a href="<?= get_post_meta($post->ID, 'share_instagram', true); ?>">
                                    <svg width="19" height="20">
                                        <use xlink:href="#insta-icon"></use>
                                    </svg>
                                </a>
                                <a href="<?= get_post_meta($post->ID, 'share_youtube', true); ?>">
                                    <svg width="20" height="20">
                                        <use xlink:href="#yt-icon"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

		<?php
		require('template-parts/last-news.php');
	endwhile; endif;
wp_reset_postdata();
get_footer();
