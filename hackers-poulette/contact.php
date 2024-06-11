<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Données reçues</title>
</head>
<body>
    <h1>Données reçues</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        
        echo "<p>Nom: " . $name . "</p>";
        echo "<p>Email: " . $email . "</p>";
    } else {
        echo "<p>Aucune donnée reçue.</p>";
    }
    ?>
</body>
</html>
