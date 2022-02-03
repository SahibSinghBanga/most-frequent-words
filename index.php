<?php

include('./helper.php');

$fileUrl = "https://www.gutenberg.org/files/2701/2701-0.txt";

$fileString = file_get_contents($fileUrl);

$blackListWords = ["is", "to", "the", "of", "and", "a", "in"];

getMostFrequentWords($fileString, $blackListWords, 50);
