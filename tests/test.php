<?php

require_once 'vendor/autoload.php';

$simpleSlug = new SimpleSlug\Engine(lower_case_every_word: true);
for ($x = 0; $x < 10; $x++) {
    print_r($simpleSlug->generate() . "\n");
}

/*
// May output something similar to:

trustworthy cleaning doll
tall canadian puppy
furious vintage dog
delicious cotton box
gigantic flat dog
gigantic wooden bus
clumsy vintage rabbit
flexible delicious human
massive paper door
amazing cleaning violin
*/
