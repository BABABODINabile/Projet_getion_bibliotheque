 let error=[];
    document.addEventListener('DOMContentLoaded', function() {
        const nom = document.getElementById('nom');
        nom.addEventListener('input', function() {
            // const isValid = this.value.length > 8;
            // Reset des classes
            this.classList.remove('is-valid', 'is-invalid');
            // Appliquer la classe appropriée
            if (!this.value||this.value.length === 0) {
                this.classList.add('is-invalid');
                error.push("nom");
            }else {
                this.classList.add('is-valid');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const prenom= document.getElementById('prenom');
        prenom.addEventListener('input', function() {
            // const isValid = this.value.length > 8;
            // Reset des classes
            this.classList.remove('is-valid', 'is-invalid');
            // Appliquer la classe appropriée
            if (this.value.length === 0) {
                this.classList.add('is-invalid');
                error.push("prenom");
            }else {
                this.classList.add('is-valid');
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const numTel= document.getElementById('numTel');
        numTel.addEventListener('input', function() {
            // Reset des classes
            this.classList.remove('is-valid', 'is-invalid');
            // Appliquer la classe appropriée
            if (isNaN(this.value)||this.value.trim().length===0||this.value.trim().length>10) {
                this.classList.add('is-invalid');
                error.push("téléphone");
            }else {
                this.classList.add('is-valid');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const email= document.getElementById('email');
        email.addEventListener('input', function() {
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            // Reset des classes
            this.classList.remove('is-valid', 'is-invalid');
            // Appliquer la classe appropriée
            if (!regex.test(this.value)) {
                this.classList.add('is-invalid');
                error.push("email");
            }else {
                this.classList.add('is-valid');
            }
        });
    });

    
document.addEventListener('DOMContentLoaded', function() {
        const password= document.getElementById('motPasse');
        password.addEventListener('input', function() {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()]).{8,}$/;
            // Reset des classes
            this.classList.remove('is-valid', 'is-invalid');
            // Appliquer la classe appropriée
            if (!regex.test(this.value)) {
                this.classList.add('is-invalid');
                error.push("Mot de passe");
            }else {
                this.classList.add('is-valid');
            }
        });
    });