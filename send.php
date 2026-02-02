<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.html");
    exit;
}

// Sécurisation des données
$nom = trim(htmlspecialchars($_POST["nom"] ?? ""));
$email = filter_var($_POST["email"] ?? "", FILTER_VALIDATE_EMAIL);
$service = trim(htmlspecialchars($_POST["service"] ?? ""));
$details = trim(htmlspecialchars($_POST["details"] ?? ""));

if (!$nom || !$email || !$service || !$details) {
    die("Formulaire incomplet.");
}

$to = "ts.services.numeriques@gmail.com";
$subject = "Nouvelle demande – $service";

$message = <<<MAIL
Bonjour,

Une nouvelle demande de service a été envoyée via le site TS Services Numériques.

Nom : $nom
Email : $email
Service demandé : $service

Détails de la demande :
$details

---
Message envoyé depuis le formulaire de contact
MAIL;

$headers = [
    "From: TS Services Numériques <no-reply@ts-services-numeriques.fr>",
    "Reply-To: $email",
    "Content-Type: text/plain; charset=UTF-8"
];

mail($to, $subject, $message, implode("\r\n", $headers));

// Redirection après envoi
header("Location: merci.html");
exit;

