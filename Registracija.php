<?php

    class Registracija
    {
        public function prikaziFormu()
        {
            echo '
                <form action="KorisnikController.php" method="post">
                    Ime: <input type="text" name="ime" required><br>
                    Prezime: <input type="text" name="prezime" required><br>
                    Email: <input type="text" name="email" required><br>
                    Lozinka: <input type="password" name="lozinka" required><br>
                    Ponovljena lozinka: <input type="password" name="ponovljena_lozinka" required><br>
                    <input type="submit" value="REGISTRIRAJ ME!">
                </form>
            ';
        }
    }
