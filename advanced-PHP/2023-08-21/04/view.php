<?php

    function prikaziFormu()
    {
        ?>
        <form method="post" action="index.php">
            <input type="text" name="naslov">
            <input type="textarea" name="sadrzaj">
            <input type="submit" value="SNIMI">
        </form>
        <?php
    }
    
    function prikaziSveBiljeske($biljeske)
    {
        foreach ($biljeske as $biljeska) {
            echo "<h3>{$biljeska['naslov']}</h3>";
            echo "<p>{$biljeska['sadrzaj']}</p>";
        }
    }
?>
