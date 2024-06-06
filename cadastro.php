<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png" />
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #030303;
        }
        .box {
            background-color: #EEE;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 60px;
            border-radius: 15px;
            text-align: center;
            color: black;
        }
        input {
            border-radius: 5px;
            background-color: white;
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            margin: 15px 0;
            width: calc(100% - 30px); 
        }
        #submit {
            cursor: pointer;
            background-color: rgb(11, 204, 53);
            padding: 15px;
            width: 100%;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="box">
        <form id="cadastroForm" action="registro.php" method="POST">
            <h1>Cadastro</h1>
            <input type="text" name="nome" id="nome" placeholder="Nome" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <input type="text" name="rua" id="rua" placeholder="Endereço" required>
            <input type="submit" id="submit" value="Enviar">
        </form>
    </div>
    <script>
        document.getElementById('cadastroForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            const rua = document.getElementById('rua').value;

            const userData = { nome, email, senha, rua };
            localStorage.setItem('userData', JSON.stringify(userData));

            alert('Cadastro realizado com sucesso!');
            window.location.href = 'login.php';
        });
    </script>
    <script src="registro.php"></script>

</body>
</html>

