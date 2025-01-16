<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 20px 30px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .login-btn {
            padding: 10px 15px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .login-container .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .login-container .forgot-password a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        .login-container .forgot-password a:hover {
            text-decoration: underline;
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo">
        <img src="https://via.placeholder.com/80" alt="Admin Logo">
    </div>
    <h2>Connexion Administrateur</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
        </div>
        <button type="submit" class="login-btn">Se connecter</button>
       
    </form>
</div>

</body>
</html>
