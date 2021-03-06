<?php
/*
Template Name: News
Template Post Type: page
*/

get_header();
?>
    <section class="main_desk_section main_desk_other_section"
             style="background-image: url(<?= get_the_post_thumbnail_url(); ?>)">
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

<?php
switch (pll_current_language()) {
	case 'uk' :
		$cat = 'novini';
		break;
	case 'ru':
		$cat = 'novosti';
		break;
	default :
		$cat = 'news';
}
?>

    <posts category="<?= $cat ?>"
           button-text="<?= __('Більше новин'); ?>"></posts>

<?php get_footer();
