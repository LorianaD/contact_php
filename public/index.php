    <?php
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $name = $_POST["name"]?? "";
            $email = $_POST["email"]?? "";
            $phone = $_POST["phone"]?? "";
            $suject = $_POST["suject"]?? "";
            $msg = $_POST["msg"]?? "";

            $errors = [];

            if (!empty($name) && !empty($email) && empty($phone) && !empty($suject) && !empty($msg)) {

                $newContact = [
                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone,
                    "sujet" => $suject,
                    "msg" => $msg
                ];

            };

            session_start(); // On démarre une nouvelle session

            $id_SESSION = session_id(); // On utilise session_id() pour récupérer l'id de session s'il existe.

            if($id_SESSION){
                var_dump($id_SESSION);
            };

            // $errors[] = "veuillez renseigner tout les champs";

            if (empty($errors)) {

                $name = htmlspecialchars(trim($name));
                $email = htmlspecialchars(trim($email));
                $phone = htmlspecialchars(trim($phone));
                $suject = htmlspecialchars(trim($suject));
                $msg = htmlspecialchars(trim($msg));
            };

            if (empty($errors)) {
            ?>

                <p>Votre message a été envoyé</p>

            <?php
            } else {
                foreach($errors as $error) {
                    ?>
                    <div>
                       <span><?= $error ?></span> 
                    </div>
                    <?php
                };
            };

        };      
    ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
        
        <form action="" method="post">
            <h2>Nous contacter</h2>
            <div class="enter">
                <label for="name">Ton nom</label>
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
    </main>
    <?php include '../includes/footer.php'; ?>
    <!-- include "": continue a travailler meme si il ne trouve pas le fichier -->
    <!-- require "": bloque tous s'il ne trouve pas le fichier -->
</body>
</html>