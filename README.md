# SimpleSlug

SimpleSlug is an easy-to-use PHP library that allows you to create random, entertaining, and occasionally meaningful slugs (combinations).

Say goodbye to random strings like 'q8s46k0' and hello to catchy slugs like 'gigantic flat dog,' making them much easier to recognize.

Use Github Issues for comments, bug reports and questions.

## Installation:
`composer require amirrh6/simpleslug`

## Usage:

```php
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
```
## License:

[GPL 2.0 only](https://spdx.org/licenses/GPL-2.0-only.html)