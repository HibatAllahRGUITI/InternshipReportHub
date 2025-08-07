<?php
include 'PARTIALS\header.php';
?>
<link rel="stylesheet" href="STYLES/secretaire.css">

<div class="container" id="container">
	<div class="form-container pic-container">
        <img src="IMAGE/secretaire1.jpg" alt="" width="500px">
	</div>
	<div class="form-container sign-in-container">
	<?php
		 $emailErr=$passErr='';

		if ($_SERVER["REQUEST_METHOD"] === "POST"){
			if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
				require_once "CONFIGURATION/connexion.php";
				$email = $_POST['email'];
				$pass = $_POST['password'];

				$sql_requete = "select * from utilisateur where Email='$email'  AND ID_role=3";

				$res = mysqli_query($conn , $sql_requete);

				if (mysqli_num_rows($res) > 0) {

					$row = mysqli_fetch_assoc($res);

					$password = $row['Mot_de_passe'];


					if ($password == $pass) {   
						echo"<script>
							window.location.href = 'home_secretaire.php';
						</script>	";
						exit();
					} else {

						$passErr = "*Mot de passe incorrect!";
					}

				} else {
					$emailErr = "*Email incorrect ou Mot de passe incorrect!";
				}

			}
			else{
				echo "<script type=\"text/javascript\"> alert('Vous devez remplir tous les champs!');</script>";
			}}					
?>
		<form action="#" method="POST">
			<h1>COMPTE SECRETAIRE</h1>
            <br>
			<span class="error" style="color: #ae4b4b; font-size: 12px;"><?php echo $emailErr; ?></span>
			<input type="email" placeholder="Email" name="email"/>
			<span class="error" style="color: #ae4b4b; font-size: 12px;"><?php echo $passErr; ?></span>
			<input type="password" placeholder="Mot de passe" name="password"/>
			<a href="forgot.php">Forgot your password?</a>
			<button id="login" name="login">Connexion</button>
		</form>
	</div>
</div>

<?php 
include "PARTIALS/footer.php";
?> 





