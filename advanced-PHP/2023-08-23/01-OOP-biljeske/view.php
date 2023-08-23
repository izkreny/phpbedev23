<?php

    class BiljeskaView
    {
        public function prikaziFormu()
        {
            echo '
                <form method="post">
                    <input type="text" name="naslov">
                    <textarea name="sadrzaj"></textarea>
                    <input type="submit" value="DODAJ BILJEŠKU">
                </form>
            ';
        }

        public function prikaziBiljeske($biljeske)
        {
            foreach ($biljeske as $biljeska) {
                echo "<h3>{$biljeska['naslov']}</h3>";
                echo "<p>{$biljeska['sadrzaj']}</p>";
            }
        }
    }
