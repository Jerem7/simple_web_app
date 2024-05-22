<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista użytkowników</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php"; ?>

<div class="content">
    <h1>Lista użytkowników</h1>
    <table class="table users-table">
        <thead class="table-head">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Imię </th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody class="table-body">
        <?php
        $csvFile = fopen("users/users.csv", "r");

        $count = 0;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Strona aktualnie wyświetlana
        $perPage = 20; // Liczba wyników na stronie
        $start = ($page - 1) * $perPage; // Początkowy indeks dla wyników na tej stronie

        while (($data = fgetcsv($csvFile, 1000)) !== false) {
            if ($count >= $start && $count < ($start + $perPage)) {
                $email_parts = explode("@", $data[3]);
                $email_display = $email_parts[0] . "<br>" . "@" . $email_parts[1];

                echo "<tr class='table-row'>";
                echo "<td class='table-cell'>" . $data[0] . "</td>";
                echo "<td class='table-cell'>" . $data[1] . "</td>";
                echo "<td class='table-cell'>" . $data[2] . "</td>";
                echo "<td class='table-cell'>" . $email_display . "</td>";
                echo "</tr>";
            }
            $count++;
        }

        fclose($csvFile);
        ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
            $totalPages = ceil($count / $perPage); // Całkowita liczba stron
            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>

<?php include "footer.php"; ?>
<div class="container text-center">
    <div class="style-switcher"></div>
    <script src="script.js"></script>
</div>
</body>
</html>
