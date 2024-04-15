<?php

$conn = new mysqli('localhost', 'root', '', 'gestione_libreria');

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $libro_id = $_POST['libro_id'];
    $autore = $_POST['autore'];
    $titolo = $_POST['titolo'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];
    $immagine = $_POST['immagine'];

     $sql = "UPDATE libri SET autore=?, titolo=?, anno_pubblicazione=?, genere=?, immagine=? WHERE id=?";

    
    $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssisis", $autore, $titolo, $anno_pubblicazione, $genere, $immagine, $libro_id);
    
 
    if ($stmt->execute()) {
        echo "Libro modificato con successo.";
    } else {
        echo "Errore durante la modifica del libro: " . $conn->error;
    }

   
    $stmt->close();
}


$conn->close();
?>

