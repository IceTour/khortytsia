<div class="modal modal-feedback fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="form_modal_content">
                <div class="modal_close form_modal_close">
                    <span data-dismiss="modal">+</span>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-6">
                            <div class="form_modal_subtitle">
                                <p><?= __('Хочете побачити все своїми очами?'); ?></p>
                            </div>
                            <div class="form_modal_title">
                                <h2><?= __('Замовте екскурсію'); ?></h2>
                            </div>
                            <div class="contact_row d-block">
                                <div class="contact_row__item mb-2">
                                    <a href="tel: <?= get_theme_mod('phone1'); ?>"><?= get_theme_mod('phone1'); ?>,</a>
                                </div>
                                <div class="contact_row__item">
                                    <a href="tel: <?= get_theme_mod('phone2'); ?>"><?= get_theme_mod('phone2'); ?></a>
                                </div>
                            </div>
<!--                            <div class="form_modal_wrap">-->
<!---->
<!--                                --><?php
//                                if (pll_current_language('slug') == 'en')
//                                    echo  do_shortcode('[contact-form-7 id="509" title="Заказ экскурсии анг"]');
//                                elseif ((pll_current_language('slug') == 'ru'))
//                                    echo do_shortcode('[contact-form-7 id="510" title="Заказ экскурсии ру"]');
//                                else
//                                    echo do_shortcode('[contact-form-7 id="417" title="Заказ эксурсии"]');
//                                ?>
<!---->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>