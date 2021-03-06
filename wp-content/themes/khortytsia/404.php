<?php get_header(); ?>

    <section class="main_desk_section main_desk_full_section"
             style="background-image: url(<?= get_theme_file_uri('images/main_desk_bg.jpg') ?>)">
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
                                    <li class="breadcrumb-item active" aria-current="page">404</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="main_desk_other_title">
                            <h1>
                                404...
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="thank_you_wrap mt-3">
                        <p><?= __('Такої сторінки не існує'); ?></p>
                        <a href="<?= pll_home_url(); ?>" class="btn btn-secondary"><?= __('На Головну'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer('secondary');
