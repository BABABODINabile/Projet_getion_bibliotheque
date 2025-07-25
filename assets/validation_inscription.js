document.addEventListener('DOMContentLoaded', function() {
        const nomInput = document.getElementById('nom');
        nomInput.addEventListener('input', function() {
            const isValid = this.value.length > 8;
            // Reset des classes
            this.classList.remove('is-valid', 'is-invalid');
            // Appliquer la classe appropriée
            if (this.value.length === 0) {
                this.classList.add('is-invalid');
            } else if (isValid) {
                this.classList.add('is-valid');
            } else {
                this.classList.add('is-invalid');
            }
        });
    });