<?php
include "CONFIGURATION/connexion.php";

$sql_requete = "SELECT * FROM utilisateur, role, filiere
                WHERE utilisateur.ID_role = role.ID_role
                AND utilisateur.ID_filiere = filiere.ID_filiere;";
$res = mysqli_query($conn , $sql_requete);


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

        <h2>TABLEAU DE BORD<small><br>ADMINISTRATEURS</small></h2>
        <div id="users_icon">
            <img src="IMAGE/users-icon.png" alt="" width="8%"></div>
        <h3 id="history">UTILISATEURS</h3>
        <div class="container">
            
            <ul class="responsive-table">
              <li class="table-header">
                <div class="col col-1">Nom</div>
                <div class="col col-2">Prenom</div>
                <div class="col col-3">Email</div>
                <div class="col col-4">Role</div>
                <div class="col col-5">Filière</div>
                <div class="col col-6"></div>
              </li>
             
             <?php 
              if(mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
              ?>

              <li class="table-row">
                <div class="col col-1" ><?php echo $row["Nom"];  ?></div>
                <div class="col col-2" ><?php echo $row["Penom"];   ?></div>
                <div class="col col-3" ><?php echo $row["Email"];   ?></div>
                <div class="col col-4" ><?php echo $row["Nom_Role"]; ?></div>
                <div class="col col-5" ><?php echo $row["Nom_filiere"]; ?></div>
                <div class="col col-6"><button type="button" id="supprimer"><a href="?action=supprimer&id=<?php echo $row["ID_utilisateur"]; ?>">Supprimer</a></button></div>

                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "DELETE FROM utilisateur WHERE ID_utilisateur = $id";

                if ($conn->query($sql) === TRUE) {
                    echo "L'utilisateur a été supprimé avec succès.";
                } else {
                    echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
                }
                }
                ?>
               
              </li>
              <?php }}else{?>
            </ul>
            
          </div>
          
         
            <div class="col col-2" ><p>Aucun utilisateur n'est trouvé!</p></div>
            
<?php }?>
      </main>

    
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');

body{
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;  
  font-size: 16px;
  background: #EEEEEE;
}

#history{
    text-align: center;
    color: #547775; 
    margin-left: 150px; 
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

.container {
  max-width: 1000px;
  margin-left: 350px;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  margin-left: 150px;
  small {
    font-size: 0.5em;
  }
  letter-spacing: 1.5px;
  color: #545B77;

}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
  }
  .table-header {
    background-color: #9CAFAA;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 20%;
  }
  .col-2 {
    flex-basis: 20%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 20%;
  }
  .col-5{
    flex-basis: 20%;
  }
  .col-6{
    flex-basis: 10%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;

      }
    }
  }
}

 .wrapper{
     display: flex;
     justify-content: center;
     flex-wrap: wrap;
     margin-left: 150px;
}

#users_icon{
  text-align: center;
  margin-left: 150px;
}

#supprimer{
    background-color: #d62121;
    padding: 3px 8px 3px 8px;
    border-radius: 8px;
    border-color: transparent;
    color: #ffffff;
    cursor: pointer;
}
#supprimer a{
    text-decoration: none;
    color: white;
    background-color: transparent;
}


</style>