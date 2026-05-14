<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    @vite([
        'resources/js/auth/login.js',
        'resources/css/auth/auth.css'
    ])
</head>
<body>

<div class="auth-container">
    <h1>Login</h1>

    <form id="login-form">
        <input type="text" name="user_id" placeholder="user id" required>

        <input type="password" name="password" placeholder="password" required>

        <div class="error-message" id="error-message"></div>

        <button type="submit">login</button>
    </form>

    <div class="auth-switch">
        <a href="{{ route('register') }}">
            アカウントを作成する
        </a>
    </div>
</div>

</body>
</html>
