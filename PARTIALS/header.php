<?php
require('.\CONFIGURATION\database.php');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stage Hub</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
    </head>

    <body>
        <nav>
        <div class="wrapper">
            <div class="logo"><img src="IMAGE/ensa-noback.png" alt="" width="30%"></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><img src="IMAGE/signs.png" alt="" width="10%"></label>
                <li><a href="/index.php">HOME</a></li>
                <li><a href="/Administrateur.php">ADMINISTRATEUR</a></li>
                <li><a href="/chef.php">CHEF DE DEPARTEMENT</a></li>
                <li><a href="/secretaire.php">SECRETAIRE</a></li>
                <li><a href="/etudiant.php">ETUDIANT</a></li>   
                <li><a href="/contact_us.php">CONTACTEZ NOUS</a></li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><img src="IMAGE/menu.png" alt="" width="10%"></label>
        </div>
        </nav>

        <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

nav{
  position: relative;
  z-index: 99;
  width: 100%;
 
}

nav .wrapper{
    display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  max-width: 1300px;
  padding: 0px 20px;
  height: 70px;
  line-height: 70px;
  margin: 20px;
  
}

.wrapper .nav-links{
  display: inline-flex;
}

.nav-links li{
  list-style: none;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.nav-links li a{
  color: #E5AAAA;
  text-decoration: none;
  font-size: 16.8px;
  font-weight: 500;
  padding: 9px 15px;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.nav-links li a:hover{
  background: #622525;
}

.wrapper .btn{
  color: #fff;
  cursor: pointer;
  display: none;
}

.wrapper .btn.close-btn{
  position: absolute;
  left: 30px;
  top: 10px;
}

.wrapper .menu-btn{
  position: absolute;
  top: -5px;
  right: -400px;
}




@media screen and (max-width: 970px) {
  .wrapper .btn{
    display: block;
  }

  .wrapper .nav-links{
    position: fixed;
    height: 100vh;
    width: 100%;
    max-width: 350px;
    top: 0;
    left: -100%;
    background: #242526;
    display: block;
    padding: 50px 10px;
    line-height: 50px;
    overflow-y: auto;
    box-shadow: 0px 15px 15px rgba(0,0,0,0.18);
    transition: all 0.3s ease;
  }
  #menu-btn:checked ~ .nav-links{
    left: 0%;
  }
  #menu-btn:checked ~ .btn.menu-btn{
    display: none;
  }
  #close-btn:checked ~ .btn.menu-btn{
    display: block;
  }
  .nav-links li{
    margin: 15px 10px;
  }

  .nav-links li a{
    padding: 0 20px;
    display: block;
    font-size: 20px;
  }

}

nav input{
  display: none;
}


</style>