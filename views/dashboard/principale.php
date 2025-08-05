<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="/tests/Projet_gestion_des_taches/vue/assets/bootstrap.min.css" rel="stylesheet">

</head>
<body>
   
        <!-- Navbar content -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse container" id="navbarTogglerDemo01">
                <a class="navbar-brand nav-link" href="#acceuil">Acceuil</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#livres">Les Documents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#emprunt">Gestion des emprunts</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
        require_once 'acceuil.php';
    ?>
    <div id="livres" class="section" style="display:none;">
        <?php
            require_once 'document.php';
        ?>
        Nos services
    </div>
    <div id="emprunt" class="section" style="display:none;">Contactez-nous</div>
    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionId = this.getAttribute('href').substring(1);
            document.querySelectorAll('.section').forEach(sec => sec.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
            });
        });
    </script>
    <script src="/tests/Projet_gestion_bibliotheque/assets/bootstrap.bundle.min.js"></script>

</body>
</html>