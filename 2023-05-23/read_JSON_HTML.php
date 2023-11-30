<?php

$students = json_decode(file_get_contents('./students.json'), JSON_OBJECT_AS_ARRAY);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>

    <h1>Students</h1>

    <table border = "1">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>E-mail</th>
            <th>Telephone</th>
        </tr>
        <?php
            foreach ($students as $student) {
                echo '<tr>';
                echo '<td>' . $student["name"] . '</td>';
                echo '<td>' . $student["surname"] . '</td>';
                echo '<td>' . $student["age"] . '</td>';
                echo '<td>' . $student["email"] . '</td>';
                echo '<td>' . $student["phone"] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>

</body>
</html>
