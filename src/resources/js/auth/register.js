document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('register-form');

    form.addEventListener('submit', async (e) => {

        e.preventDefault();

        await fetch('/sanctum/csrf-cookie');

        const response = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                user_id: form.user_id.value,
                user_name: form.user_name.value,
                password: form.password.value,
                password_confirmation:
                form.password_confirmation.value,
            })
        });

        const data = await response.json();

        console.log(data);

        if (response.ok) {
            location.href = '/timeline';
        }
    });
});
