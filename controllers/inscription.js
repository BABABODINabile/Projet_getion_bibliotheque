const ch=document.getElementById('chargement');
const ins=document.getElementById('inscription');
const con=document.getElementById('connect');
ch.style.display='none';
ins.style.display='block';
con.style.display='none';
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
    ins.style.display='none';
    ch.style.display='block'; 
    
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
            setTimeout(() => { 
                ins.style.display='block';
                ch.style.display='none';
                document.querySelector('#message').textContent = result.message;
                throw new Error(`Erreur serveur: ${response.status}`);
            },2000);
            
            
            
        }
        else{
            setTimeout(() => {
                ch.style.display='none';
                ins.style.display='none';
                con.style.display='block';

                document.querySelector('#message').textContent = result.message;
            }, 2000);
            
        }
        

    }catch (err) {
        console.error(err);
        // document.querySelector('#message').textContent = "Erreur de connexion à l’API.";
    }
});
