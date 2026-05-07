<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    @vite([
        'resources/css/auth/register.css',
        'resources/js/auth/register.js'
    ])
</head>
<body>

<div class="register-container">
    <h1>Register</h1>

    <form id="register-form">
        <input type="text" name="user_id" placeholder="user id">

        <input type="text" name="user_name" placeholder="user name">

        <input type="password" name="password" placeholder="password">

        <input type="password"
               name="password_confirmation"
               placeholder="confirm">

        <button type="submit">
            register
        </button>
    </form>
</div>

</body>
</html>
