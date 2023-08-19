<?php
// Inicijalizacija varijabli
$messages = [];

// Inicijalizacija sessiona
// https://www.php.net/manual/en/refs.basic.session.php
session_start();
if (!isset($_SESSION['failedLoginAttempts']))
    $_SESSION['failedLoginAttempts'] = 0; 
if ($_SESSION['failedLoginAttempts'] >= 3)
    array_push($messages, "Pristup bankomatu je onemogućen zbog unosa pogrešnog PIN-a tri puta zaredom. Obratite se banci za pomoć! :P");

// Manual session reset with ?reset URL suffix
if (isset($_GET['reset'])) {
    session_destroy();
    // https://www.php.net/manual/en/reserved.variables.server.php
    $page = $_SERVER['PHP_SELF'];
    // https://www.php.net/manual/en/function.header
    header("Refresh:0; url=$page");
    exit;
}

// Inicijalizacija filesystem varijabli
// https://www.php.net/manual/en/refs.fileprocess.file.php
$uploadDir = '/tmp/';
$file = $uploadDir . 'ATM.json';

// Filesystem provjere te učitavanje podataka ako postoji datoteka, ako ne kreira se prazna
if (!file_exists($uploadDir)) {
    array_push($messages, "Ne postoji direktorij za upload " . $uploadDir);
    $filesystemFatalError = true;
} elseif (file_exists($file) and is_readable($file)) {
    // Učitavanje podataka iz datoteke 
    $ATM = json_decode(file_get_contents($file), JSON_OBJECT_AS_ARRAY);
} elseif (file_exists($file) and !is_readable($file)) {
    array_push($messages, "Nije moguće učitati podatke iz " . $file);
    $filesystemFatalError = true;
} elseif (!file_exists($file) and is_writable($uploadDir)) {
    // Inicijalizacija bankomata
    touch($file);
    $ATM = array (
        'PIN' => '0000',
        'amount' => 0
    );
    if (is_writable($file)) {
        file_put_contents($file, json_encode($ATM, JSON_PRETTY_PRINT));
        array_push($messages, "Novi račun je kreiran. PIN: 0000");
    } else {
        array_push($messages, "Nije moguće upisati podatke u " . $file);
        $filesystemFatalError = true;
    }
} elseif (!file_exists($file) and !is_writable($uploadDir)) {
    array_push($messages, "Nije moguće kreirati datoteku " . $file);
    $filesystemFatalError = true;
}


// Autorizacija pomoću PIN-a
if (isset($_POST['PIN'])) {
    if ($ATM['PIN'] === $_POST['PIN']) {
        $_SESSION['active'] = true;
        $_SESSION['failedLoginAttempts'] = 0;
        array_push($messages, "DOBRODOŠLI!");
    } else {
        $_SESSION['failedLoginAttempts'] += 1;
        if ($_SESSION['failedLoginAttempts'] < 3) {
            array_push($messages, "Pogrešan PIN! Preostali broj pokušaja: " . 3 - $_SESSION['failedLoginAttempts']);
        } else {
            array_push($messages, "Pristup bankomatu je onemogućen zbog unosa pogrešnog PIN-a tri puta zaredom. Obratite se banci za pomoć! :P");
        }
    }
}

// Inicijalizacija forme ovisno o odabranoj opciji
if (isset($_POST['options'])) {
    switch ($_POST['options']) {
        case "payout":
            $form = array (
                'labelText' => 'Unesite iznos za isplatu: ',
                'inputType' => 'number',
                'inputName' => 'payout',
                'inputExtraAttributes' => 'autofocus step="1" min="0" max="' . $ATM['amount'] . '"',
                'inputButtonText' => 'ISPLATI'
            );
            break;
        case "payment":
            $form = array (
                'labelText' => 'Unesite iznos za uplatu: ',
                'inputType' => 'number',
                'inputName' => 'payment',
                'inputExtraAttributes' => 'autofocus step="1" min="0"',
                'inputButtonText' => 'UPLATI'
            );
            break;
        case "overview":
            $form = array (
                'inputType' => 'hidden',
                'inputName' => 'overview',
                'inputButtonText' => 'POVRATAK'
            );
            array_push($messages, "Iznos novca na računu: " . $ATM['amount']);
            break;
        case "changePIN":
            $form = array (
                'labelText' => 'Unesite novi PIN: ',
                'inputType' => 'password',
                'inputName' => 'changePIN',
                'inputExtraAttributes' => 'autofocus inputmode="numeric" pattern="[0-9]+" minlength="4" maxlength="4" size="4"',
                'inputButtonText' => 'PROMJENI'
            );
            array_push($messages, "PIN mora sadržavati točno četiri numerička znaka!");
            break;
        case "exit":
            session_destroy();
            header("Refresh:0");
            exit;
    }
}

