<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ustawienia viewportu które pozwalają na responsywność strony-->
    <title>Responsywna witryna internetowa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  <!-- ładowanie pliku css z bootstrapem-->


</head>
<body><?php include "header.php"; ?> <!-- ładowanie pliku header.php-->


<div class="content"> // treść strony
    <h1>Witaj na mojej stronie!</h1>
    <p>Nazywam się Jeremiasz Żołnierek-Kiełczewski.<br>oto moja praca na temat:<br> <b>"Tworzenie responsywnej witryny
            internetowej"</b> <br><br>indeks#: 158496</p>
</div>

<?php include "footer.php"; ?> <!-- ładowanie pliku footer.php-->
<div class="container text-center">
    <div class="style-switcher"></div> <!-- ładowanie pliku script.js zmieniającego style-->
    <script src="script.js"></script>
</div>
</body>
</html>
