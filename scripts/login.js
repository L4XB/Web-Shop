document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '../views/products.php';
            } else {
                errorMessage.textContent = 'falsche E-mail oder Passwort, bitte überprüfe deine Eingabe.';
            }
        })
        .catch(error => {
            console.error('Fehler beim Login:', error);
        });
    });
});
