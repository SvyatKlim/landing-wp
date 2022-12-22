<?php
$args = wp_parse_args(
    $args,
    array(
        'title' => __('LIST BEST CASINOS ONLINE', 'bcasino'),
        'description' => "
             There are many variations of passages of Lorem Ipsum available,
             but the majority have suffered alteration in some form, by injected humour,
             or randomised words which don't look even slightly believable. If you are going to use a passage of ",
        'link_color' => "violet",
    ),
);
?>
<section class="intro pt-after-header pb-60 violet-bg">
    <div class="container intro__wrapper">
        <div class="intro__left">
            <h1 class="title"><?php echo esc_attr($args['title']); ?></h1>
            <p class="intro__left__text description"><?php echo esc_attr($args['description']); ?></p>
            <?php if (!empty($args['link']['url'])) { ?>
                <a class="btn <?php echo 'btn-' . $args['link_color']; ?>"
                   href="<?php echo esc_url($args['link']['url']); ?>"
                   target="<?php echo $args['link']['target']; ?>">
                    <?php echo esc_attr($args['link']['title']); ?>
                </a>
            <?php }
            if (!empty($args['tags'])) { ?>
                <div class="tag__wrapper intro__tags">
                    <?php foreach ($args['tags'] as $tag) { ?>
                        <span class="tag"><?php echo esc_attr($tag["tag"]); ?></span>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php if (!empty($args['image'])) { ?>
            <div class="intro__right">
                <picture class="d-flex intro__right__image">
                    <img src="<?php echo esc_url($args['image']['url']); ?>"
                         type="<?php echo esc_attr($args['image']['mime_type']); ?>"
                         alt="<?php echo esc_attr($args['image']['alt']); ?>">
                </picture>
            </div>
        <?php } ?>
    </div>
</section>
