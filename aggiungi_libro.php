<?php
$conn = new mysqli('localhost', 'root', '', 'gestione_libreria');

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autore = $_POST['autore'];
    $titolo = $_POST['titolo'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];
    $immagine = $_POST['immagine'];

    $sql = "INSERT INTO libri (autore, titolo, anno_pubblicazione, genere, immagine) VALUES ('$autore', '$titolo', '$anno_pubblicazione', '$genere', '$immagine')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit; 
    } else {
        echo "Errore durante l'aggiunta del libro: " . $conn->error;
    }
}

$conn->close();
?>



