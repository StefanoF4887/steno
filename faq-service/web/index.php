<!DOCTYPE html>
<html>
<head>
    <title>Visualizzazione Tabella Database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>FAQ - TECHSOLUTIONS</h1>

<?php
// 1. Informazioni di connessione al database (da adattare nel tuo ambiente Docker Compose)
$servername = "db"; // Nome del servizio MySQL in Docker Compose
$username = "user"; // Sostituisci con il tuo username
$password = "userpass"; // Sostituisci con la tua password
$dbname = "techsolutions"; // Sostituisci con il nome del tuo database
$tablename = "faq"; // Sostituisci con il nome della tabella da visualizzare

// 2. Creazione della connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// 4. Esecuzione della query per selezionare tutti i dati dalla tabella
$sql = "SELECT * FROM $tablename";
$result = $conn->query($sql);

// 5. Visualizzazione dei dati in una tabella HTML
if ($result->num_rows > 0) {
    echo "<table>";
    // Intestazione della tabella (nomi delle colonne)
    echo "<thead><tr>";
    $fields = $result->fetch_fields();
    foreach ($fields as $field) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";
    // Output dei dati di ogni riga
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Nessun risultato trovato nella tabella.";
}

// 6. Chiusura della connessione
$conn->close();
?>

</body>
</html>
