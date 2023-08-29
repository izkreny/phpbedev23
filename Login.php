<?php

    class Login
    {
        public function prikaziFormu()
        {
            echo '
                <form action="LoginController.php" method="post">
                    Email: <input type="email" name="email" required><br>
                    Lozinka: <input type="password" name="lozinka" required><br>
                    <input type="submit" value="PRIJAVI ME!">
                </form>
            ';
        }

        public function prikaziPoruke($poruke)
        {
            foreach ($poruke as $poruka) {
                echo '<h3 style="color: red;">' . $poruka . '</h3>';
            }
        }
    }
