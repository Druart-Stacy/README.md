<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fonction pour nettoyer les entrées du formulaire
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Assainir les données du formulaire
    $nom = clean_input($_POST['name']);
    $firstname = clean_input($_POST['firstname']);
    $genre = clean_input($_POST['genre']);
    $mail = clean_input($_POST['mail']);
    $country = clean_input($_POST['country']);
    $subject = clean_input($_POST['subject']);
    $message = clean_input($_POST['message']);

    // Valider les données du formulaire
    $errors = [];
    if (empty($nom)) {
        $errors['name'] = "Le nom est requis.";
    }
    if (empty($firstname)) {
        $errors['firstname'] = "Le prénom est requis.";
    }
    if (empty($genre)) {
        $errors['genre'] = "Le genre est requis.";
    }
    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Une adresse email valide est requise.";
    }
    if (empty($country)) {
        $errors['country'] = "Le pays est requis.";
    }
    if (empty($message)) {
        $errors['message'] = "Le message est requis.";
    }

    if (empty($errors)) {
        // Envoyer l'email
        $to = "votre_adresse_email@example.com";
        $email_subject = "Nouveau message de contact: $subject";
        $email_body = "Vous avez reçu un nouveau message de contact.\n\n".
                      "Nom: $nom\n".
                      "Prénom: $firstname\n".
                      "Genre: $genre\n".
                      "Email: $mail\n".
                      "Pays: $country\n".
                      "Sujet: $subject\n".
                      "Message:\n$message";

        $headers = "From: $mail\n";
        $headers .= "Reply-To: $mail";

        mail($to, $email_subject, $email_body, $headers);

        // Message de retour pour l'utilisateur
        echo "<p style='color: green;'>Merci pour votre message. Nous vous contacterons bientôt.</p>";
    } else {
        // Afficher les erreurs
        foreach ($errors as $field => $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Formulaire de contact</title>
    <style>
        .errorinput {
            border-color: red;
        }
        .errormessage {
            color: red;
        }
        .dark-mode {
            background-color: #333;
            color: #fff;
        }
        #toggleBtn {
            cursor: pointer;
            font-size: 24px;
            color: #333;
            position: fixed;
            top: 10px;
            right: 10px;
        }
        .dark-mode #toggleBtn {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <main>
            <h1>Formulaire de contact</h1>
            <form action="" method="POST" id="contactForm">
                <label for="name">Nom&nbsp;:</label>
                <input type="text" id="name" name="name" class="<?php echo isset($errors['name']) ? 'errorinput' : ''; ?>" required />
                <span id="nomError" class="errormessage"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>

                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" class="<?php echo isset($errors['firstname']) ? 'errorinput' : ''; ?>" required/>
                <span id="firstnameError" class="errormessage"><?php echo isset($errors['firstname']) ? $errors['firstname'] : ''; ?></span>

                <label for="genre">Genre</label>
                <select id="genre" name="genre" class="<?php echo isset($errors['genre']) ? 'errorinput' : ''; ?>" required>
                    <option value="">Sélectionnez votre genre</option>
                    <option value="women">Femme</option>
                    <option value="men">Homme</option>
                    <option value="other">Autre</option>
                </select>
                <span id="genreError" class="errormessage"><?php echo isset($errors['genre']) ? $errors['genre'] : ''; ?></span>

                <label for="mail">Mail</label>
                <input type="email" id="mail" name="mail" class="<?php echo isset($errors['mail']) ? 'errorinput' : ''; ?>" required/>
                <span id="mailError" class="errormessage"><?php echo isset($errors['mail']) ? $errors['mail'] : ''; ?></span>

                <label for="country">Pays</label>
                <input type="text" id="country" name="country" class="<?php echo isset($errors['country']) ? 'errorinput' : ''; ?>" required>
                <span id="countryError" class="errormessage"><?php echo isset($errors['country']) ? $errors['country'] : ''; ?></span>

                <label for="subject">Sujet</label>
                <input type="text" id="subject" name="subject" class="<?php echo isset($errors['subject']) ? 'errorinput' : ''; ?>">
                <span id="subjectError" class="errormessage"><?php echo isset($errors['subject']) ? $errors['subject'] : ''; ?></span>

                <label for="message">Message</label>
                <textarea id="message" name="message" class="<?php echo isset($errors['message']) ? 'errorinput' : ''; ?>" required></textarea>
                <span id="messageError" class="errormessage"><?php echo isset($errors['message']) ? $errors['message'] : ''; ?></span>

                <input type="submit" value="Envoyer" class="submit">
            </form>

            <!-- Icône pour le mode sombre -->
            <div id="toggleBtn">
                <i class="fas fa-moon"></i>
            </div>
        </main>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
