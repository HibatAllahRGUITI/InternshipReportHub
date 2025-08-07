<?php
include "CONFIGURATION/connexion.php";


if (isset($_COOKIE['user'])) {
    $user_id = $_COOKIE['user'];
} else {
    echo "Cookie error";
    exit;
}

$sql_query = "SELECT * FROM utilisateur WHERE ID_utilisateur = $user_id";
$res = mysqli_query($conn, $sql_query);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
} else {
    echo "Erreur";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    // Retrieve form data
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Update user information in the database
    $sql_update = "UPDATE utilisateur SET Nom = '$nom', Penom = '$prenom', Email = '$email', Mot_de_passe = '$password' WHERE ID_utilisateur = $user_id";
    $res_update = mysqli_query($conn, $sql_update);

    if ($res_update) {
        echo "<script type=\"text/javascript\"> alert('Informations mises à jour avec succès'); window.location='compte.php';</script>";
    } else {
        echo "<script type=\"text/javascript\"> alert('Erreur lors de la mise à jour des informations'); </script>";
    }
}
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateurt</title>
    <link rel="stylesheet" href="STYLES/contact_us.css">
</head>
<body>



<div class="container" id="container">
      <h2>Modifier Utilisateur</h2>

      <form class="contact-form" action="#" method="POST">

        <div class="input-area">
            <input type="text" placeholder="Nom" name="nom"/>
        </div>

        <div class="input-area">
          <input type="text" placeholder="Prénom" name="prenom"/>
        </div>
        
        <div class="input-area">
          <input type="email" placeholder="Email " name="email"/>
        </div>

        <div class="input-area">
          <input type="password" placeholder="mot de passe" name="password"/>
        </div>
        
        
        <button class="sendbtn" name="update" id="update">Envoyer</button>
      </form>
</div>


    
</body>
</html>

