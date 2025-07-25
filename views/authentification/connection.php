<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link href="/tests/Projet_gestion_des_taches/vue/assets/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .registration-form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php require_once 'message_erreur_inscription.php';?>
    <div class="container">
        <div class="registration-form-container">
            <form action="/tests/Projet_gestion_des_taches/app/controleurs/control_connection.php" method="POST" class=""  >
            <h2 class="text-center mb-4">Connection</h2>

            <div class="mb-3">
                <label for="email" class="form-label ">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="motPasse" class="form-label ">Mot de passe</label>
                <input type="password" class="form-control" name="motPasse" id="motPasse"> 
            </div>
            
            <button type="submit" class="btn btn-primary col-12" id="connection">Se connecter</button>
        </form>
    </div>
        </div>

 <script src="/tests/Projet_gestion_des_taches/vue/assets/bootstrap.bundle.min.js"></script>
</body>
</html>