<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
        .inputValid{
            border-width: 1px;
            border-color:red;
            outline: none;
        }
    </style>
</head>
<body>
    
    <div class="container">
        
        <div class="registration-form-container">
           
            <form action="/tests/Projet_gestion_des_taches/app/controleurs/control_authen.php" method="post" class="needs-validation"  novalidate>
            <h2 class="text-center mb-4">Inscription</h2>
            <div class="row">

                <div class=" mb-3" >
                    <label for="nom" class="form-label ">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom">
                    <div class="invalid-feedback">Le nom doit contenir plus de 8 caractères</div>
                </div>
                <div class=" mb-3">
                    <label for="prenom" class="form-label ">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom">
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-md form-control">
                            <label class="form-label d-block" for="sexe">Sexe</label>
                        <div class="form-check form-check-inline col-6" >
                            <input class="form-check-input " type="radio" name="sexe" id="sexeM" value="Masculin">
                            <label class="form-check-label" for="sexeM">Masculin</label>
                        </div>
                        <div class="form-check form-check-inline col-3">
                            <input class="form-check-input" type="radio" name="sexe" id="sexeF" value="Féminin">
                            <label class="form-check-label" for="sexeF">Féminin</label>
                        </div>
                    </div>
                    
                    <div class="form-floating col-md">
                        
                        <select class="form-select" name="role" id="role" aria-label="Floating label select">
                            <option value=""></option>
                            <option value="Bibliothécaire">Bibliothécaire</option>
                            <option value="Directeur">Directeur</option>
                            <option value="Censeur">Censeur</option>
                            <option value="Surveillant">Surveillant</option>
                        </select>
                        <label class="" for="role">Fonction</label>
                    </div>
                </div>
            </div>
        
            <div class="mb-3">
                <label for="numTel" class="form-label ">Téléphone</label>
                <input type="tel" class="form-control" name="numTel" id="numTel">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label ">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="motPasse" class="form-label ">Mot de passe</label>
                    <input type="password" class="form-control" name="motPasse" id="motPasse"> 
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary col-12" id="inscription">Soumettre</button>
            <p class="text-center mt-3">
                    Déjà un compte ? <a href="connection.php">Connectez-vous ici</a>
                </p>
        </form>

    </div>
        </div>







<script src="/tests/Projet_gestion_bibliotheque/assets/validation_inscription.js"></script>
<script src="/tests/Projet_gestion_bibliotheque/assets/bootstrap.bundle.min.js"></script>
 
</body>
</html>
