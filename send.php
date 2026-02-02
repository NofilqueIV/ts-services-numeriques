<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $service = htmlspecialchars($_POST["service"]);
    $details = htmlspecialchars($_POST["details"]);

    $to = "ts.services.numeriques@gmail.com";
    $subject = "Nouvelle demande de service - " . $service;

    $message = "
Bonjour,

Une nouvelle demande a été envoyée via le site.

Nom : $nom
Email : $email
Service demandé : $service

Détails de la demande :
$details

Cordialement,
$nom
";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    mail($to, $subject, $message, $headers);
}
?>
