<?php
header('Content-Type: application/json');
// CORS - à adapter en prod
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
require_once('connexion.php');
/* function redirectWithError($message="") {
        header("Location:/tests/Projet_gestion_bibliotheque/views/authentification/connection.php?success=". urlencode($message));
        exit();
    }*/

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Réponse pour prévol OPTIONS (CORS)
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['message' => 'Méthode non autorisée.']);
    exit;
}

// Lecture du JSON envoyé
$donnees_json = file_get_contents("php://input");
$donnees = json_decode($donnees_json, true);

if (!$donnees) {
    http_response_code(400);
    echo json_encode(['message' => 'Données JSON invalides.']);
    exit;
}

// Extraction et nettoyage des données
$nom = trim(htmlspecialchars($donnees['nom'] ?? ''));
$prenom = trim(htmlspecialchars($donnees['prenom'] ?? ''));
$sexe = trim(htmlspecialchars($donnees['sexe'] ?? ''));
$role = trim(htmlspecialchars($donnees['role'] ?? ''));
$numTel = trim(htmlspecialchars($donnees['numTel'] ?? ''));
$email = trim(htmlspecialchars($donnees['email'] ?? ''));
$motPasse = trim($donnees['motPasse'] ?? '');

// Validation simple
$errors = [];
if ($nom === '') $errors[] = "Le nom est requis.";
if ($prenom === '') $errors[] = "Le prénom est requis.";
if (!in_array($sexe, ['Masculin', 'Féminin'])) $errors[] = "Le sexe est requis et doit être valide.";
if ($role === '') $errors[] = "La fonction est requise.";
if ($numTel === '') $errors[] = "Le numéro de téléphone est requis.";
if ($email === '') {
    $errors[] = "L'email est requis.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email n'est pas un format valide.";
}
$regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>\/?]).{8,}$/';
if ($motPasse === '') {
    $errors[] = "Le mot de passe est requis.";
} elseif (!preg_match($regex, $motPasse)) {
    $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
}
// Vérifier unicité de l'email
$sql = "SELECT id FROM admin WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    http_response_code(409); // Conflict
    $errors[]="Cet email est déjà utilisé.";
}

if (count($errors) > 0) {
    http_response_code(422); // Unprocessable Entity
    echo json_encode(['message' => 'Inscription échouée.' ]);
    exit;
}else if(empty($errors)){
    // echo json_encode(['message' => 'Validation réussie.' ]);
    // Hachage du mot de passe
    $motPasseHache = password_hash($motPasse, PASSWORD_DEFAULT);
    // Insertion en base
    $sql = "INSERT INTO admin (nom, prenom, sexe,email , numTel, role, motPasse) VALUES (:nom, :prenom, :sexe,:email , :numTel, :role, :motPasse)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':sexe', $sexe);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':numTel', $numTel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':motPasse', $motPasseHache);
    if ($stmt->execute()) {
        http_response_code(201); // Created
        echo json_encode(['message' => "Inscription réussie, veuillez vous connecter"]);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(['message' => "Erreur lors de l'enregistrement."]);
    }
    exit;
}
?>
