<?php

function getMostFrequentWords($string, $blackListWords, $limit = 5)
{
    $string = preg_replace('/ss+/i', '', $string);

    $string = trim($string);

    $string = preg_replace('/[^a-zA-Z ]/', '', $string);

    $string = strtolower($string);

    preg_match_all('/\b.*?\b/i', $string, $matchWords);

    $matchWords = $matchWords[0];

    foreach ($matchWords as $key => $item) {
        if ($item == '' || in_array(strtolower($item), $blackListWords) || strlen($item) <= 2) {
            unset($matchWords[$key]);
        }
    }

    $wordCount = str_word_count(implode(" ", $matchWords), 1);
    $frequency = array_count_values($wordCount);

    arsort($frequency);

    $keywords = array_slice(
        $frequency,
        0,
        $limit
    );

    return $keywords;
}
