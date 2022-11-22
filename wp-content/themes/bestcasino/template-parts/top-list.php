<?php
$section_title = get_field('casinos_review_title', 'option');
$top_list_cat = get_terms([
    'post_type' => 'casino',
    'taxonomy' => 'casino-cat',
    'hide_empty' => true,
    'parent' => 0,
]);
?>

<section class="top-list__wrapper container d-flex-column pt-60 pb-60 js-top-list">
    <h2 class="h1 top-list__title text-center">
        <?php echo !empty($section_title) ? esc_attr($section_title) : __('List of Top 5 Casinos', 'bcasino'); ?>
    </h2>
    <div class="top-list">
        <ul class="d-flex top-list__cat">
            <?php foreach ($top_list_cat as $key => $cat) {
                $thumbnail = get_field('icon', $cat->taxonomy . '_' . $cat->term_id);
                ?>
                <li class="top-list__cat__item tab">
                    <a class="top-list__cat__name h5 tab-link js-tab-link <?php echo $key === 0 ? 'active' : ''; ?>"
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

        <div class="top-list__items js-tab-container">
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
                    echo get_template_part('template-parts\single-casino', null, [
                        'index'=> $number
                    ]);
                    $number++;
                }
            } else {
                echo '<p>' . __('No casinos in rating', 'bcasino') . '</p>';
            }

            wp_reset_postdata(); ?>
        </div>
    </div>

</section>