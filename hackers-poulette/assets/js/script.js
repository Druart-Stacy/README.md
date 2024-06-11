document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleBtn');
    const body = document.body;

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
        });
    }

    // Validation et désinfection du formulaire côté client
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let hasError = false;

        const nomInput = document.getElementById('name');
        const emailInput = document.getElementById('mail');
        const messageInput = document.getElementById('message');

        const nomError = document.getElementById('nomError');
        const emailError = document.getElementById('mailError');
        const messageError = document.getElementById('messageError');

        // Réinitialiser les messages d'erreur précédents
        nomError.textContent = '';
        emailError.textContent = '';
        messageError.textContent = '';
        nomInput.classList.remove('errorinput');
        emailInput.classList.remove('errorinput');
        messageInput.classList.remove('errorinput');

        // Valider le nom
        if (nomInput.value.trim() === '') {
            nomError.textContent = 'Le nom est requis.';
            nomInput.classList.add('errorinput');
            hasError = true;
        }

        // Valider l'email
        if (emailInput.value.trim() === '') {
            emailError.textContent = 'L\'email est requis.';
            emailInput.classList.add('errorinput');
            hasError = true;
        } else if (!/\S+@\S+\.\S+/.test(emailInput.value)) {
            emailError.textContent = 'L\'email n\'est pas valide.';
            emailInput.classList.add('errorinput');
            hasError = true;
        }

        

        // Valider le message
        if (messageInput.value.trim() === '') {
            messageError.textContent = 'Le message est requis.';
            messageInput.classList.add('errorinput');
            hasError = true;
        }

        if (!hasError) {
            // Soumettre le formulaire
            this.submit();
        }
    });
});
