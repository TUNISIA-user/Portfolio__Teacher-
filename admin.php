<?php
// Connexion à la base de données
$conn = new mysqli("hostname", "username", "password", "database");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification des champs POST
if (!isset($_POST['name'], $_POST['email'], $_POST['course'], $_POST['message'])) {
    die("Tous les champs sont requis.");
}

// Récupération des données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$message = $_POST['message'];

// Préparation de la requête
$stmt = $conn->prepare("INSERT INTO Messages (Name, Email, Course, Message) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die("Erreur de préparation de la requête : " . $conn->error);
}

// Liaison des paramètres
$stmt->bind_param("ssss", $name, $email, $course, $message);

// Exécution de la requête
if ($stmt->execute()) {
    echo "tw njawbok 3ala 9rib ya bahi";
} else {
    echo "Erreur lors de l'exécution : " . $stmt->error;
}

// Fermeture de la requête et de la connexion
$stmt->close();
$conn->close();
?>


