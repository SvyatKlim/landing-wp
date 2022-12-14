<?php

/*
 * This file is part of bhittani/kk-star-ratings.
 *
 * (c) Kamal Khan <shout@bhittani.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Bhittani\StarRating\core\functions;

if (! defined('KK_STAR_RATINGS')) {
    http_response_code(404);
    exit();
}

function data(array $payload = []): array
{
    $payload['title'] = esc_html($payload['title'] ?? get_post_field('post_title', $payload['id'] ?? null));

    return filter('payload', $payload);
}
