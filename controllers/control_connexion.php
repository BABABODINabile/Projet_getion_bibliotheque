<?php
    require_once('connexion.php'); // S'assurer que ce fichier contient la connexion $pdo
    // La fonction redirectWithError est supprimée car sa logique est intégrée.
?>

<?php
    session_start(); // Démarre la session au tout début du script

    // Initialisation du tableau d'erreurs et des anciennes entrées
    $errors = [];
    $old_input = [];

    // Ce bloc gère uniquement la soumission du formulaire (méthode POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email'] ?? '');
        $motPasse = $_POST['motPasse'] ?? ''; // Mot de passe en clair saisi par l'utilisateur

        // --- 1. Validation des champs d'entrée côté serveur ---
        if (empty($email)) {
            $errors[] = "L'email est requis.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email n'est pas un format valide.";
        }

        if (empty($motPasse)) {
            $errors[] = "Le mot de passe est requis.";
        }

        // --- 2. Si aucune erreur de validation initiale, procéder à la vérification en base de données ---
        if (empty($errors)) {
            $sql = "SELECT id, nom, prenom, email,role, motPasse FROM admin WHERE email = :email";

            if ($stmt = $pdo->prepare($sql)) {
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    if ($stmt->rowCount() === 1) { // Un utilisateur avec cet email a été trouvé
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        $motDePasseHacheStocke = $user['motPasse']; // Récupère le hachage stocké en BD

                        // --- 3. VÉRIFICATION DU MOT DE PASSE HACHÉ ---
                        if (password_verify($motPasse, $motDePasseHacheStocke)) {
                            // Mot de passe correct ! L'utilisateur est authentifié.

                            // Stocke les informations de l'utilisateur en session
                            $_SESSION['logged_in'] = true;
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['user_email'] = $user['email'];
                            $_SESSION['user_name'] = $user['nom'] . ' ' . $user['prenom'];
                            $_SESSION['user_role'] = $user['role'];
                            // Redirige vers la page principale après succès
                            header("Location:/tests/Projet_gestion_bibliotheque/views/dashboard/principale.php?success=connexion");
                            exit(); // Très important après une redirection

                        } else {
                            // Mot de passe incorrect
                            $errors[] = "Email ou mot de passe incorrect.";
                        }
                    } else {
                        // Aucun utilisateur trouvé avec cet email, ou plus d'un (anomalie)
                        // Dans les deux cas, les identifiants ne correspondent pas à un unique utilisateur valide
                        $errors[] = "Email ou mot de passe incorrect.";
                    }
                } else {
                    // Erreur lors de l'exécution de la requête SQL
                    $errors[] = "Une erreur est survenue lors de la connexion. Veuillez réessayer.";
                    // Optionnel: log l'erreur réelle $stmt->errorInfo() pour le debug
                }
            } else {
                // Erreur lors de la préparation de la requête SQL
                $errors[] = "Une erreur système est survenue. Veuillez réessayer plus tard.";
                // Optionnel: log l'erreur réelle $pdo->errorInfo() pour le debug
            }
        }// --- 4. Gestion finale des erreurs et redirection (si le script n'a pas déjà redirigé en cas de succès) ---
    if (!empty($errors)) {
        $_SESSION['login_errors'] = $errors; // Stocke toutes les erreurs collectées
        $_SESSION['old_login_input'] = ['email' => $email]; // Stocke l'email pour pré-remplir le formulaire
        // Redirige vers la page de connexion pour afficher les erreurs
        header("Location:/tests/Projet_gestion_bibliotheque/views/authentification/connection.php");
        exit(); // Très important après une redirection
    }
    }
    
    // Ce bloc est exécuté si la page est accédée par GET (directement) et non par POST
    else {
        // Si aucune soumission POST et pas encore de redirection, on redirige quand même vers la page de connexion
        // C'est pour éviter que le script de traitement ne s'affiche directement dans le navigateur
        header("Location:/tests/Projet_gestion_bibliotheque/views/authentification/connection.php");
        exit();
    }
?>