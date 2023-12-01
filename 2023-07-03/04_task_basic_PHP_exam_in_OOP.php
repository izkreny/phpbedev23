<?php

class Word
{
    public $word;

    public function vowelsCount()
    {
        $vowelsCroatian = array('a','e','i','o','u');
        $sum = 0; 
        $chars = mb_str_split($this->word);

        foreach ($chars as $char) {
            if (in_array(mb_strtolower($char), $vowelsCroatian)) {
                $sum++;
            }
        }

        return $sum;
    }
}

$word = new Word();
$word->word = "Okolo";

echo "Number of Croatian vowels in >>> " . $word->word . " <<< word is: " .  $word->vowelsCount() . PHP_EOL;
