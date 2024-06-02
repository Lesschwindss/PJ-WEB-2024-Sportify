function showRegisterForm(type) {
    document.getElementById('login-section').classList.add('d-none');
    document.getElementById('register-section').classList.add('d-none');
    
    if (type === 'client') {
        document.getElementById('register-client-form').classList.remove('d-none');
    } else if (type === 'coach') {
        document.getElementById('register-coach-form').classList.remove('d-none');
    }
}
