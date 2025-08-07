<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface de Dépôt de Rapports de Stage</title>
  <link rel="stylesheet" href="STYLES/home_chef.css">
</head>
<body>
  <div class="class1">
    <h1>Formulaire de Dépôt de Rapport de Stage</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="class2">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>
      </div>
      <div class="class2">
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" required></textarea>
      </div>
      <div class="class2">
        <label for="date_depot">Date de dépôt :</label>
        <input type="date" id="date_depot" name="date_depot" required>
      </div>
      <div class="class2">
        <label for="date_rapport">Date du rapport :</label>
        <input type="date" id="date_rapport" name="date_rapport" required>
      </div>
      <div class="class2">
        <label for="file">Chemin du fichier :</label>
        <input type="file" id="file" name="file" required>
      </div>
      <div class="class2">
        <label for="etudiants">Liste des étudiants concernés :</label>
        <input type="text" id="etudiants" name="etudiants" required>
      </div>
      <button type="submit">Soumettre</button>
    </form>
  <?php
    if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file']) ) {

      include "CONFIGURATION/connexion.php";

        $titre = htmlspecialchars($_POST["titre"]);
        $description = htmlspecialchars($_POST["description"]);
        $date = htmlspecialchars($_POST["date_depot"]);
        $date_rapport = htmlspecialchars($_POST["date_rapport"]);
        $etudiants = htmlspecialchars($_POST["etudiants"]);

        $nom_fichier = $_FILES['file']['name'];
        $fichier_tmp = $_FILES['file']['tmp_name'];
        $file_EXT = explode('.', $nom_fichier);
        $fileName = $file_EXT[0];
        $file_EXT = strtolower(end($file_EXT));
        
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);

        }

        
        $chemin_fichier = 'UPLOADS/REPORTS/' . $fileName .'.' .$file_EXT;

        move_uploaded_file($fichier_tmp, $chemin_fichier);
        

        $sql = "INSERT INTO rapports_stage (titre_rapport, description_rapport, date_dépot, date_rapport, chemin_fichier)
                VALUES ('$titre', '$description', '$date','$date_rapport', '$chemin_fichier')";

        if ($conn->query($sql) === TRUE) {

            $rapport_id = $conn->insert_id;
            $etudiants_array = explode(",", $etudiants);
            
            foreach ($etudiants_array as $etudiant_id) {
                $etudiant_id = trim($etudiant_id);
                $sql_association = "INSERT INTO rapports_etudiant (ID_rapport, ID_etudiant)
                                    VALUES ('$rapport_id', '$etudiant_id')";
                $conn->query($sql_association);
            }
            
            echo "Le rapport de stage a été soumis avec succès.";
        } else {
            echo "Erreur lors de la soumission du rapport de stage : " . $conn->error;
        }
        
        $conn->close();
}
?>

  </div>
</body>
</html>
