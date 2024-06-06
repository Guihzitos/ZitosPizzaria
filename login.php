<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png" />
    <title>Login</title>
    <style>
        body {
            background-color: #030303;
            font-family: Arial, Helvetica, sans-serif;
        }
        div {
            background-color: #e6e3e3;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 90px;
            border-radius: 15px;
            color: black;
            text-align: center;
        }
        input {
            background-color: white;
            border-radius: 5px;
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            color: black;
            margin: 15px 0;
        }
        .inputSubmit {
            background-color: rgb(11, 204, 53);
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 5px;
            color: white;
            font-size: 15px;
        }
        .inputSubmit:hover {
            cursor: pointer;
        }
        a {
            text-decoration: none;
            color: rgb(250, 40, 3);
        }
    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form id="loginForm">
            <input type="text" name="nome" id="nome" placeholder="Nome" required>
            <br>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <br>
            <input class="inputSubmit" type="submit" value="Enviar">
            <br>
            <span>Não possui conta?</span>
            <a href="cadastro.php">Criar Conta!</a>
        </form>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const nome = document.getElementById('nome').value;
            const senha = document.getElementById('senha').value;

            const userData = JSON.parse(localStorage.getItem('userData'));

            if (userData && userData.nome === nome && userData.senha === senha) {
                alert('Login realizado com sucesso!');
                window.location.href = 'index.php';
            } else {
                alert('Nome ou senha incorretos!');
            }
        });
    </script>
</body>
</html>
