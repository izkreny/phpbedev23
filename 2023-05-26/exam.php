<?php

// Initialization of the letters than absolutely need to be in lowercase format!
$vowels_hr = array('a','e','i','o','u');
$consonants_hr = array('b','c','č','ć','d','dž','đ','f','g','h','j','k','l','lj','m','n','nj','p','r','s','š','t','v','z','ž');

// Variables initialization
$messages = [];
$uploadDir = '/tmp/';
$file = $uploadDir . 'words.json';

if (!file_exists($uploadDir)) {
    array_push($messages, 'Unable to find ' . $uploadDir);
    $filesystemFatalError = true;
} elseif (file_exists($file) and is_readable($file)) {
    $words = json_decode(file_get_contents($file), JSON_OBJECT_AS_ARRAY);
} elseif (file_exists($file) and !is_readable($file)) {
    array_push($messages, 'Unable to read data from ' . $file);
    $filesystemFatalError = true;
} elseif (!file_exists($file) and is_writable($uploadDir)) {
    touch($file);
} elseif (!file_exists($file) and !is_writable($uploadDir)) {
    array_push($messages, 'Unable to create ' . $file);
    $filesystemFatalError = true;
}

// Calculate how many letters from the array are present inside the word
// https://www.php.net/manual/en/book.mbstring.php
function howMany($letters, $word) {
    $chars = mb_str_split($word);
    $sum = 0;

    // Find out the length of the longest letter in the array
    $maxLetterLen = 0;
    foreach($letters as $letter) {
        if (mb_strlen($letter) > $maxLetterLen) {
            $maxLetterLen = (mb_strlen($letter));
        }
    }
    
    if ($maxLetterLen == 1) {
        foreach ($chars as $char) {
            if (in_array(mb_strtolower($char), $letters)) {
                $sum++;
            }
        }
    } else {
        /***
         * Go through the $chars array in the following way:
         * Implode $maxLetterLen of $chars elements and check
         * if this new letter is in the $letters array.
         * Decrease the length of the new letter until you reach 0 or find a match.
         * If you found a match, make a shit in $chars array for the length of the
         * new letter. 
         *
         ***/
        $i = 0;
        while ($i < count($chars)) {
            $j = $maxLetterLen;
            while ($j > 0) {
                // https://www.php.net/manual/en/function.array-slice.php
                // If the array is shorter than the length, then only the available array elements will be present.
                // https://www.php.net/manual/en/function.implode
                // https://www.php.net/manual/en/function.in-array.php 
                if (in_array(mb_strtolower(implode(array_slice($chars, $i, $j))), $letters)) {
                    $i += $j;
                    $sum++;
                    break;
                } else {
                    $j--;
                }
            }
            // If there is no match, skip to the next element in the $chars array
            if ($j == 0) $i++;
        }
    }

    return $sum;
}

if (isset($_POST['word'])) {
    $word['word'] = trim($_POST['word']);
    if (empty($word['word'])) {
        array_push($messages, 'Empty input is not allowed!');
    } else {
        $word['consonantsCount'] = howMany($consonants_hr, $word['word']);
        $word['vowelsCount'] = howMany($vowels_hr, $word['word']);
        $word['charsCount'] = $word['consonantsCount'] + $word['vowelsCount'];

        // Initialize $words array if it is not created
        if (!isset($words)) $words = [];

        // https://www.php.net/manual/en/function.array-push.php
        array_push($words, $word);

        if (is_writable($file)) {
            file_put_contents($file, json_encode($words, JSON_PRETTY_PRINT));
        } else {
            array_push($messages, 'Unable to write data to ' . $file);
        }
    }
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Partial exam - PHP basics</title>
</head>
<body>
    <?php
        if ($messages) {
            foreach ($messages as $message) {
                echo '<h3 style="color: red;">' . $message . '</h3>';
            }
        } else {
            echo '<h1>Write one Croatian word!</h1>';
            echo '<h4>(e.g. Mama, Ćaća, Njonjo, Šuša, Ljilja...)</h4>';

        }

        if (!isset($filesystemFatalError)) {
    ?>
    <p>
        <!-- If you use same file you even don't need to write action parameter. -->
        <form action='' method='POST'>
            <label>Write one single word:</label>
            <input type='text' name='word' />
            <input type='submit' value='SUBMIT' />
        </form>
    </p>
    <table border = '1'>
        <thead>
            <th>Word</th>
            <th>Characters #</th>
            <th>Vowels #</th>
            <th>Consonants #</th>
        </thead>
        <?php
            if (isset($words)) foreach ($words as $word) {
                echo '<tr>';
                echo '<td>' . $word['word'] . '</td>';
                echo '<td>' . $word['charsCount'] . '</td>';
                echo '<td>' . $word['vowelsCount'] . '</td>';
                echo '<td>' . $word['consonantsCount'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>
    <?php } ?>
</body>
</html>