// ISPLATA NOVCA
if (isset($_POST['payout'])) {
    $ATM['amount'] -= intval($_POST['payout']);
    array_push($messages, "Uspješno je isplaćen sljedeći iznos: " . $_POST['payout']);
}

// UPLATA NOVCA
if (isset($_POST['payment'])) {
    $ATM['amount'] += intval($_POST['payment']);
    array_push($messages, "Uspješno je uplaćen sljedeći iznos: " . $_POST['payment']);
}

// Promjena PIN-a
if (isset($_POST['changePIN'])) {
    $ATM['PIN'] = $_POST['changePIN'];
    array_push($messages, "PIN je uspješno promijenjen.");
}

// Ažuriranje računa u banci :)
if (is_writable($file)) {
    file_put_contents($file, json_encode($ATM, JSON_PRETTY_PRINT));
} else {
    array_push($messages, "Nije moguće ažurirati račun u banci aka upisati podatke u " . $file);
    $filesystemFatalError = true;
}

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Bankomat</title>
</head>
<body>
    <h1>JSON Bankomat</h1>
    <?php
        if ($messages) foreach ($messages as $message) echo '<h3 style="color: red;">' . $message . '</h3>';
        
        if(!isset($_SESSION['active']) and $_SESSION['failedLoginAttempts'] < 3 and !isset($filesystemFatalError)) {
    ?>
            <form action="" method="POST">
                <label>Za nastavak unesite PIN:</label>
                <input type="password" name="PIN" inputmode="numeric" autofocus />
                <input type="submit" value="POTVRDI" />
            </form>
    <?php
        } elseif (isset($_SESSION['active']) and !isset($_POST['options'])) {
    ?>
            <form action="" method="POST">
                <label>Odaberite opciju:</label><br><br>
                <input type="radio" name="options" value="payout" />
                <label for="payout">Isplata novca</label><br>
                <input type="radio" name="options" value="payment" />
                <label for="payment">Uplata novca</label><br>
                <input type="radio" name="options" value="overview" />
                <label for="overview">Pregled stanja</label><br>
                <input type="radio" name="options" value="changePIN" />
                <label for="changePIN">Promjena PIN-a</label><br>
                <input type="radio" name="options" value="exit" />
                <label for="exit">Izlaz</label><br><br>
                <input type="submit" value="POTVRDI" />
            </form>
    <?php
        } elseif (isset($_SESSION['active']) and isset($_POST['options'])) {
    ?>
            <form action="" method="POST">
                <!-- Using https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op -->
                <label><?= $form['labelText'] ?? '' ?></label>
                <input 
                    type="<?= $form['inputType'] ?? '' ?>" 
                    name="<?= $form['inputName'] ?? '' ?>" 
                    <?= $form['inputExtraAttributes'] ?? '' ?> />
                <input 
                    type="submit" 
                    value="<?= $form['inputButtonText'] ?? '' ?>" />
            </form>
    <?php
        }
    ?>

    <?php
        /*** DEBUGGING ***
        echo '<hr><pre>';
        echo '$_SESSION '; var_dump($_SESSION);
        echo '$_POST '; var_dump($_POST);
        //echo '$_SERVER '; var_dump($_SERVER);
        echo '$ATM '; var_dump($ATM);
        echo '</pre><hr>';
        /*** DEBUGGING ***/
    ?>

</body>
</html>
