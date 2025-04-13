<?php
$mysqli = new mysqli("db", "user", "userpass", "techsolutions");
if ($mysqli->connect_error) {
    die("Connessione fallita: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM faq ORDER BY data_creazione DESC");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>FAQ - TechSolutions</title>
</head>
<body>
    <h1>FAQ - TechSolutions</h1>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <strong>[<?= htmlspecialchars($row['categoria']) ?>]</strong><br>
                <em><?= htmlspecialchars($row['domanda']) ?></em><br>
                <?= nl2br(htmlspecialchars($row['risposta'])) ?><br><br>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
