<?php

// Inicijaliziacija nizova slova koja MORAJU biti lowercase. :P
$samoglasnici = array('a','e','i','o','u');
$suglasnici = array('b','c','č','ć','d','dž','đ','f','g','h','j','k','l','lj','m','n','nj','p','r','s','š','t','v','z','ž');

// Inicijalizacija filesystem varijabli
$uploadDir = '/tmp/';
$datoteka = $uploadDir . 'words.json';

// Filesystem provjere te učitavanje podataka ako postoji datoteka, ako ne kreira se prazna
if (!file_exists($uploadDir)) {
    $filesystemError = "Ne postoji direktorij za upload " . $uploadDir;
} elseif (file_exists($datoteka) and is_readable($datoteka)) {
    // Učitavanje podataka iz datoteke 
    $words = json_decode(file_get_contents($datoteka), JSON_OBJECT_AS_ARRAY);
} elseif (file_exists($datoteka) and !is_readable($datoteka)) {
    $filesystemError = "Nije moguće učitati podatke iz " . $datoteka;
} elseif (!file_exists($datoteka) and is_writable($uploadDir)) {
    // Kreiranje prazne datoteke
    touch($datoteka);
} elseif (!file_exists($datoteka) and !is_writable($uploadDir)) {
    $filesystemError = "Nije moguće kreirati datoteku " . $datoteka;
}

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


// Provjera unosa
if (isset($_POST['word'])) {
    $word['rijec'] = trim($_POST['word']);
    if (empty($word['rijec'])) {
        $inputError = "Polje ne smije biti prazno!";
    } else {

        // Ako je sve u redu s unosom, izračunaj traženo i spremi u datoteku
        $word['brojSuglasnika'] = izracunaj(mb_str_split($word['rijec']), $suglasnici);
        $word['brojSamoglasnika'] = izracunaj(mb_str_split($word['rijec']), $samoglasnici);
        $word['brojSlova'] = $word['brojSuglasnika'] + $word['brojSamoglasnika'];

        // Inicijaliziraj $words array ako nije kreiran
        if (!isset($words)) $words = [];

        // Dodavanje $word arraya na kraj $words arraya
        // https://www.php.net/manual/en/function.array-push.php
        array_push($words, $word);

        // Snimanje arraya u JSON datoteku
        if (is_writable($datoteka)) {
            file_put_contents($datoteka, json_encode($words, JSON_PRETTY_PRINT));
        } else {
            $filesystemError = "Nije moguće upisati podatke u " . $datoteka;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcijalni ispit - PHP osnove</title>
</head>
<body>
    <?php
        if (isset($inputError)) {
            echo '<h1>' . $inputError . '</h1>';
        } else {
            echo '<h1>Upišite željenu riječ pomoću slova hrvatske abecede! ;)</h1>';
        }
        
        if (isset($filesystemError)) echo '<h3 style="color: red;">POGREŠKA! ' . $filesystemError . '</h3>';
    ?>
    <p>
        <!-- Ako se koristi isti file, action je prazan ili se ne mora niti navesti -->
        <form action="" method="POST">
            <label>Upišite riječ:</label>
            <input type="text" name="word" />
            <input type="submit" value="Pošalji" />
        </form>
    </p>
    <table border = "1">
        <thead>
            <th>Riječ</th>
            <th>Broj slova</th>
            <th>Broj suglasnika</th>
            <th>Broj samoglasnika</th>
        </thead>
        <?php
            if (isset($words)) foreach ($words as $word) {
                echo '<tr>';
                echo '<td>' . $word['rijec'] . '</td>';
                echo '<td>' . $word['brojSlova'] . '</td>';
                echo '<td>' . $word['brojSuglasnika'] . '</td>';
                echo '<td>' . $word['brojSamoglasnika'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>
