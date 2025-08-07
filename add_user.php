<?php
include "CONFIGURATION/connexion.php";
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
      <h2>Ajouter Utilisateur</h2>

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
        
        <div class="input-area">
          <select name="filiere" id="filiere">
            <option value="info">Informatique</option>
            <option value="finance">Finance</option>
            <option value="electrique">éléctrique</option>
            <option value="industriel">Industriel</option>
            <option value="mecanique">Mécanique</option>
            <option value="civil">Civil</option>
          </select>
        </div>

        <div class="input-area">
            <select name="role" id="role">
                <option value="administrateur">Administrateur</option>
                <option value="chef">Chef de département</option>
                <option value="secretaire">Secretaire du département</option>
                <option value="etudiant">Etudiant</option>
            </select>
        </div>
        
        <button class="sendbtn" name="send" id="send">Envoyer</button>
      </form>
</div>

<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["send"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $filiere = strtolower($_POST["filiere"]);
        $role = strtolower($_POST["role"]);
    
        $id_sql = "SELECT ID_filiere, ID_role FROM filiere, role WHERE Nom_filiere = '$filiere' AND Nom_Role ='$role'";
    
        $res_id= mysqli_query($conn , $id_sql);

    
        if ($res_id && mysqli_num_rows($res_id) > 0 ){
    
            $row_id = mysqli_fetch_assoc($res_id);

    
            $id_filiere = $row_id['ID_filiere'];
            $id_role = $row_id['ID_role'];
    
            $sql_requete = "INSERT INTO TABLE utilisateur(Nom, Penom, Email, Mot_de_passe, ID_role, ID_filiere) values('$nom', '$prenom', '$email', '$password', '$id_role', '$id_filiere')";
    
            $res = mysqli_query($conn , $sql_requete);
            
            if(mysqli_num_rows($res) > 0){
                echo "<script type=\"text/javascript\"> alert('Utilisateur ajouté avec succès'); 
                window.location='compte.php';</script>";
                
            }else{
                echo "<script type=\"text/javascript\" > alert('erreur d'ajout de l'utilisateur!'); </script>";
            }
    }else{ 
        die("Error: Unable to retrieve role ID");
     }
    
    
     }}else{ 
?>
    
</body>
</html>

<?php } ?>