<?php

namespace SimpleSlug;

class Engine
{
    /**
     * Quantity or Number: (e.g., one, several, many)
     * Quality or Opinion: (e.g., beautiful, interesting, boring)
     * Size: (e.g., big, small, tall)
     * Age: (e.g., old, young, new)
     * Shape: (e.g., round, square, triangular)
     * Color: (e.g., red, blue, green)
     * Origin: (e.g., American, French, Asian)
     * Material: (e.g., wooden, metal, plastic)
     * Purpose or Type: (e.g., sleeping (as in sleeping bag), racing (as in racing car))
     */

    static $quantity_adj = ['one']; // 1
    static $quality_adj = ['beautiful', 'interesting', 'boring', 'furious', 'brave', 'loyal', 'adventurous', 'playful', 'curious', 'flexible', 'angry', 'clumsy', 'amazing', 'fantastic', 'delicious', 'trustworthy']; // 16
    static $size_adj = ['big', 'small', 'tall', 'little', 'tiny', 'massive', 'huge', 'enormous', 'gigantic', 'short']; // 10
    static $age_adj = ['old', 'young', 'new', 'modern', 'recent', 'fresh', 'vintage', 'ancient']; // 8
    static $shape_adj = ['round', 'square', 'triangular', 'cubic', 'flat', 'curved', 'hexagonal', 'rectangular']; // 8
    static $color_ajd = ['red', 'blue', 'green', 'ginger', 'black', 'white', 'yellow', 'orange']; // 8
    static $origin_adj = ['American', 'French', 'Asian', 'Italian', 'Canadian', 'African', 'British', 'Russian']; // 8
    static $material_adj = ['wooden', 'metal', 'plastic', 'glass', 'cotton', 'ceramic', 'paper', 'leather']; // 8
    static $purpose_or_type_adj = ['sleeping', 'racing', 'writing', 'traveling', 'hiking', 'swimming', 'cleaning', 'reading']; // 8

    static $animals = ['cat', 'kitten', 'dragon', 'dog', 'lion', 'husky', 'panda', 'rabbit', 'fox', 'wolf', 'duck', 'mongoose', 'puppy', 'kitty']; // 14
    static $objects = ['rocket', 'car', 'bus', 'guitar', 'violin', 'piano', 'door', 'key', 'box', 'laptop', 'bed', 'lamp', 'printer', 'doll']; // 14
    static $humans = ['person', 'man', 'woman', 'human']; // 4

    // ---

    private $adjectives = [];
    private $ordered_adjectives = [];
    private $knowns = [];

    // Uses constructor property promotion: https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion
    public function __construct(private bool $lower_case_every_word = false)
    {
        $this->adjectives = array_merge(
            static::$quantity_adj,
            static::$quality_adj,
            static::$size_adj,
            static::$age_adj,
            static::$shape_adj,
            static::$color_ajd,
            static::$origin_adj,
            static::$material_adj,
            static::$purpose_or_type_adj
        );

        $this->ordered_adjectives = array_flip($this->adjectives);

        $this->knowns = array_merge(static::$animals, static::$objects, static::$humans);

        if (count($this->knowns) === 0 || count($this->adjectives) === 0) {
            throw new \Exception();
        }
    }

    public function generate(int $words_count = 3)
    {
        $combination = [];

        $r = new \Random\Randomizer();
        $picked_keys = $r->pickArrayKeys($this->adjectives, $words_count - 1);

        foreach ($picked_keys as $key) {
            $combination[] = $this->adjectives[$key];
        }

        usort($combination, function ($a, $b) {
            return $this->ordered_adjectives[$a] <=> $this->ordered_adjectives[$b];
        });

        $combination[] = $this->knowns[$r->pickArrayKeys($this->knowns, 1)[0]];

        return $this->lower_case_every_word ? strtolower(implode(' ', $combination)) : implode(' ', $combination);
    }
}
