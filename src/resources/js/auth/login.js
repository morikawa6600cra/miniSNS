document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('login-form');

    const errorMessage =
        document.getElementById('error-message');

    form.addEventListener('submit', handleSubmit);

    async function handleSubmit(e) {

        e.preventDefault();

        errorMessage.textContent = '';

        try {

            await fetch('/sanctum/csrf-cookie');

            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    user_id: form.user_id.value,
                    password: form.password.value,
                })
            });

            const data = await response.json();

            console.log(data);

            if (!response.ok) {

                errorMessage.textContent =
                    'ユーザーIDまたはパスワードが違います';

                return;
            }

            location.href = '/timeline';

        } catch (error) {

            console.error(error);

            errorMessage.textContent =
                '通信エラーが発生しました';
        }
    }
});
