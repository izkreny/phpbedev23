<?php

    class BiljeskaView
    {
        public function prikaziFormu()
        {
            echo '
                <form method="post">
                    <label>Naslov</label><br>
                    <input type="text" name="naslov"><br>
                    <label>Sadržaj</label><br>
                    <textarea name="sadrzaj"></textarea><br>
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
