<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de gegevens op uit het formulier
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Vervang hier met jouw eigen e-mailadres
    $to = "reinderssenn@gmail.com";  // Verander dit naar je eigen e-mailadres
    $subject = "Nieuw bericht van contactformulier";
    
    // E-mail header
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // E-mail body
    $body = "
    <html>
    <head>
    <title>Nieuw bericht van contactformulier</title>
    </head>
    <body>
    <h2>Contactformulier bericht</h2>
    <p><strong>Naam:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Bericht:</strong><br>{$message}</p>
    </body>
    </html>
    ";

    // Stuur de e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Bedankt voor je bericht. We nemen zo snel mogelijk contact met je op.";
    } else {
        echo "Er is een fout opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.";
    }
} else {
    echo "Ongeldige verzoekmethode.";
}
?>