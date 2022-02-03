<?php

function getMostFrequentWords($string, $blackListWords, $limit = 5)
{
    $string = preg_replace('/ss+/i', '', $string);

    // trim the string
    $string = trim($string);

    // only take alphabet characters, but keep the spaces and dashes too…
    $string = preg_replace('/[^a-zA-Z ]/', '', $string);

    // make it lowercase
    $string = strtolower($string);

    preg_match_all('/\b.*?\b/i', $string, $matchWords);

    $matchWords = $matchWords[0];

    foreach ($matchWords as $key => $item) {
        if ($item == '' || in_array(strtolower($item), $blackListWords) || strlen($item) <= 2) {
            unset($matchWords[$key]);
        }
    }

    $word_count = str_word_count(implode(" ", $matchWords), 1);
    $frequency = array_count_values($word_count);

    arsort($frequency);

    $keywords = array_slice(
        $frequency,
        0,
        $limit
    );

    print_r($keywords);
    // return $keywords;
}
