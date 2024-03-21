
<?php

// Database configuration
$servername = "sql104.infinityfree.com";
$username = "if0_36211399";
$password = "qCmPjBZj4pi09Ji";
$dbname = "if0_36211399_tickets";


// **Verbindihoing maken met de database**

$conn = new mysqli($servername, $username, $password, $dbname);

// **Controleer of de verbinding is gelukt**

if ($conn->connect_error) {
  die("Connectie met de database mislukt: " . $conn->connect_error);
}

// **Haal de formuliergegevens op**

$naam = $_POST['naam'];
$email = $_POST['email'];
$bericht = $_POST['bericht'];

// **Voeg de gegevens toe aan de database**

$sql = "INSERT INTO contactformulier (naam, email, bericht) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sss", $naam, $email, $bericht);

$stmt->execute();

// **Sluit de databaseverbinding**

$conn->close();

// **Bevestiging naar de gebruiker**

echo "Bedankt voor uw bericht! We nemen zo spoedig mogelijk contact met u op.";

?>
