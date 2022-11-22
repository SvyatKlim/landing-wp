<?php
$section_title = get_field('casinos_review_title', 'option');
$top_list_cat = get_terms([
    'post_type' => 'casino',
    'taxonomy' => 'casino-cat',
    'hide_empty' => true,
    'parent' => 0,
]);
?>

<section class="top-list__wrapper container d-flex-column pt-60 pb-60">
    <h1 class="top-list__title text-center">
        <?php echo !empty($section_title) ? esc_attr($section_title) : __('List of Top 5 Casinos', 'bcasino'); ?>
    </h1>
    <div class="top-list">
        <ul class="d-flex top-list__cat">
            <?php foreach ($top_list_cat as $key => $cat) {
                $thumbnail = get_field('icon', $cat->taxonomy . '_' . $cat->term_id);
                ?>
                <li class="top-list__cat__item tab" data-cat="<?php echo $cat->slug; ?>">
                    <a class="top-list__cat__name h5 tab-link js-files-tab-link <?php echo $key === 0 ? 'active' : ''; ?>"
                       data-slug="<?php echo $cat->slug; ?>">
                        <?php echo esc_attr($cat->name); ?>
                        <picture class="d-flex tab-link__img">
                            <img src="<?php echo esc_url($thumbnail['url']); ?>"
                                 alt="<?php echo esc_attr($thumbnail['alt']); ?>"
                                 type="<?php echo $thumbnail['mime_type']; ?>">
                        </picture>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <div class="top-list__items">
            <?php $cat_items = new WP_Query([
                'post_type' => 'casino',
                'post_status' => 'publish',
                'paged' => -1,
                'order' => 'DESC',
                'meta_key' => '_kksr_avg', //metabox with average rating created by kksr plugin
                'orderby' => 'meta_value_num',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'casino-cat',
                        'field' => 'term_id',
                        'terms' => $top_list_cat['0']->term_id,
                    ),
                ),
            ]);
            if ($cat_items->have_posts()) {
                $number = 1;

                while ($cat_items->have_posts()) {
                    $cat_items->the_post();
                    $image = get_field('image', $post->ID);
                    $link = get_field('link', $post->ID);
                    $link_color = get_field('link_color', $post->ID);
                    $deposit = get_field('deposit', $post->ID);
                    $tags = wp_get_object_terms($post->ID, 'casino-tag');
                    ?>

                    <div class="top-list__item">
                        <div class="top-list__item__num">
                            <?php echo '#' . $number; ?>
                        </div>
                        <figure class="top-list__item__image">
                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                 type="<?php echo esc_attr($image['mime_type']); ?>">

                            <figcaption class="image-title">
                                <?php the_title() ?>
                            </figcaption>
                        </figure>
                        <?php if (!empty($tags)) { ?>
                            <div class="top-list__tags">
                                <?php foreach ($tags as $tag) { ?>
                                    <span class="tag tag-increased"><?php echo esc_attr($tag->name); ?></span>
                                <?php } ?>
                            </div>

                        <?php }
                        if (function_exists('kk_star_ratings')) {
                            echo kk_star_ratings($post->ID);
                        } ?>

                        <div class="top-list__link__wrapper">
                            <a  href="<?php echo esc_url($link['url']); ?>"
                                target="<?php echo $link['target']; ?>"
                                class=" btn top-list__link <?php echo 'btn-' . $link_color; ?>"
                                rel="nofollow">
                                <?php echo esc_attr($link['title']); ?>
                                <span class="arrow-right">
                                    <?php echo file_get_contents(_THEME_URI . '/assets/images/svg/arrow-right.svg') ?>
                                </span>
                            </a>
                        </div>

                        <div class="top-list__deposit d-flex-column-center">
                            <p><?php echo __( 'Min. deposit' ,'bcasino')?></p>
                            <p class="top-list__deposit__num">$<?php echo esc_attr($deposit) ?></p>
                        </div>
                    </div>
                    <?php
                    $number++;
                }
            } else {
                echo '<p>' . __('No casinos in rating', 'bcasino') . '</p>';
            }

            wp_reset_postdata(); ?>
        </div>
    </div>

</section>