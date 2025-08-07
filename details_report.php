<?php  

    
    if(isset($_GET["id"])){

        require_once "CONFIGURATION/connexion.php";
        $id=$_GET["id"];

        $sql="SELECT * FROM rapports_stage
                WHERE ID_rapport = $id";

        $result = mysqli_query($conn , $sql);
        
        if(mysqli_num_rows($result) > 0){
            $row=mysqli_fetch_assoc($result); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage Hub</title>
    <link rel="stylesheet" href="STYLES/details_reports.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php"><img src="IMAGE/ensa_noback_blue.png" alt="Logo" id="logo"></a>
        <div class="center-text">
          SESSION SECRETAIRE
        </div>
        <div class="nav-links">
          <a href="/index.php"><img src="IMAGE/exit-blue.png" alt="" id="exit"></a>
        </div>
      </nav> 

      <div class="main">
        <img src="IMAGE/reports.png" alt="" width="100px">
        <h1>DETAILS DU RAPPORT</h1>
        <div class="wrapper">
            <ul>
                <li>
                    <label for="title" >Titre du rapport :</label>
                    <p id="titre_rapport"><?php echo $row["titre_rapport"] ?></p>
                </li>
                <li>
                    <label for="date_rapport">Date du rapport : </label>
                    <p id="date_rapport"><?php echo $row["date_rapport"]?></p>
                </li>
                <li>
                    <label for="dete_depot">Date du dépot :</label>
                    <p id="date_depot"><?php echo $row["date_dépot"]?></p>
                </li>
                <li>
                    <label for="description">Descrition du rapport :</label>
                    <p id="description"><?php echo $row["description_rapport"]?></p>
                </li>
                        <?php

    }
    else{
        ?>
        <h3>somethig went wrong!</h3>
    <?php
    }
    
}
                    ?>
            </ul>
        </div>

        <?php
$conn->close();
?>
        
</body>
</html>