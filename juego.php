<?php
require 'database.php';
$sql = 'SELECT game_attributes FROM game WHERE game_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_POST['pin']);

$game_attributes = null;
if ($stmt->execute()) {
    $game_attributes = $stmt->fetch()[0];
} else {
    echo '<script>alert("Ha ocurrido un error");</script>';
}

$start_time = date('c');

?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-git.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Click a word in the paragraph and highlight it.</title>
</head>

<body>
    <p class="parrafo-juego">
        This domain is established to be used for illustrative examples in documents. You may use this domain in examples without prior coordination or asking for permission.
    </p>
    <script>
        <?php

        ?>
        parrafos = document.getElementsByClassName('parrafo-juego');

        for (var i = 0; i < parrafos.length; i++) {
            var text = parrafos[i].innerHTML.trim();
            parrafos[i].innerHTML = '<span>' + text.split(' ').join('</span> <span>') + '<span>';
        }
        $('span').on('click', function() {
            $(this).css('background-color', 'green');

            var text = $(this).text().match(/[A-Za-z]+/g); // eliminate things like dots, commas, etc.
            console.log(text);
        });
    </script>
</body>

</html>

<!-- https://www.w3resource.com/jquery-exercises/2/jquery-fundamental-exercise-67.php -->