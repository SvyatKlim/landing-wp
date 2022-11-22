<?php
$args = wp_parse_args(
    $args,
    array(
        'title' => __('Something Title', 'bcasino'),
        'description' => "
             There are many variations of passages of Lorem Ipsum available,
             but the majority have suffered alteration in some form, by injected humour,
             or randomised words which don't look even slightly believable. If you are going to use a passage of ",
    ),
);
?>
<section class="booking container container-small pb-30 d-flex-column">
    <h2 class="booking__title"><?php echo esc_attr($args['title']); ?></h2>
    <div class="booking__text description pb-30"><?php echo $args['description']; ?></div>
    <?php if (!empty($args['booking'])) { ?>
    <div class="booking__items">
        <h3 class="booking__items__title"><?php echo esc_attr($args['booking']["title"]); ?></h3>
        <div class="booking__items__inner">
            <?php foreach ($args['booking']['items'] as $benefit) { ?>
                <span class="tag tag-increased booking__item"><?php echo esc_attr($benefit["name"]); ?></span>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</section>
