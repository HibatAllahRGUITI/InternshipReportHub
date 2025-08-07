<?php
include "CONFIGURATION/connexion.php";

$sql_requete = "SELECT * FROM rapports_stage, filiere, etudiant, rapports_etudiant, utilisateur
                WHERE rapports_stage.ID_rapport = rapports_etudiant.ID_rapport
                AND rapports_etudiant.ID_etudiant = etudiant.ID_etudiant
                AND etudiant.ID_utilisateur = utilisateur.ID_utilisateur
                AND etudiant.ID_filiere = filiere.ID_filiere
                ORDER BY date_dépot DESC LIMIT 5;";
$res = mysqli_query($conn , $sql_requete);

$sql_tot_rep = "SELECT COUNT(*) AS total_rapports FROM rapports_stage"; 
$res_tot_rep = mysqli_query($conn , $sql_tot_rep);

$sql_tot_etu = "SELECT COUNT(*) AS total_etudiants FROM etudiant"; 
$res_tot_etu = mysqli_query($conn , $sql_tot_etu);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="STYLES/dashboard_admin.css">
    <title>Stage Hub</title>
</head>
<body>
    <main class="main">
        
        <!--aside navbar-->
        <aside class="sidebar">
          <nav class="nav">
            <ul>
              <li class="active"><a href="dashboard_Admin.php">Tableau de bord</a></li>

              <li><a href="rapports_stages.php">Rapports de stages</a></li>
              <li><a href="utilisateurs.php">Utilisateurs</a></li>
              <li><a href="home_chef.php">Téléverser</a></li>
              <li><a href="compte.php">Mon Compte</a></li>
              <li><a href="index.php">Déconnecter</a></li>
            </ul>
          </nav>
        </aside>

        <h2>TABLEAU DE BORD<small><br>ADMINISTRATEURS</small></h2>
        <div class="wrapper">
            <div class="card">

            <?php
            if(mysqli_num_rows($res_tot_rep) > 0) {
              $row = mysqli_fetch_assoc($res_tot_rep);
            ?>
                <h3 class="card-title">TOTAL DES RAPPORTS</h3>
                <p class="card-content"><?php echo $row["total_rapports"]; ?></p>
                <button class="card-btn"><a href="rapports_stages.php">READ MORE</a></button>
            </div>
            <?php } ?>


            <div class="card">

            <?php
            if(mysqli_num_rows($res_tot_etu) > 0) {
              $row = mysqli_fetch_assoc($res_tot_etu);
            ?>
                <h3 class="card-title">TOTAL DES ETUDIANTS</h3>
                <p class="card-content"><?php echo $row["total_etudiants"]; ?></p>
                <button class="card-btn"><a href="utilisateurs.php">READ MORE</a></button>
            </div>
            <?php } ?>

        </div>

        <h3 id="history">RAPPORT DE STAGES LES PLUS RECENTS</h3>
        <div class="container">
            <ul class="responsive-table">
              <li class="table-header">
                <div class="col col-1">Titre Rapport</div>
                <div class="col col-2">Etudiant</div>
                <div class="col col-3">Filiere</div>
                <div class="col col-4">Date dépot</div>
              </li>

              <?php
                if(mysqli_num_rows($res)> 0){
                  while($row = mysqli_fetch_assoc($res)){   ?>
                    <li class="table-row">
                      <div class="col col-1" ><?php echo $row["titre_rapport"]; ?></div>
                      <div class="col col-2" ><?php echo $row["Nom"]." ". $row["Penom"]; ?></div>
                      <div class="col col-3" ><?php echo $row["Nom_filiere"]; ?></div>
                      <div class="col col-4" ><?php echo $row["date_dépot"]; ?></div>
                    </li>

                    <?php
                                }}
                                 else{
                                  ?>
                      <li class="table-row">
                          <div class="col col-2">Aucun rapport dans la base de donnée!</div>
                      </li>

                      <?php } ?>
              
            </ul>
          </div>

      </main>

    
</body>
</html>

<style>
 button a{
    text-decoration: none;
    color: #fff;
  }
</style>