<?php

function slug_cyr_to_lat($title, $raw_title = null, $context = 'query') {
    if (!is_null($raw_title)) {
        $title = $raw_title;
    }

    $title = str_replace([
        'А', 'Б', 'В', 'Г', 'Д', 'Ђ', 'Е', 'Ж', 'З', 'И', 'Ј', 'К', 'Л',
        'Љ', 'М', 'Н', 'Њ', 'О', 'П', 'Р', 'С', 'Т', 'Ћ', 'У', 'Ф', 'Х', 'Ц', 'Ч',
        'Џ', 'Ш', 'а', 'б', 'в', 'г', 'д', 'ђ', 'е', 'ж', 'з', 'и', 'ј', 'к', 'л',
        'љ', 'м', 'н', 'њ', 'о', 'п', 'р', 'с', 'т', 'ћ', 'у', 'ф', 'х', 'ц', 'ч',
        'џ', 'ш'
    ], ['A', 'B', 'V', 'G', 'D', 'Dj', 'E', 'Ž', 'Z', 'I', 'J', 'K', 'L',
        'Lj', 'M', 'N', 'Nj', 'O', 'P', 'R', 'S', 'T', 'Ć', 'U', 'F', 'H', 'C', 'Č',
        'Dž', 'Š', 'a', 'b', 'v', 'g', 'd', 'dj', 'e', 'ž', 'z', 'i', 'j', 'k', 'l',
        'lj', 'm', 'n', 'nj', 'o', 'p', 'r', 's', 't', 'ć', 'u', 'f', 'h', 'c', 'č',
        'dž', 'š'
    ], $title);

    if ($context == 'save') {
        $title = remove_accents($title);
    }

    return $title;
}
add_filter('sanitize_title', 'slug_cyr_to_lat', 5, 3);
