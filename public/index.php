    <?php

        session_start(); // On démarre la session

        if (!isset($_SESSION["contacts"])) { // differente de null
            $_SESSION["contacts"] = []; // $_SESSION on stock les données
        }
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") { // requette au seveur en POST

            $name = htmlspecialchars(trim($_POST["name"]?? ""));
            $email = htmlspecialchars(trim($_POST["email"]?? ""));
            $phone = htmlspecialchars(trim($_POST["phone"]?? ""));
            $suject = htmlspecialchars(trim($_POST["suject"]?? ""));
            $msg = htmlspecialchars(trim($_POST["msg"]?? ""));

            if (!empty($name) && !empty($email) && !empty($phone) && !empty($suject) && !empty($msg)) { // ! = different // different de vide

                $newContact = [
                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone,
                    "suject" => $suject,
                    "msg" => $msg
                ];

                // On ajoute un message dans la session
                $_SESSION["contacts"][] = $newContact;

            };

        };

        $contacts = $_SESSION['contacts'];

    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
        <section>
        <form action="" method="post">
            <h2>Nous contacter</h2>
            <div class="enter">
                <label for="name">Votre nom</label>
                <input type="text" name="name" id="name" placeholder="Entrez votre nom">
            </div>
            <div class="enter">
                <label for="email">Votre adresse éléctronique</label>
                <input type="text" name="email" id="email" placeholder="Entrez votre adresse éléctronique">
            </div>
            <div class="enter">
                <label for="phone">Votre numéro de téléphone</label>
                <input type="text" name="phone" id="phone" placeholder="Entrez vontre numéro de téléphone">
            </div>
            <div class="enter">
                <label for="suject">Objet</label>
                <input type="text" name="suject" id="suject" placeholder="Entrez l' objet de votre message">
            </div>
            <div class="enter">
                <label for="msg">Votre message</label>
                <textarea type="text" name="msg" id="msg" placeholder="Entrez votre message"></textarea>
            </div>
            <div class="enter">
                <input type="submit" value="Envoyer" class="btn-submit">
            </div>
        </form>
        </section>
        <section>
            <?php 
                if(!empty($contacts)) { // Si les contacts est different de vide alors
                    foreach ($contacts as $contact) { // pour chaque contact faire une echo de ...
                        echo "
                        <article>
                            <h3>$contact[name]</h3>
                            <span>l'email est: $contact[email]</span>
                            <p>
                                $contact[suject]
                            </p>
                            <p>
                                $contact[msg]
                            </p>
                        </article>
                        ";
                    }
                    
                }else{ // sinon envoyer ce message
                    var_dump($_SESSION['contacts']);
                    echo "
                        <p>
                            Nous n'avons pas reçu de messages!
                        </p>
                    ";
                }
            ?>
        </section>
    </main>
    <?php include '../includes/footer.php'; ?>
    <!-- include "": continue a travailler meme si il ne trouve pas le fichier -->
    <!-- require "": bloque tous s'il ne trouve pas le fichier -->
</body>
</html>