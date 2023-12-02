<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #1C3554;
        }

        p {
            margin-bottom: 20px;
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
        }

        .pm {
            margin-left: 10%;
            margin-right: 10%;
        }

        small {
            display: block;
            margin-top: 20px;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Olá, {{ $data['toName'] }}.</h2>
        <p class="pm">Você solicitou uma recuperação de senha. Abaixo está o seu código de redefinição, válido por <b>24 horas.</b></p>
        <p><b>{{ $data['message'] }}</b></p>
        <small>Caso não tenha solicitado recuperação de senha, descarte essa mensagem e exclua.</small>
    </div>
</body>
</html>
