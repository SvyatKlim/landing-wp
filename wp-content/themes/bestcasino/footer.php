<?php
/**
 * The template for displaying the footer
 *
 * Contains footer section and the closing of the .main__inner div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>

</main>
<footer class="footer">

    <?php $form_group = get_field('contact_form', 'options');
    $form = $form_group['form'];

    if (!empty($form) && shortcode_exists('contact-form-7')) { ?>
        <div class="footer__form">
            <div class="container d-flex-column-center">
                <h3 class="footer__form__title"><?php echo esc_attr($form_group['title']); ?></h3>
                <?php echo do_shortcode('[contact-form-7 id="' . $form->ID . '"]'); ?>
            </div>

        </div>
    <?php } ?>


    <?php $partners = get_field('partners_list', 'options');
    if ($partners) { ?>
        <div class="footer__partners">
            <div class="container d-flex footer__partners__inner">
                <?php foreach ($partners as $partner) {
                    $link = $partner['link'];
                    $icon = $partner['icon'];
                    if ($link && $icon) { ?>
                        <a class="footer__partners__item" href="<?php echo esc_url($link['url']); ?>"
                           title="<?php echo esc_attr($link['title']); ?>"
                           target="<?php echo esc_attr($link['target']); ?>">
                            <img src="<?php echo esc_url($icon['url']); ?>"
                                 alt=""<?php echo esc_attr($link['title']); ?>">
                        </a>
                    <?php }
                } ?>
            </div>
        </div>
    <?php } ?>

    <nav class="footer__nav container pb-30">
        <?php
        $args = array(
            'walker' => new Footer_Walker(),
            'container' => false,
            'menu_class' => 'footer__nav__list',
            'theme_location' => 'footer-menu',
            'fallback_cb' => false
        );

        wp_nav_menu($args);
        ?>

        <?php $contacts = get_field('general_contacts', 'options');
        $phone = $contacts['phone'];
        $email = $contacts['email'];
        if (!empty($phone) || !empty($email)) { ?>
            <div class="footer__contact d-flex-column">
                <p class="h4"><?php echo esc_attr($contacts['contacts_title']); ?></p>
                <?php if (!empty($phone)) { ?>
                    <a class="footer__nav__link"
                       href="tel:<?php echo str_replace(' ', '', $phone); ?>"><?php echo esc_attr($phone); ?></a>
                <?php }
                if (!empty($email)) { ?>
                    <a class="footer__nav__link"
                       href="mailto:<?php echo trim($email); ?>"><?php echo esc_attr($email); ?></a>
                <?php } ?>
            </div>
        <?php } ?>

        <?php $footer_info = get_field('footer_info', 'options');
        $title = $footer_info['title'];
        $description = $footer_info['description']; ?>

        <div class="footer__info d-flex-column">
            <?php if (!empty($title)) { ?>
                <p class="h4"><?php echo esc_attr($title); ?></p>
            <?php }
            if (!empty($description)) { ?>
                <div class="footer__info__content">
                    <?php echo $description; ?>
                </div>
            <?php }
            $socials = get_field('contacts', 'options');
            if (!empty($socials)) { ?>
                <div class="footer__social d-flex">
                    <?php foreach ($socials as $key => $item) {
                        if (!empty($item['link']) && !empty($item['icon'])) { ?>
                            <a href="<?php echo esc_attr($item['link']['url']); ?>" class="footer__social__link"
                               title="<?php echo $item['link']['title']; ?>" rel="nofollow">
                                <?php echo file_get_contents($item['icon']['url']); ?>
                            </a>
                        <?php }
                    } ?>
                </div>
            <?php } ?>

        </div>

    </nav>

    <div class="separator container"></div>
    <div class="trademark pt-30 container">
        <p><?php echo esc_attr(get_field('trademark', 'options')) ?></p>
    </div>

    <?php wp_footer(); ?>

</footer>
</div>
</body>
</html>