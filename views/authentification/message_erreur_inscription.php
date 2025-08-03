<?php
session_start(); // N'oublie jamais session_start() au début du script

// Initialise les variables pour le type et le message de l'alerte
$alert_type = '';
$alert_message = '';
// Si un message de succès est passé par l'URL (comme pour la redirection après inscription)
if (isset($_GET['success']) && $_GET['success'] == 'connexion') {
    $alert_type = 'success'; // Alerte verte pour le succès
    $alert_message = 'Vous êtes connecté.';
}
if (isset($_GET['success']) && $_GET['success'] == 'True') {
    $alert_type = 'success'; // Alerte verte pour le succès
    $alert_message = 'Tâche ajoutée avec succès';
}
// Tu peux ajouter d'autres conditions ici pour d'autres types de messages
if (isset($_SESSION['login_errors']) && !empty($_SESSION['login_errors'])) {
    $alert_type = 'danger'; // Alerte rouge pour les erreurs
    $alert_message = '<strong>Erreur(s) de connexion :</strong><ul>';
    foreach ($_SESSION['login_errors'] as $error) {
        $alert_message .= '<li>' . htmlspecialchars($error) . '</li>';
    }
    $alert_message .= '</ul>';
    // Nettoie la session après affichage
    unset($_SESSION['login_errors']);
    unset($_SESSION['old_login_input']); // Si tu nettoies aussi les anciennes entrées
}
// Si un message est défini, affiche l'alerte
if (!empty($alert_message)) {
    echo '<div class="container mt-2 col-3">'; // Ajout d'un conteneur pour le style
    echo '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert">';
    echo $alert_message;
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
    echo '</div>';
}

//      echo '<div class="container"><figure class="text-center"><blockquote class="blockquote"><p>'. $_SESSION['user_name'].'</p>
//   </blockquote><figcaption class="blockquote-footer">'.$_SESSION['user_email'].'</figcaption></figure></div>' ;
       
?>
