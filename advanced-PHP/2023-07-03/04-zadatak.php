<?php

// Inicijaliziacija nizova slova koja MORAJU biti lowercase. :P
$samoglasnici = array('a','e','i','o','u');
$suglasnici = array('b','c','č','ć','d','dž','đ','f','g','h','j','k','l','lj','m','n','nj','p','r','s','š','t','v','z','ž');

// Prebrojimo samoglasnike u stringu


// Inicijalizacija filesystem varijabli

// Funkcija za računanje koliko je znakova iz riječi ujedno i dio niza slova
// https://www.php.net/manual/en/book.mbstring.php
function izracunaj($chars, $letters) {
    $zbroj = 0;

    // Izračunaj od koliko se znakova sastoji najduže slovo u nizu
    $maxLetterLen = 0;
    foreach($letters as $letter)
        if (mb_strlen($letter) > $maxLetterLen)
            $maxLetterLen = (mb_strlen($letter));

    // Ako se sva slova u nizu sastoje od jednog znaka, izvrši jednostavniju petlju,
    // u suprotnom izvrši kompleksniju petlju koja uzima sva slova u obzir.
    if ($maxLetterLen == 1) {
        foreach ($chars as $char)
            if (in_array(mb_strtolower($char), $letters))
                $zbroj++;
    } else {

        // Prođi kroz niz znakova od početka na način da uzmeš prvo $maxLetterLen znakova,
        // spojiš ih u string te provjeriš nalazi li se navedeno slovo u nizu slova $letters.
        // Umanjuj dok možeš ili ne dobiješ podudaranje. U slučaju poduranja radi se pomak
        // u nizu znakova koji je jednak broju znakova od kojeg se sastoji slovo.
        $i = 0;
        while ($i < count($chars)) {

            // Prođi sve kombinacije slova koja se sastoje od maksimalnog broja znakova
            $j = $maxLetterLen;
            while ($j > 0) {

                // https://www.php.net/manual/en/function.array-slice.php
                // If the array is shorter than the length, then only the available array elements will be present.
                // https://www.php.net/manual/en/function.implode
                // https://www.php.net/manual/en/function.in-array.php 
                if (in_array(mb_strtolower(implode(array_slice($chars, $i, $j))), $letters)) {
                    $i += $j;
                    $zbroj++;
                    break;
                } else {
                    $j--;
                }
            }
            // Ako se petlja odvrtila do kraja bez rezultata idemo na sljedeći znak u nizu
            if ($j == 0) $i++;
        }
    }

    return $zbroj;
}

$word = "Okolo";
// $word['brojSuglasnika'] = izracunaj(mb_str_split($word['rijec']), $suglasnici);
$brojSamoglasnika = izracunaj(mb_str_split($word), $samoglasnici);

echo "Broj samoglasnika u riječi (proc) >> " .$word . " << iznosi: " . $brojSamoglasnika . "\n";

class Rijec {
    public $rijec;

    public function brojSamoglasnika() {
        $letters = array('a','e','i','o','u');
        $zbroj = 0; 
        $chars = mb_str_split($this->rijec);

        foreach ($chars as $char)
            if (in_array(mb_strtolower($char), $letters))
                $zbroj++;

        return $zbroj;
    }
}

$rijec = new Rijec();
$rijec->rijec = "Okolo";


echo "Broj samoglasnika u riječi (OOP) >> " . $rijec->rijec . " << iznosi: " .  $rijec->brojSamoglasnika() . "\n";

?>
