<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tua Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <nav class="navbar bg-body-primary mb-4 p-0  ">
        <div class="container-fluid d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/256/864/864685.png" class="img-fluid mx-auto d-block" alt="imm" style="width: 50px; height: 50px;">

        </div>
        <a class="container-fluid d-flex justify-content-center">OMNIABOOKS</a>
        <h6 class="container-fluid d-flex justify-content-center mb-1">Digital Library</h6>
    </nav>

    <div class="container mt-0">





        <div class="row mt-4 ">
            <div class=" col-xs-10 col-sm-7 col-md-8 scrollable v-100">

                <div class="row g-3">
                    <?php

                    $conn = new mysqli('localhost', 'root', '', 'gestione_libreria');

                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }


                    $sql = "SELECT * FROM libri";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <img src="<?php echo $row['immagine']; ?>" class="card-img-top" alt="Copertina">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title text-uppercase d-flex flex-column text-center"><?php echo $row['titolo']; ?></h5>
                                        <p class="card-text d-flex flex-column text-center"><strong>Autore:</strong> <?php echo $row['autore']; ?></p>
                                        <p class="card-text d-flex flex-column text-center"><strong>Anno Pubblicazione:</strong> <?php echo $row['anno_pubblicazione']; ?></p>
                                        <p class="card-text d-flex flex-column text-center"><strong>Genere:</strong> <?php echo $row['genere']; ?></p>
                                        <form class="d-flex" method="post" action="elimina_libro.php">
                                            <input type="hidden" name="libro_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-danger mx-auto">Elimina</button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                    <?php

                        }
                    } else {
                        echo "Nessun libro trovato.";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>

            <div class="col-xs-2 col-sm-5 col-md-4">
                <div class="mt-0">
                    <h2 class="text-center">Aggiungi un libro</h2>
                    <form method="post" action="aggiungi_libro.php">
                        <div class="form-group">
                            <label for="autore">Autore:</label>
                            <input type="text" class="form-control" id="autore" name="autore" required>
                        </div>
                        <div class="form-group">
                            <label for="titolo">Titolo:</label>
                            <input type="text" class="form-control" id="titolo" name="titolo" required>
                        </div>
                        <div class="form-group">
                            <label for="anno_pubblicazione">Anno Pubblicazione:</label>
                            <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" required>
                        </div>
                        <div class="form-group">
                            <label for="genere">Genere:</label>
                            <input type="text" class="form-control" id="genere" name="genere" required>
                        </div>
                        <div class="form-group">
                            <label for="immagine">URL dell'Immagine:</label>
                            <input type="text" class="form-control" id="immagine" name="immagine" required>
                        </div>
                        <div class=" d-flex mt-2 justify-content-center">
                            <button type="submit" class="btn btn-primary">Aggiungi</button>
                        </div>
                    </form>
                </div>
                <hr>

                <div class="mt-4">
                    <h2 class="text-center">Modifica un libro</h2>
                    <form method="post" action="modifica_libro.php">
                        <div class="form-group">
                            <label for="libro_id">ID del libro:</label>
                            <input type="number" class="form-control" id="libro_id" name="libro_id" required>
                        </div>
                        <div class="form-group">
                            <label for="autore">Autore:</label>
                            <input type="text" class="form-control" id="autore" name="autore" required>
                        </div>
                        <div class="form-group">
                            <label for="titolo">Titolo:</label>
                            <input type="text" class="form-control" id="titolo" name="titolo" required>
                        </div>
                        <div class="form-group">
                            <label for="anno_pubblicazione">Anno Pubblicazione:</label>
                            <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" required>
                        </div>
                        <div class="form-group">
                            <label for="genere">Genere:</label>
                            <input type="text" class="form-control" id="genere" name="genere" required>
                        </div>
                        <div class="form-group">
                            <label for="immagine">URL dell'Immagine:</label>
                            <input type="text" class="form-control" id="immagine" name="immagine" required>
                        </div>
                        <div class=" d-flex mt-2 justify-content-center">
                            <button type="submit" class="btn btn-primary">Modifica</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>