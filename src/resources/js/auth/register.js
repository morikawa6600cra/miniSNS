document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('register-form');

    form.addEventListener('submit', handleSubmit);

    async function handleSubmit(e) {

        e.preventDefault();

        try {

            await csrf();

            const response = await register(getFormData());

            const data = await response.json();

            console.log(data);

            if (!response.ok) {

                alert('登録に失敗しました');

                return;
            }

            location.href = '/timeline';

        } catch (error) {

            console.error(error);

            alert('通信エラーが発生しました');
        }
    }

    async function csrf() {

        await fetch('/sanctum/csrf-cookie');
    }

    async function register(data) {

        return fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(data),
        });
    }

    function getFormData() {

        return {
            user_id: form.user_id.value,
            user_name: form.user_name.value,
            password: form.password.value,
            password_confirmation:
            form.password_confirmation.value,
        };
    }
});
