# SimpleSlug

SimpleSlug is a straightforward PHP library designed to help you generate amusing and meaningful combinations.

It's advisable not to expose the primary keys of your database records, So you may try generating random strings (like 'q8s46k0') for tickets in your database. There may be a better option.

SimpleSlug can create a catchy slug such as 'gigantic flat dog' for you, making it much easier to spot.

Use Github Issues for comments, bug reports and questions.

## Installation:
`composer require amirrh6/simpleslug`

## Usage:

```php
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
```
## License:

[GPL 2.0 only](https://spdx.org/licenses/GPL-2.0-only.html)