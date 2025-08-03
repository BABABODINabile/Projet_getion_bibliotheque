
document.querySelector('#loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const nom = document.querySelector('#nom').value.trim();
    const prenom = document.querySelector('#prenom').value.trim();
    const form = document.getElementById('loginForm');
    const formData = new FormData(form);
    const sexe = formData.get('sexe');
    const role = document.querySelector('#role').value.trim();
    const numTel = document.querySelector('#numTel').value.trim();
    const email = document.querySelector('#email').value.trim();
    const motPasse = document.querySelector('#motPasse').value.trim();

    if (!nom || !prenom || !numTel || !email || !motPasse) {
        document.querySelector('#message').textContent = "Veuillez remplir tous les champs.";
        return;
    }

    try {
        const response = await fetch('/tests/Projet_gestion_bibliotheque/controllers/control_inscription.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ nom, prenom,sexe,role,numTel, email, motPasse })
        });
        const result = await response.json();
        if (!response.ok) {
            document.querySelector('#message').textContent = result.message;
            throw new Error(`Erreur serveur: ${response.status}`);
        }
        else{
            
            document.querySelector('#message').textContent = result.message;
        }
        

    }catch (err) {
        console.error(err);
        // document.querySelector('#message').textContent = "Erreur de connexion à l’API.";
    }
});
