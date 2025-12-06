<?php

if (!defined('WNCMS_THEME_START')) {
    http_response_code(403);
    exit('403 Forbidden');
}

/**
 * parse link description html into structured shorts/longs
 *
 * @param string|null $html
 * @return array{shorts: array, longs: array}
 */
function qixing_parse_description(?string $html): array
{
    if (!$html) {
        return ['shorts' => [], 'longs' => []];
    }

    // convert <br> to new lines
    $plain = preg_replace('/<br\s*\/?>/i', "\r\n", $html);

    // remove html tags
    $plain = strip_tags($plain);

    // normalize separator
    $plain = preg_replace("/\r?\n\s*---\s*\r?\n/", "\r\n---\r\n", $plain);

    // trim
    $plain = trim($plain);

    // split into two blocks
    [$shortsRaw, $longsRaw] = array_pad(explode("\r\n---\r\n", $plain), 2, '');

    // convert to arrays
    $shorts = array_values(array_filter(array_map('trim', explode("\r\n", $shortsRaw)), fn($v) => $v !== ''));
    $longs = array_values(array_filter(array_map('trim', explode("\r\n", $longsRaw)), fn($v) => $v !== ''));

    return [
        'shorts' => $shorts,
        'longs'  => $longs,
    ];
}
