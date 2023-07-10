<?php

//Pretvorimo binarni broj u dekadski
$binarniBroj = "100";
$dekadski = bindec($binarniBroj);

echo "Dekadski broj je (proc): " . $dekadski . "\n";

// OOP
// TU NEŠ NE ŠTIMA!!!
class Pretvorimo {
    public $brojBinarni;

    public function pretvoriUDekadski() {
        $brojDekadski = bindec($this->brojBinarni);

        return $brojDekadski;
    }
}

$broj = new Pretvorimo();
$broj->broj = $binarniBroj;
$dekadskiBroj = $broj->pretvoriUDekadski();

echo "Dekadski broj je (OOP): " . $dekadskiBroj . "\n";

?>
