<?php
include "CONFIGURATION/connexion.php";

if (isset($_COOKIE['user'])) {
    $user_id = $_COOKIE['user'];
}else{
    echo "cookie error";
}


$sql_query = "SELECT * FROM utilisateur WHERE ID_utilisateur = $user_id";
$res = mysqli_query($conn, $sql_query);


if ($res && mysqli_num_rows($res) > 0) {
   
    $row = mysqli_fetch_assoc($res);
} else {
    
    echo "Erreur";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <h2>COMPTE<small><br>ADMINISTRATEURS</small></h2>
        <div id="users_icon">
      </main>

      <div class="container">
        <div class="profile-header">
          <img src="IMAGE/user2-setting-icon.png" alt="Profile Picture" class="profile-picture">
          <div class="user-name"><?php echo $row["Nom"]  . " " . $row["Penom"];?></div>
          <div class="user-email">Administrateur</div>
        </div>
      
        <div class="info-card">
          <h3></h3>
          <p><strong>Nom:&nbsp&nbsp&nbsp</strong><?php echo $row["Nom"]?></p>
          <p><strong>Prénom:&nbsp&nbsp&nbsp</strong><?php echo $row["Penom"]?></p>
          <p><strong>Email:&nbsp&nbsp&nbsp</strong><?php echo $row["Email"]?></p>
          <p><strong>Mot de passe:&nbsp&nbsp&nbsp</strong><?php echo $row["Mot_de_passe"]?></p>
        </div>
      
      
        <a href="modifier_utilisateur.php" class="button">Modifier</a>
        <a href="add_user.php" class="button">Ajouter compte</a>


      </div>

    
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');

body{
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;  
  font-size: 16px;
  background: #EEEEEE;
}



.sidebar {
  position: fixed;
  width: 20%;
  height: 100vh;
  background: #4399a3;
  font-size: 12px;
}

.nav {
  position: relative;
  margin: 0 15%;
  top: 40%;
  transform: translateY(-50%);
  font-weight: bold;
  margin-left: 0px;
}

.nav ul {
  list-style: none;
}

  
 .nav li {
    position: relative;
    margin:   40px 0;
    
  
   
    
 a {
      line-height: 2.5em;
      text-transform: uppercase;
      text-decoration: none;
      letter-spacing: 4px;
      color: rgba(#FFF, 0.35);
      display: block;
      transition: all ease-out 300ms;
    
    
    &.active a {
      color: white;
    }
    
    &:not(.active)::after {
      opacity: 0.2;
    }
    
    &:not(.active):hover a {
      color: rgba(#FFF, 0.75);
    }
    
    &::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 0.2em;
      background: black;
      left: 0;
      bottom: 0;
      background-image: linear-gradient(to right, #3800c6, #c00b84);
    }
  }
}

h2 {
  font-size: 36px;
  margin: 20px 0;
  text-align: center;
  margin-left: 150px;
  small {
    font-size: 0.5em;
  }
  letter-spacing: 1.5px;
  color: #545B77;

}

.container {
    margin-top: 80px;
      max-width: 800px;
      margin-left:  470px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .profile-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile-picture {
      width: 80px;

      object-fit: cover;
      margin-bottom: 10px;
    }

    .user-name {
      font-size: 24px;
      color: #333;
      margin-bottom: 5px;
    }

    .user-email {
      color: #666;
      margin-bottom: 20px;
    }

    .info-card {
      background-color: #f9f9f9;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 15px;
      line-height: 30px;
    }

    .info-card h3 {
      margin-top: 0;
    }

    .info-card p {
      margin: 5px 0;
    }

    .info-card:last-child {
      margin-bottom: 0;
    }

    .button {
        margin-top: 6px;
      display: inline-block;
      padding: 10px 20px;
      background-color: #39b8c3;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #0056b3;
    }

</style>