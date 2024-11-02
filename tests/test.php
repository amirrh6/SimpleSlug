<?php

require_once 'vendor/autoload.php';

$simpleSlug = new SimpleSlug\Engine(words_count: 3, capitalize_the_first_word: true);

for ($x = 0; $x < 5; $x++) {
    if ($x == 1) {
        print_r($simpleSlug->generate(words_count: 4) . "\n");
    } else {
        print_r($simpleSlug->generate() . "\n");
    }
}

/*
// May output something similar to:

Cubic African rabbit
Flat yellow Italian fox
Curious blue lamp
Italian traveling cat
American leather cat
*/
