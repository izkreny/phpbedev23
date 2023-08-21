<?php

    function prikaziFormu()
    {
        ?>
        <form method="get" action="index.php">
            <input type="number" name="a">
            <input type="number" name="b">
            <input type="submit" value="ZBROJI">
        </form>
        <?php
    }
    
    function prikaziZbroj($zbroj)
    {
        echo "Zbroj je jednak: {$zbroj}";
    }
