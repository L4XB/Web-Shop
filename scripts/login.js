document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');

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
                window.location.href = '../views/dashboard.php';
            } else {
                alert('Login fehlgeschlagen. Überprüfe deine Benutzerdaten.');
            }
        })
        .catch(error => {
            console.error('Fehler beim Login:', error);
        });
    });
});
