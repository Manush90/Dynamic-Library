<?php
$conn = new mysqli('localhost', 'root', '', 'gestione_libreria');

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libro_id = $_POST['libro_id'];

    $sql = "DELETE FROM libri WHERE id='$libro_id'";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: index.php");
        exit; 
    } else {
        echo "Errore durante l'eliminazione del libro: " . $conn->error;
    }
}

$conn->close();
?>


