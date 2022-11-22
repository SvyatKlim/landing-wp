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
<section class="booking container container-small pb-100 d-flex-column">
    <h2 class="booking__title"><?php echo esc_attr($args['title']); ?></h2>
    <div class="booking__text description pb-30"><?php echo $args['description']; ?></div>
    <?php if (!empty($args['steps'])) { ?>
        <?php foreach ($args['steps'] as $key => $step) { ?>
            <div class="booking__item">
                <h3 class="booking__item__title">
                <span class="booking__item__num"> <?php echo $key + 1; ?></span>
                    <?php echo esc_attr($step["title"]); ?>
                </h3>
                <div class="booking__item__description "><?php echo $args['description']; ?></div>
            </div>
        <?php }
    } ?>
</section>
