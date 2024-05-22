<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php"; ?>

<div class="container text-center">
    <div class="gallery"> <!-- galeria zdjęć -->
        <?php
        $gallery_path = "images/"; /* ścieżka do galerii */
        $images = glob($gallery_path . "*.{jpg,jpeg,png,gif}", GLOB_BRACE); /* pobranie zdjęć z galerii */

        // Paginacja
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Strona aktualnie wyświetlana
        $perPage = 10; // Liczba zdjęć na stronie
        $totalPages = ceil(count($images) / $perPage); // Całkowita liczba stron
        $start = ($page - 1) * $perPage; // Początkowy indeks dla zdjęć na tej stronie

        $imagesToDisplay = array_slice($images, $start, $perPage); // Wybierz odpowiednie zdjęcia dla aktualnej strony

        foreach ($imagesToDisplay as $image) {
            echo '<button type="button" class="btn btn-link" data-toggle="modal" data-target="#imageModal" data-img="' . /* wyświetlenie zdjęć z galerii */
                $image .
                '">';
            echo '<img src="' .
                $image .
                '" alt="' .
                basename($image) .
                '" class="img-thumbnail border">';
            echo "</button>";
        }
        ?>
    </div>
</div>

<!-- Paginacja -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
        }
        ?>
    </ul>
</nav>

<?php include "footer.php"; ?>
<div class="container text-center">
    <div class="style-switcher"></div>
    <script src="script.js"></script>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- ładowanie plików js dla galerii -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.gallery button').click(function() {
            const imgSrc = $(this).data('img');
            $('#modalImage').attr('src', imgSrc);
        });
    });
</script> <!-- skrypt js dla galerii -->

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" class="img-fluid" id="modalImage" alt="">
            </div>
        </div>
    </div>
</div> <!-- modal dla zdjęć z galerii -->

</body>
</html>
