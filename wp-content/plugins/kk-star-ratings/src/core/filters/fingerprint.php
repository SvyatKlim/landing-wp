<?php

/*
 * This file is part of bhittani/kk-star-ratings.
 *
 * (c) Kamal Khan <shout@bhittani.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Bhittani\StarRating\core\filters;

if (! defined('KK_STAR_RATINGS')) {
    http_response_code(404);
    exit();
}

function fingerprint(?string $fingerprint, int $id, string $slug): string
{
    if (! is_null($fingerprint)) {
        return $fingerprint;
    }

    $ip = $_SERVER['REMOTE_ADDR'];

    if ($httpClientIp = ($_SERVER['HTTP_CLIENT_IP'] ?? null)) {
        $ip = $httpClientIp;
    } elseif ($httpXForwardedFor = ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? null)) {
        $ip = $httpXForwardedFor;
    }

    return md5($ip);
}
