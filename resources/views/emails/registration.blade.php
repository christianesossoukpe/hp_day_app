<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue !</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('/animations/serpentine-straws-paper-glasses.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .card {
            max-width: 400px;
            background: rgba(255, 255, 255, 0.9);
            /* Fond blanc avec transparence */
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            backdrop-filter: blur(10px);
            padding: 20px;
        }

        .card-header {
            padding: 16px;
            background-color: #38a169;
            color: white;
            text-align: center;
            border-radius: 12px 12px 0 0;
        }

        .card-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .info-box {
            background-color: #f7fafc;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        .button {
            display: inline-block;
            background-color: #38a169;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .button:hover {
            background-color: #2f855a;
        }

        @media (max-width: 480px) {
            .card {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h1>Bienvenue, {{ $username }}!</h1>
        </div>
        <div class="card-body">
            <p>Votre inscription a été réussie. Voici vos informations de connexion :</p>
            <div class="info-box">
                <p><strong>Pseudo :</strong> {{ $username }}</p>
                <p><strong>Mot de passe :</strong> <strong class="text-blue-600">{{ $password }}</strong></p>
            </div>
            <p class="text-center">Vous pouvez vous connecter en utilisant le bouton ci-dessous :</p>
            <div class="flex justify-center">
                <a href="{{ route('login') }}" class="button">Se connecter</a>
            </div>
        </div>
    </div>
</body>

</html>
