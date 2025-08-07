<?php

include "CONFIGURATION/connexion.php";

$sql_requete="SELECT * FROM rapports_stage, rapports_etudiant, etudiant, filiere 
              WHERE rapports_stage.ID_rapport = rapports_etudiant.ID_rapport
              AND rapports_etudiant.ID_etudiant = etudiant.ID_etudiant
              AND etudiant.ID_filiere = filiere.ID_filiere;";

$res = mysqli_query($conn , $sql_requete);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage Hub</title>
    <link rel="stylesheet" href="STYLES/rapports_stages.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar">
        <a href="index.php"><img src="IMAGE/ensa_noback_blue.png" alt="Logo" id="logo"></a>
        <div class="center-text">
          SESSION ADMINISTRATEUR
        </div>
        <div class="nav-links">
          <a href="/Administrateur.php"><img src="IMAGE/exit-blue.png" alt="" id="exit"></a>
        </div>
      </nav> 

      <div class="main">
        <img src="IMAGE/reports.png" alt="" width="100px">
        <h1>RAPPORT DE STAGES</h1>

        <div class="table-reports">
            <table class="reports-table">
                <thead>
                    <tr>
                        <th>Titre Rapport</th>
                        <th>Date de dépot</th>
                        <th>Filière</th>
                        <th></th>
                        <th></th>
                        <th>
                          <form action="#" method="POST">
                            <input type="search" required placeholder="Rechercher..." name="search" id="search">
                            <button type="submit" id="submit" name="submit"><i class="fa fa-search"></i></button>
                          </form>
                      </th>
                    </tr>
                </thead>

                        <?php
                              if(isset($_POST['submit'])){
                                $search = $_POST['search'];
                                $sql_requete = "SELECT * FROM rapports_stage , rapports_etudiant, etudiant, filiere
                                                WHERE titre_rapport LIKE '%$search%' OR date_dépot LIKE '%$search%' 
                                                AND rapports_stage.ID_rapport = rapports_etudiant.ID_rapport
                                                AND rapports_etudiant.ID_etudiant = etudiant.ID_etudiant
                                                AND etudiant.ID_filiere = filiere.ID_filiere;";
            
                                $res = mysqli_query($conn , $sql_requete);
                                if(mysqli_num_rows($res) > 0){
                                  while($row = mysqli_fetch_assoc($res)){
                                    $file_path = $row["chemin_fichier"];


                                    ?>
                                    <tr>
                                      <td><?php echo $row["titre_rapport"]; ?></td>
                                      <td><?php echo $row["date_dépot"]; ?></td>
                                      <td><?php echo $row["Nom_filiere"]; ?></td>
                                      <td><button type="button" id="vue"><a href="details_report.php?id=<?php echo $row["ID_rapport"]; ?>">Détails</a></button></td>
                                      <td><button type="button" id="download"><a href="<?php echo $file_path; ?>">Télécharger</a></button></td>
                                      <td><button type="button" id="supprimer"><a href="?action=supprimer&id=<?php echo $row["ID_rapport"]; ?>">Supprimer</a></button></td>
                                    </tr>
                                    <?php
                                }}
                                 else{
                                  ?>
                                  <tr>
                                    <td colspan="4">Aucun rapport déposé pour cette recherche.</td>
                                  </tr>
                                  <?php
                                    
                                }
                            }else{
                            ?>
                <tbody>
                  <?php
                    if(mysqli_num_rows($res)> 0){
                      while($row = mysqli_fetch_assoc($res)){
                        $file_path = $row["chemin_fichier"];
                        ?>
                        <tr>
                          <td><?php echo $row["titre_rapport"]; ?></td>
                          <td><?php echo $row["date_dépot"]; ?></td>
                          <td><?php echo $row["Nom_filiere"]; ?></td>
                          <td><button type="button" id="vue"><a href="details_report.php?id=<?php echo $row["ID_rapport"]; ?>">Détails</a></button></td>
                          <td><button type="button" id="download"><a href="<?php echo $file_path; ?>">Télécharger</a></button></td>
                          <td><button type="button" id="supprimer"><a href="?action=supprimer&id=<?php echo $row["ID_rapport"]; ?>">Supprimer</a></button></td>

                          <?php
                           if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id']) && !empty($_GET['id'])) {
                            $id = $_GET['id'];

                            $sql = "DELETE FROM rapports_stage WHERE ID_rapport = $id";

                            if ($conn->query($sql) === TRUE) {
                                echo "Le fichier a été supprimé avec succès.";
                            } else {
                                echo "Erreur lors de la suppression du fichier : " . $conn->error;
                            }
                  }
                          ?>
                        </tr>
                        <?php
                      }
                    }
                    else{
                      ?>
                      <tr>
                        <td colspan="4">Aucun rapport déposé pour le moment.</td>
                      </tr>
                      <?php
                    }
                  
                  ?>
                    
                </tbody>
            </table>
            
        </div>
      </div>
      <?php
      include "PARTIALS/footer_inside.php";?>
 
</body>

</html>

<?php           }?>


