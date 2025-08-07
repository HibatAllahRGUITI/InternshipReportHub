<?php
include 'PARTIALS\header.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];

    $to = "rguitihibatallah@gmail.com"; // Your email address where you want to receive the messages
    $body = "Nom Complet: $name\nEmail: $email\n\n$message";

    if (mail($to, $subject, $body)) {
        echo "<p>Merci pour nous contacter.</p>";
    } else {
        echo "<p>erreur lors du transmission du message.</p>";
    }
}
?>


<link rel="stylesheet" href="STYLES/contact_us.css">


<div class="container" id="container">
      <h2>Contactez nous</h2>
      <form class="contact-form" method="POST" action="#">
        <div class="input-area">
          <input type="text" placeholder="Nom complet" name="name"/>
        </div>
        <div class="input-area">
          <input type="email" placeholder="Email " name="email"/>
        </div>
        <div class="input-area">
          <input type="text" placeholder="Sujet" name="sujet"/>
        </div>
        <div class="input-area h-80">
          <textarea placeholder="Votre message" name="message"></textarea>
        </div>
        <button class="sendbtn" name="send">Envoyer</button>
      </form>
</div>
    <script>
        const contactform = document.querySelector('.contact-form');
        const container = document.querySelector('.container');

        contactform.addEventListener('submit', (event) => {
            event.preventDefault();
            container.innerHTML = '<p>Merci pour votre message. <br /> Votre demande est en cours de traitement et nous vous répondrons dès que possible.</p>';
        });
    </script>


   