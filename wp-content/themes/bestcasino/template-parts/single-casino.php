<?php

$args = wp_parse_args(
    $args,
    array(
        'index' => 1,
));

$image = get_field('image', $post->ID);
$link = get_field('link', $post->ID);
$link_color = get_field('link_color', $post->ID);
$deposit = get_field('deposit', $post->ID);
$tags = wp_get_object_terms($post->ID, 'casino-tag');
?>

<div class="top-list__item">
    <div class="top-list__item__num">
        <?php echo '#' . $args['index']; ?>
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